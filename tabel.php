<?php 

	session_start();

	require 'function.php';

	if(!isset($_SESSION["login"])){
		header("Location: login.php");
		exit;
	}
	
	$penjualan 	= query("SELECT * FROM penjualan");

	$produk 	= query("SELECT * FROM produk");

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>TABEL</title>
</head>
<body>

	<?php if(isset($_GET["tabelPenjualan"])) : ?>

		<h1>PENJUALANNNNN</h1>

	<a href="index.php">Kembali</a>
	<br>
	<br>
	<a href="create.php?createPenjualan">Create</a>

	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>ID Penjualan</th>
			<th>Nama Pembeli</th>
			<th>Nama Penjual</th>
			<th>Kode Penjualan</th>
			<th>Aksi</th>
		</tr>

		<?php foreach($penjualan as $row) : ?>

		<tr>
			<td><?php echo $row["id_penjualan"]; ?></td>
			<td><?php echo $row["namaPembeli"]; ?></td>
			<td><?php echo $row["namaPenjual"]; ?></td>
			<td><?php echo $row["kodePenjualan"]; ?></td>
			<td>
				<a href="update.php?id_penjualan=<?php echo $row["id_penjualan"]; ?>">Update</a>
				<a href="delete.php?id_penjualan=<?php echo $row["id_penjualan"]; ?>">Delete</a>
			</td>
		</tr>

		<?php endforeach; ?>
	</table>

	<?php endif; ?>

	<!-- PRODUKKKKKKKKKK!! -->

	<?php if(isset($_GET["tabelProduk"])) : ?>

		<h1>PRODUKKKKK</h1>

	<a href="index.php">Kembali</a>
	<br>
	<br>
	<a href="create.php?createProduk">Create</a>

	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>ID Produk</th>
			<th>Nama Produk</th>
			<th>Nama Produk</th>
			<th>Kode Produk</th>
			<th>Aksi</th>
		</tr>

		<?php foreach($produk as $row) : ?>

		<tr>
			<td><?php echo $row["id_produk"]; ?></td>
			<td><?php echo $row["namaProduk"]; ?></td>
			<td><?php echo $row["hargaProduk"]; ?></td>
			<td><?php echo $row["kodeProduk"]; ?></td>
			<td>
				<a href="update.php?id_produk=<?php echo $row["id_produk"]; ?>">Update</a>
				<a href="delete.php?id_produk=<?php echo $row["id_produk"]; ?>">Delete</a>
			</td>
		</tr>

		<?php endforeach; ?>
	</table>

	<?php endif; ?>

</body>
</html>






