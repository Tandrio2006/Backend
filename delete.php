<?php 

	session_start();

	require 'function.php';

	if(isset($_GET["id_penjualan"])){
		$id_penjualan 	= $_GET["id_penjualan"];

		$query = "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'";

		mysqli_query($conn, $query);

		header("Location: tabel.php?tabelPenjualan");
		exit;
	}

	if(isset($_GET["id_produk"])){
		$id_produk 	= $_GET["id_produk"];

		$query = "DELETE FROM produk WHERE id_produk = '$id_produk'";

		mysqli_query($conn, $query);

		header("Location: tabel.php?tabelProduk");
		exit;
	}


 ?>