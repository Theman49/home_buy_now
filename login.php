<?php 
    include "./connection.php";

	if(isset($_POST['submitLoginBuyer'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND status = 'buyer'");
		
		if(mysqli_num_rows($select) == 0){
				echo "<script>
				alert('Anda belum terdaftar, Silahkan registrasi dahulu :)');
				document.location.href = './login.php?status=buyer';
				</script>";
		}else{
			$row = mysqli_fetch_array($select);
			$nama = $row['nama'];
			$id_kategori = $row['id_kategori'];
			
			if($password == $row['password']){
				$getKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = $id_kategori");
				$row = mysqli_fetch_assoc($getKategori);
				$kategori = $row['jenis_kategori'];

				echo "<script>
					alert('Selamat Datang $nama :)');
					document.location.href = './page/".$kategori."/".$kategori."-page.php?email=".$email."&status=buyer';
					</script>";
			}else{
				echo "<script>
					alert('Email dan Password Tidak cocok');
					document.location.href = './login.php?status=buyer';
					</script>";
			}
		}
	}

	if(isset($_POST['submitLoginSeller'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND status = 'seller'");
		
		if(mysqli_num_rows($select) == 0){
				echo "<script>
				alert('Anda belum terdaftar, Silahkan registrasi dahulu :)');
				document.location.href = './login.php?status=seller';
				</script>";
		}else{
			$row = mysqli_fetch_array($select);
			$nama = $row['nama'];
			$id_kategori = $row['id_kategori'];
			
			if($password == $row['password']){
				$getKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = $id_kategori");
				$row = mysqli_fetch_assoc($getKategori);
				$kategori = $row['jenis_kategori'];

				echo "<script>
					alert('Selamat Datang $nama :)');
					document.location.href = './page/".$kategori."/".$kategori."-page.php?email=".$email."&status=seller';
					</script>";
			}else{
				echo "<script>
				alert('Email dan Password Tidak cocok');
					document.location.href = './login.php?status=seller';
					</script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="./style/style.css">


		<title>Login | Home Buy Now</title>
		<style>
			<?php
				if($_GET['status'] == 'buyer' || !isset($_GET['status'])){
					echo "#login-buyer {display: block}";
					echo "#login-seller {display: none}";
				}else {
					echo "#login-seller {display: block}";
					echo "#login-buyer {display: none}";
				}
			?>
		</style>
	</head>

	<body>
		<!-- B U Y E R  -->
		<div class="center container login" id="login-buyer">
			<div class="row">
				<div class="col text-center status" id="statusBuyer">
					<h1 style="vertical-align:middle;">Buyer</h1>
					<div class="mb-3">
						<label>or Login as <span id="changeToSeller" class="changeTo">Seller</span></label>
					</div>
					<div class="mb-3">
						<label>Didn't have any account? <a href="./index.php?status=buyer">Register here</a></label>
					</div>
				</div>
				<div class="col myFormLogin" id="formBuyer">
					<form method="POST" action="">
						<h1 class="text-center">Login</h1>
						<h6 class="text-center"  style="margin-bottom:20px">as Buyer</h6>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Email address:</label> -->
							<input type="email" class="form-control"aria-describedby="emailHelp" name="email" placeholder="Email" required>
						</div>
						<div class="mb-3">
							<!-- <label for="exampleInputPassword1" class="form-label">Password:</label> -->
							<input type="password" class="form-control pwd" name="password" placeholder="Password" required>
						</div>
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input cekmeout" >
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
						</div>
						<input type="submit" class="btn btn-primary" name="submitLoginBuyer" value="Login" style="margin-bottom: 10px;">
						
						<div class="linker">
							<div class="mb-3">
								<label>or Login as <span id="changeToSeller2" class="changeTo">Seller</span></label>
							</div>
							<div class="mb-3">
								<label>Didn't have any account? <a href="./index.php?status=buyer">Register here</a></label>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
		
		<!-- S E L L E R -->
		<div class="center container card login" id="login-seller">
			<div class="row">
				<div class="col myFormLogin" id="formSeller">
					<form method="POST" action="">
						<h1 class="text-center">Login</h1>
						<h6 class="text-center" style="margin-bottom:20px">as Seller</h6>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Email address:</label> -->
							<input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Email">
						</div>
						<div class="mb-3">
							<!-- <label for="exampleInputPassword1" class="form-label">Password:</label> -->
							<input type="password" class="form-control pwd" name="password" placeholder="Password">
						</div>
						<div class="mb-3 form-check">
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
							<input type="checkbox" class="form-check-input cekmeout">
						</div>
						<input type="submit" class="btn btn-primary" name="submitLoginSeller" value="Login" style="margin-bottom: 10px;">
						
						<div class="linker">
							<div class="mb-3">
								<label>or Login as <span id="changeToBuyer2" class="changeTo">Buyer</span></label>
							</div>
							<div class="mb-3">
								<label>Didn't have any account? <a href="./index.php?status=seller">Register here</a></label>
							</div>	
						</div>
					</form>	
				</div>
				<div class="col text-center status" id="statusSeller">
					<h1 style="vertical-align:middle;">Seller</h1>
					<div class="mb-3">
						<label>or Login as <span id="changeToBuyer" class="changeTo">Buyer</span></label>
					</div>
					<div class="mb-3">
						<label>Didn't have any account? <a href="./index.php?status=seller">Register here</a></label>
					</div>	
				</div>
			</div>
		</div>

		
							
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="./script/jquery-3.5.1.min.js"></script>
		<script src="./script/script-login.js"></script>
	</body>
</html>
