<?php

if (isset($_SESSION['user'])) {
	
	return header('location: /');
}

if (isset($_POST['auth'])) {

	if ($_POST['auth'] == 'login') {
		$nik = $_POST['nik'];
		$nama_lengkap = $_POST['nama_lengkap'];

		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik' AND nama_lengkap = '$nama_lengkap'");

		if (mysqli_num_rows($result) == 1) {

			$result = mysqli_fetch_assoc($result);

			$_SESSION['user'] = array(
				'id_user' => $result['id_user'],
				'nik' => $result['nik'],
				'nama_lengkap' => $result['nama_lengkap']
			);

			return header("location: /");
		}

		return header('location: /login.php?message=NIK atau Nama Salah!&type=error');

	} else {

		$nik = $_POST['nik'];
		$nama_lengkap = $_POST['nama_lengkap'];

		if (strlen($nik) >= 12) {
			
			if (strlen($nama_lengkap) >= 5) {
				
				$result = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik'");

				if (!mysqli_num_rows($result) == 1) {
					
					mysqli_query($koneksi, "INSERT INTO `user` (`id_user`, `nik`, `nama_lengkap`) VALUES (NULL, '$nik', '$nama_lengkap');");

					return header("location: /login.php?message=Berhasil Daftar!!&type=success");
				}

				return header("location: /login.php?message=NIK sudah terdaftar!!&type=error");
			} else {

				return header("location: /login.php?message=Nama lengkap minimal 5 karakter!!&type=error");
			} 
		} else {
			return header("location: /login.php?message=NIK minimal 12 karakter!!&type=error");
		}
	}
}