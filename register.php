<?php 

	session_start();

	require 'function.php';

	if(isset($_POST["submit"])){
		if(register($_POST) > 0){
			echo "
					<script>
						alert('Berhasil!!!');
						document.location.href = 'login.php';
					</script>
				";
		} else {
			echo "
					<script>
						alert('GAGALLLLL!!!');
						document.location.href = 'register.php';
					</script>
				";
		}
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h1>REGISTERRRRRRR</h1>

	<a href="login.php">udah ada akunn</a>

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

		<button type="submit" name="submit">Register</button>
	</form>

</body>
</html>