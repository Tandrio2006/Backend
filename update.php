<?php 

	session_start();

	require 'function.php';

	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit;
	}

	if(isset($_GET["id_penjualan"])){
		$id_penjualan 	= $_GET["id_penjualan"];

		$updatePenjualan 	= query("SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'")[0];
	}
	else if(isset($_GET["id_produk"])){
		$id_produk 		= $_GET["id_produk"];

		$updateProduk 	= query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];
	}

	if(isset($_POST["submit"])){
		//Kalo ga bisa, coba pake session
		if(isset($_GET["id_penjualan"])){
			$id_penjualan 	= $_POST["id_penjualan"];
			$namaPembeli 	= $_POST["namaPembeli"];
			$namaPenjual 	= $_POST["namaPenjual"];
			$kodePenjualan 	= $_POST["kodePenjualan"];

			$query = "UPDATE penjualan SET
							id_penjualan 	= '$id_penjualan',
							namaPembeli 	= '$namaPembeli',
							namaPenjual 	= '$namaPenjual',
							kodePenjualan 	= '$kodePenjualan'
					WHERE 	id_penjualan 	= $id_penjualan
					";

			mysqli_query($conn, $query);

			header("Location: tabel.php?tabelPenjualan");
			exit;
		}
		else if(isset($_GET["id_produk"])){
			$id_produk 		= $_POST["id_produk"];
			$namaProduk 	= $_POST["namaProduk"];
			$hargaProduk 	= $_POST["hargaProduk"];
			$kodeProduk 	= $_POST["kodeProduk"];

			$query = "UPDATE produk SET
							id_produk 	= '$id_produk',
							namaProduk 	= '$namaProduk',
							hargaProduk = '$hargaProduk',
							kodeProduk 	= '$kodeProduk'
					WHERE 	id_produk 	= $id_produk
					";

			mysqli_query($conn, $query);

			header("Location: tabel.php?tabelProduk");
			exit;
		}
	}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
</head>
<body>

 	<?php if(isset($_GET["id_penjualan"])) : ?>

	<h1>UPDATEEE PENJUALANNNN</h1>

	<a href="tabel.php?tabelPenjualan">Kembali</a>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<input type="hidden" name="id_penjualan" placeholder="id_penjualan" required value="<?php echo $updatePenjualan["id_penjualan"]; ?>">
			</li>
			<br>

			<li>
				<input type="text" name="namaPembeli" placeholder="namaPembeli" required value="<?php echo $updatePenjualan["namaPembeli"]; ?>">
			</li>
			<br>

			<li>
				<input type="text" name="namaPenjual" placeholder="namaPenjual" required value="<?php echo $updatePenjualan["namaPenjual"]; ?>">
			</li>
			<br>

			<li>
				<input type="text" name="kodePenjualan" placeholder="kodePenjualan" required value="<?php echo $updatePenjualan["kodePenjualan"]; ?>">
			</li>
			<br>
		</ul>

		<button type="submit" name="submit">Create</button>
	</form>

	<?php endif; ?>


	<!-- PRODUKKKKKK -->


	<?php if(isset($_GET["id_produk"])) : ?>

	<h1>UPDATEEE PRODUKK</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<input type="hidden" name="id_produk" placeholder="id_produk" required value="<?php echo $updateProduk["id_produk"]; ?>">
			</li>
			<br>

			<li>
				<input type="text" name="namaProduk" placeholder="namaProduk" required value="<?php echo $updateProduk["namaProduk"]; ?>">
			</li>
			<br>

			<li>
				<input type="text" name="hargaProduk" placeholder="hargaProduk" required value="<?php echo $updateProduk["hargaProduk"]; ?>">
			</li>
			<br>

			<li>
				<input type="text" name="kodeProduk" placeholder="kodeProduk" required value="<?php echo $updateProduk["kodeProduk"]; ?>">
			</li>
			<br>
		</ul>

		<button type="submit" name="submit">Create</button>
	</form>

	<?php endif; ?>

</body>
</html>