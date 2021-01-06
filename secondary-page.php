<?php
	include "./connection.php";
	
	$email = $_GET['email'];
	$status = $_GET['status'];

?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="./style/style.css">


		<title>Secondary | Home Buy Now</title>
	</head>

	<body>

		<?php
			include "./navigation.php";
			$select = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND status='$status'");
			$row = mysqli_fetch_array($select);
        ?>
		<h1>Welcome, <?=$row['nama']?></h1>
							
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="./script/jquery-3.5.1.min.js"></script>
		<script src="./script/script.js"></script>

		<style>
			#kategori2 {
				font-weight: bold;
				background-color: #888;
				color: #fff;
				border-radius: 5px;
			}

			#kategori2 + .dropdown-menu {
				background-color: #888;
				color: #fff; 
			}
		</style>
	</body>
</html>
