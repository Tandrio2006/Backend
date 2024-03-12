<?php 

	session_start();

	require 'function.php';

	if(isset($_SESSION["login"])){
		header("Location: index.php");
		exit;
	}

	if(isset($_POST["submit"])){
		$username 	= $_POST["username"];
		$password 	= $_POST["password"];

		$query = "SELECT * FROM login WHERE username = '$username'";

		$result = mysqli_query($conn, $query);

		$cekUsername = mysqli_num_rows($result);

		$row = mysqli_fetch_assoc($result);

		if($cekUsername === 1){
			if($password === $row["password"]){
				$_SESSION["login"] = true;
				if($row["role"] == "Admin"){
					$_SESSION["Admin"] = true;
					$_SESSION["Username"] = $username;
					$_SESSION["Role"] = "Admin";

					header("Location: index.php");
				}
				else if($row["role"] == "Petugas"){
					$_SESSION["Petugas"] = true;
					$_SESSION["Username"] = $username;
					$_SESSION["Role"] = "Petugas";

					header("Location: index.php");
				}
				else if($row["role"] == "User"){
					$_SESSION["User"] = true;
					$_SESSION["Username"] = $username;
					$_SESSION["Role"] = "User";

					header("Location: index.php");
				} else {
					echo "
					<script>
						alert('ADA YANG ANEHHHH!!!');
						document.location.href = 'login.php';
					</script>
				";
				}
			} else {
				echo "
					<script>
						alert('PASSWORDDDDD SALAHHHHH!!!');
						document.location.href = 'login.php';
					</script>
				";
			}
		} else {
			echo "
					<script>
						alert('USERNAME SALAH!!!');
						document.location.href = 'login.php';
					</script>
				";
		}

	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>LOGINNNNNNNNNNN</h1>

	<a href="register.php">buat akunn</a>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<input type="text" name="username" placeholder="username" required>
			</li>
			<br>

			<li>
				<input type="text" name="password" placeholder="password" required>
			</li>
			<br>
		</ul>

		<button type="submit" name="submit">Login</button>
	</form>

</body>
</html>