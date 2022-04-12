<?php 

session_start();

$koneksi = mysqli_connect("localhost", "root", "", "ukk_klaster3");

function query($query) {
	global $koneksi;

	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {

	/*var_dump($data);
	die();*/

	$created_at = str_replace('-', '', $data['tanggal']) . str_replace(':', '', $data['waktu']);



	global $koneksi;

	// Ambil data dari tiap element dalam form
	$tanggal = htmlspecialchars($data['tanggal']);
	$waktu = htmlspecialchars($data['waktu']);
	$lokasi = htmlspecialchars($data['lokasi']);
	$suhu = htmlspecialchars($data['suhu']);

	// upload gambar
	/*$gambar = upload();
	if (!$gambar) {
		return false;
	}*/

	$id_user = $_SESSION['user']['id_user'];

	// query insert data
	$query = "INSERT INTO `catatan` (`id_catatan`, `id_user`, `tanggal`, `waktu`, `lokasi`, `suhu`, `created_at`) VALUES (NULL, '$id_user', '$tanggal', '$waktu', '$lokasi', '$suhu', '$created_at');";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// Cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu!')
			  </script>";
		return false;	  
	}

	// Cek apakah yang diupload gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

	// explode berfungsi sebagai pemisah String
	$ekstensiGambar = explode('.', $namaFile); 
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Yang anda upload bukan Gambar!')
			  </script>";
		return false;
	}

	// Cek jika ukurannya terlalu besar
	/*if ($ukuranFile  > 1000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!')
			  </script>";
		return false;
	}*/

	// Lolos pengecekan, gambar siap diupload
	move_uploaded_file($tmpName, 'img/' . $namaFile);

	return $namaFile;
}

function registrasi($data) {
	global $koneksi;


	// fungsi stripslashes() adalah untuk menghilangkan karakter slash( / atau \ ) agar karakter tersebut tidak masuk ke Database!.

	// fungsi strtolower() adalah untuk memaksa user memasukkan huruf kecil.

	$nama_lengkap = strtolower(stripslashes($data["nama_lengkap"]));
	$nik = strtolower(stripslashes($data["nik"]));

	// fungsi mysqli_real_escape_string() adalah untuk memungkinkan si user mamasukkan tanda kutip dan tanda kutipnya akan dimasukkan ke Database dengan aman.

	$nama_lengkap = mysqli_real_escape_string($koneksi ,$data["nama_lengkap"]);
	$nik = mysqli_real_escape_string($koneksi ,$data["nik"]);

	// Cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT nama_lengkap FROM user WHERE nama_lengkap = '$nama_lengkap'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Username yang dipilih sudah Terdaftar !')
			  </script>";
		return false;	
	}


	// Cek apakah password yang dimaksukkan sama dengan password2 
	/*if ($password !== $password2) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai !')
			  </script>";
		return false;	  
	}*/

	// Enkripsi password
	// jangan pernah gunakan md5 untuk meng-Enkripsi password karena versi tersebut sudah usang.
	/*$nik = password_hash($nik, PASSWORD_DEFAULT);*/


	// Tambahkan user baru ke Database
	mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$nik', '$nama_lengkap')");

	return mysqli_affected_rows($koneksi);
}
?>