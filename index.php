<?php
	include "./connection.php";
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="./style/style.css">
		<style>
			<?php
				if($_GET['status'] == 'buyer' || !isset($_GET['status'])){
					echo "#sign-up-buyer {display: block}";
					echo "#sign-up-seller {display: none}";
				}else {
					echo "#sign-up-seller {display: block}";
					echo "#sign-up-buyer {display: none}";
				}
			?>
		</style>
		<title>Welcome | Home Buy Now</title>
	</head>

	<body>
		<!-- B U Y E R  -->
		<div class="center container signup" id="sign-up-buyer">
			<div class="row">
				<div class="col text-center status" id="statusBuyer">
					<h1 style="vertical-align:middle;">Buyer</h1>
					<div class="mb-3">
						<label>or becoming our part with sign up as <span id="changeToSeller" class="changeTo">Seller</span></label>
					</div>
					<div class="mb-3">
						<label>Already have an account? <a href="./login.php?status=buyer">Login here</a></label>
					</div>
				</div>
				<div class="col myForm" id="formBuyer">
					<form method="POST" action="./sign-up/auth-signup-buyer.php">
						<h1 class="text-center">Sign Up</h1>
						<h6 class="text-center"  style="margin-bottom:20px">as Buyer</h6>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Nama Lengkap:</label> -->
							<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
						</div>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Email address:</label> -->
							<input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Email" required>
						</div>

						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">No. Handphone:</label> -->
							<input type="text" class="form-control" name="no_handphone" placeholder="No. Handphone" required>
						</div>

						<div class="mb-3">
							<select name="jenis_kategori" style="border: 0px;padding:5px 8px;width:100%;height:40px;">
								<?php
									$sql = "SELECT * FROM kategori";
									$query = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_array($query)){
								?>
									<option value="<?=$row['jenis_kategori']?>"><?=strtoupper($row['jenis_kategori'])?></option>
								<?php
									}
								?>
							</select>
						</div>

						<div class="mb-3">
							<!-- <label for="exampleInputPassword1" class="form-label">Password:</label> -->
							<input type="password" class="form-control pwd" name="password" placeholder="Password" required>
						</div>
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input cekmeout" >
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
						</div>
						<input type="submit" class="btn btn-primary" name="submitSignUpBuyer" value="Sign Up" style="margin-bottom: 10px;">
						<div class="linker">
							<div class="mb-3">
								<label>or becoming our part with sign up as <span id="changeToSeller2" class="changeTo">Seller</span></label>
							</div>
							<div class="mb-3">
								<label>Already have an account? <a href="./login.php?status=buyer">Login here</a></label>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
		
		<!-- S E L L E R -->
		<div class="center container card signup" id="sign-up-seller">
			<div class="row">
				<div class="col myForm" id="formSeller">
					<form method="POST" action="./sign-up/auth-signup-seller.php">
						<h1 class="text-center">Sign Up</h1>
						<h6 class="text-center" style="margin-bottom:20px">as Seller</h6>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Nama Lengkap:</label> -->
							<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
						</div>
						<div class="mb-3">
							<!-- <label for="exampleInputEmail1" class="form-label">Email address:</label> -->
							<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="email" placeholder="Email">
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
							<input type="password" class="form-control pwd" name="password" placeholder="Password">
						</div>
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input cekmeout">
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
						</div>
						<input type="submit" class="btn btn-primary" name="submitSignUpSeller" value="Sign Up" style="margin-bottom: 10px;">
						<div class="linker">
							<div class="mb-3">
								<label>or becoming our part with sign up as <span id="changeToBuyer2" class="changeTo">Seller</span></label>
							</div>
							<div class="mb-3">
								<label>Already have an account? <a href="./login.php?status=seller">Login here</a></label>
							</div>
						</div>
					</form>	
				</div>
				<div class="col text-center status" id="statusSeller">
					<h1 style="vertical-align:middle;">Seller</h1>
					<div class="mb-3">
						<label>or becoming our part with sign up as <span id="changeToBuyer" class="changeTo">Buyer</span></label>
					</div>
					<div class="mb-3">
						<label>Already have an account? <a href="./login.php?status=seller">Login here</a></label>
					</div>
				</div>
			</div>
		</div>

		
							
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="./script/jquery-3.5.1.min.js"></script>
		<script src="./script/script-index.js"></script>
	</body>
</html>
