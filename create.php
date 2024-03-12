<?php 

	session_start();

	require 'function.php';

	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit;
	}

	if(isset($_POST["submit"])){
		//Kalo ga bisa, coba pake session
		if(isset($_GET["createPenjualan"])){
			$id_penjualan 	= $_POST["id_penjualan"];
			$namaPembeli 	= $_POST["namaPembeli"];
			$namaPenjual 	= $_POST["namaPenjual"];
			$kodePenjualan 	= $_POST["kodePenjualan"];

			$query = "INSERT INTO penjualan VALUES ('$id_penjualan', '$namaPembeli', '$namaPenjual', '$kodePenjualan')";

			mysqli_query($conn, $query);

			header("Location: tabel.php?tabelPenjualan");
			exit;
		}
		else if(isset($_GET["createProduk"])){
			$id_produk 		= $_POST["id_produk"];
			$namaProduk 	= $_POST["namaProduk"];
			$hargaProduk 	= $_POST["hargaProduk"];
			$kodeProduk 	= $_POST["kodeProduk"];

			$query = "INSERT INTO produk VALUES ('$id_produk', '$namaProduk', '$hargaProduk', '$kodeProduk')";

			mysqli_query($conn, $query);

			header("Location: tabel.php?tabelProduk");
			exit;
		}
	}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>CREATE</title>
</head>
<body>

	<?php if(isset($_GET["createPenjualan"])) : ?>

	<h1>CREATEEE PENJUALANNNN</h1>

	<a href="tabel.php?tabelPenjualan">Kembali</a>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<input type="text" name="id_penjualan" placeholder="id_penjualan" required>
			</li>
			<br>

			<li>
				<input type="text" name="namaPembeli" placeholder="namaPembeli" required>
			</li>
			<br>

			<li>
				<input type="text" name="namaPenjual" placeholder="namaPenjual" required>
			</li>
			<br>

			<li>
				<input type="text" name="kodePenjualan" placeholder="kodePenjualan" required>
			</li>
			<br>
		</ul>

		<button type="submit" name="submit">Create</button>
	</form>

	<?php endif; ?>


	<!-- PRODUKKKKKK -->


	<?php if(isset($_GET["createProduk"])) : ?>

	<h1>CREATEEE PRODUKK</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<input type="text" name="id_produk" placeholder="id_produk" required>
			</li>
			<br>

			<li>
				<input type="text" name="namaProduk" placeholder="namaProduk" required>
			</li>
			<br>

			<li>
				<input type="text" name="hargaProduk" placeholder="hargaProduk" required>
			</li>
			<br>

			<li>
				<input type="text" name="kodeProduk" placeholder="kodeProduk" required>
			</li>
			<br>
		</ul>

		<button type="submit" name="submit">Create</button>
	</form>

	<?php endif; ?>

</body>
</html>