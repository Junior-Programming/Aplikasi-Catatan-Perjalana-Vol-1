<?php 

require 'functions.php';

if (!isset($_SESSION['user'])) {
	
	return header('location: /login.php');
}

$catatans = mysqli_query($koneksi, "SELECT * FROM catatan");


if (isset($_POST['simpan']) && tambah($_POST)) {
	
	echo header("location: catatan-perjalanan.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Beranda - Aplikasi Peduli Lindungi</title>

	<!-- Link -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script href="js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Peduli Diri</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link" aria-current="page" href="index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/catatan-perjalanan.php">Catatan Perjalanan</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" href="/isi-data.php">Isi Data</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/logout.php">Logout</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>




	<div class="container mt-5">

		<div class="card" style="width: 100%;">
		  <div class="card-body">
		    Urutkan Berdasarkan :

		    <select class="ms-4">
		    	<option value="Tanggal">Tanggal</option>
		    </select>

		    <button type="submit" class="btn btn-primary ms-4">Urutkan</button>
		  </div>
		</div>

		<form action="" method="POST" class="card mt-3" style="width: 100%;">
		  <div class="card-body">

		  	<label for="">Tanggal</label>
		  	<input type="date" name="tanggal" class="form-control mb-4" width="50px">

		  	<label for="">Jam</label>
		  	<input type="time" name="waktu" class="form-control" width="50px">

		  	<label for="">Lokasi yang dikunjungi</label>
		  	<input type="text" name="lokasi" class="form-control" width="50px">

		  	<label for="">Suhu Tubuh</label>
		  	<input type="text" name="suhu" class="form-control" width="50px">


		    <div class="text-end mt-4">
		    	<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
		    </div>
		  </div>
		</form>
	</div>
	
</body>
</html>