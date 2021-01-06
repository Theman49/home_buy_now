<?php
	include "./connection.php";

	if(isset($_POST['submitSignUp'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$no_handphone = $_POST['no_handphone'];
		$jenis_kategori = $_POST['jenis_kategori'];
		$password = $_POST['password'];

		$select = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' AND status = 'seller'");
		if(mysqli_num_rows($select) == 0){
			$query = mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$nama', '$email', '$no_handphone', '$jenis_kategori', '$password', 'seller')");
			if(!$query){
				header("Location: ./signup-seller?status=gagal-sign-up");
				die(mysqli_error($query));
			}else{
				echo "<script>
				alert('Berhasil Mendaftar');
				document.location.href = './".$jenis_kategori."-page.php?email=".$email."&status=seller';
				</script>";
			}
		}else{
			echo "<script>
				alert('Email Sudah Terdaftar');
				document.location.href = './signup-seller.php';
				</script>";
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


		<title>HOBUN | Home Buy Now</title>
	</head>

	<body>
		<div class="center container card" id="content">
			<div class="row">
				<div class="col-4 myForm">
					<form method="POST" action="">
						
						<H1 class="text-center" style="margin-bottom:20px">Sign Up</H1>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Nama Lengkap:</label> -->
							<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
						</div>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Email address:</label> -->
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email">
						</div>

						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">No. Handphone:</label> -->
							<input type="text" class="form-control" name="no_handphone" placeholder="No. Handphone">
						</div>

						<div class="mb-3">
							<select name="jenis_kategori" style="border: 0px;padding:5px 8px;width:100%;height:40px;">
								<?php
									$sql = "SELECT * FROM kategori";
									$query = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_array($query)){
										if($row['id_kategori'] == 1 || $row['id_kategori'] == 3 || $row['id_kategori'] == 4){
											continue;
										}
								?>
									<option value="<?=$row['jenis_kategori']?>"><?=strtoupper($row['jenis_kategori'])?></option>
								<?php
									}
								?>
							</select>
						</div>

						<div class="mb-3">
							<!-- <label for="exampleInputPassword1" class="form-label">Password:</label> -->
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						</div>
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input" id="cekmeout">
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
						</div>
						<div class="mb-3">
							<label>or becoming our part with sign up as <a href="./index.php">Buyer</a></label>
						</div>
						<input type="submit" class="btn btn-primary" name="submitSignUp" value="Sign Up" style="margin-bottom: 10px;">
					</form>	
				</div>
				<div id="image" class="col-8"></div>
			</div>
		</div>
							
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="./script/script.js"></script>
		<script src="./script/jquery-3.5.1.min.js"></script>
	</body>
</html>
