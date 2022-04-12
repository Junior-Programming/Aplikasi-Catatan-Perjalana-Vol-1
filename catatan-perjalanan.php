<?php 

require 'functions.php';

if (!isset($_SESSION['user'])) {
	
	return header('location: /login.php');
}

$id_user = $_SESSION['user']['id_user'];


$catatans = mysqli_query($koneksi, "SELECT * FROM `catatan` WHERE id_user = $id_user ORDER BY created_at " . ( isset($_GET['orderBy']) && $_GET['orderBy'] == 'terlama' ? 'ASC' : 'DESC' ));
$catatans = mysqli_fetch_all($catatans, MYSQLI_ASSOC);

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
	          <a class="nav-link" aria-current="page" href="/index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link active" href="/catatan-perjalanan.php">Catatan Perjalanan</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/isi-data.php">Isi Data</a>
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

		    <select class="ms-4" name="orderBy" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
		    	<option value="/catatan-perjalanan.php?orderBy=terbaru" selected>Terbaru</option>
		    	<option value="/catatan-perjalanan.php?orderBy=terlama" <?= isset($_GET['orderBy']) && $_GET['orderBy'] == 'terlama' ? 'selected' : '' ?>>Terlama</option>
		    </select>

		    <button type="submit" class="btn btn-primary ms-4">Urutkan</button>
		  </div>
		</div>

		<div class="card mt-3" style="width: 100%;">
		  <div class="card-body">

		  	<table class="table table-hover">
		  		
		  		<tr>
		  			<th>Tangal</th>
		  			<th>Waktu</th>
		  			<th>Lokasi</th>
		  			<th>Suhu Tubuh</th>
		  		</tr>
		  		
		  		<?php foreach($catatans as $catatan) : ?>
		  		<tr>
		  			<td><?= $catatan['tanggal'];  ?></td>
		  			<td><?= $catatan['waktu'];  ?></td>
		  			<td><?= $catatan['lokasi'];  ?></td>
		  			<td><?= $catatan['suhu'];  ?></td>
		  		</tr>
		  		<?php endforeach; ?>
		  	</table>

		    <div class="text-end">
		    	<a href="isi-data.php" class="btn btn-primary">Isi Catatan Perjalanan</a>
		    </div>
		  </div>
		</div>
	</div>
	
</body>
</html>