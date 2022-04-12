<?php  

require 'functions.php';
require 'Controllers/login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Aplikasi Peduli Lindungi</title>

	<!-- Link -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script href="js/bootstrap.min.js"></script>

	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>

	
		<div class="limiter">
					<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

					<?php if(isset($_GET['message']) && $_GET['type'] == 'error') : ?>
						<div class="alert bg-danger text-white">
							<?php echo $_GET['message']; ?>
						</div>
					<?php endif; ?>

					<?php if(isset($_GET['message']) && $_GET['type'] == 'success') : ?>
						<div class="alert bg-success text-white">
							<?php echo $_GET['message']; ?>
						</div>
					<?php endif; ?>

					<form class="login100-form validate-form" action="" method="POST">

						<span class="login100-form-title p-b-49">
						    Login
					    </span>

						<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">
							NIK
						</span>
						  <input type="text" class="input100" name="nik" placeholder="Masukkan NIK . . ." required>
						  <span class="focus-input100" data-symbol="&#xf206;"></span>
						</div>

						<div class="wrap-input100 validate-input">
							<span class="label-input100">
							Nama Lengkap</span>
							<input type="text" class="input100" name="nama_lengkap" placeholder="Masukkan Nama Lengkap. . ." required>
							<span class="focus-input100" data-symbol="&#xf190;"></span>
						</div>

						<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="auth" value="login">
								Login
							</button>
						</div>
					</div>

                     <br>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="auth" value="register">
								Saya Pengguna Baru
							</button>
						</div>
					</div>



						<!-- <button type="submit" name="auth" value="register" class="btn btn-secondary">Saya Pengguna Baru</button> -->

						<!-- <button type="submit" name="auth" value="login" class="btn btn-secondary" class="button">Masuk</button> -->
					</form>
				</div>
			</div>
		</div>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	
</body>
</html>