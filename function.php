<?php 

	$conn = mysqli_connect("localhost", "root", "", "blebleble");

	function query($query){
		global $conn;

		$result = mysqli_query($conn, $query);
	
		$rows = [];

		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}

		return $rows;
	}

	function register($post){
		global $conn;

		$username 	= $post["username"];
		$password 	= mysqli_real_escape_string($conn, $post["password"]);

		$query = "SELECT * FROM login WHERE username = '$username'";

		$result = mysqli_query($conn, $query);

		if(mysqli_fetch_assoc($result)){
			echo "
					<script>
						alert('Username sudah Ada!');
					</script>
				";
			return false;
		}

		$query = "INSERT INTO login VALUES ('', '$username', '$password', 'User')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

 ?>







