<?php 

require 'functions.php';

if (!isset($_SESSION['user'])) {
	
	return header('location: /login.php');
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
	          <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/catatan-perjalanan.php">Catatan Perjalanan</a>
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
		    <p class="card-text">
		    	<textarea class="form-control" style="height: 300px;">Selamat Datang di Aplikasi Peduli Diri
		    	</textarea>
		    </p>
		    <div class="text-end">
		    	<a href="/catatan-perjalanan.php" class="btn btn-primary">Catatan Perjalanan</a>
		    </div>
		  </div>
		</div>
	</div>
	
</body>
</html>