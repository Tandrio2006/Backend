<?php 

	session_start();

	require 'function.php';

	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit;
	}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>

	<a href="logout.php">Logouttt</a>

	<?php if(isset($_SESSION["Admin"])) : ?>
		hai <b><?php echo $_SESSION["Username"]; ?></b> sebegai <b><?php echo $_SESSION["Role"]; ?></b>
	<?php endif; ?>

	<?php if(isset($_SESSION["Petugas"])) : ?>
		hai <b><?php echo $_SESSION["Username"]; ?></b> sebegai <b><?php echo $_SESSION["Role"]; ?></b>
	<?php endif; ?>

	<?php if(isset($_SESSION["User"])) : ?>
		hai <b><?php echo $_SESSION["Username"]; ?></b> sebegai <b><?php echo $_SESSION["Role"]; ?></b>
	<?php endif; ?>
	<br>
	<br>

	<a href="tabel.php?tabelPenjualan">Penjualan</a>
	<br>
	<br>
	<a href="tabel.php?tabelProduk">Produk</a>

</body>
</html>