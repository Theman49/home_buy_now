<?php
	include "../../connection.php";
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="./style-primary.css">
		


		<title>PRIMARY | Home Buy Now</title>
	</head>

	<body>

		<?php
            include "../../component/navigation.php";
        ?>
		<div class="row">
			<!-- F I L T E R -->
			<div id="filter" class="col-3">
				<form action="./primary-page.php" method="GET" class="container">
					<div class="slidecontainer">
						<label for="harga">Harga</label><br>
						<input type="range" min="100" max="1000" value="<?php if(isset($_GET['range'])){
							echo $_GET['range'];
						}else{
							echo "50";
						}?>" class="slider" id="myHarga" name="harga">
						<label id="harga"></label><label style="margin-left:5px;">Juta</label>
					</div>

					<div class="slidecontainer">
						<label for="lantai">Jumlah Lantai</label><br/>
						<input type="range" min="1" max="3" value="<?php if(isset($_GET['jumlah_lantai'])){
							echo $_GET['jumlah_lantai'];
						}else{
							echo "1";
						}?>" class="slider" id="myJumlahLantai" name="jumlah_lantai">
						<label id="jumlahLantai"></label>
					</div>

					<div class="slidecontainer">
						<label for="kamarTidur">Jumlah Kamar Tidur</label><br/>
						<input type="range" min="1" max="5" value="<?php if(isset($_GET['jumlah_kamar_tidur'])){
							echo $_GET['jumlah_kamar_tidur'];
						}else{
							echo "1";
						}?>" class="slider" id="myJumlahKamarTidur" name="jumlah_kamar_tidur">
						<label id="kamarTidur"></label>
					</div>

					<button type="submit" value="true" name="filter">Filter</button>
				</form>
			</div>

			<!-- M A I N  C O N T E N T -->
			<div id="main-content" class="col-9">
					<?php
						if(isset($_GET['filter']) == 'true'){
							$harga = $_GET['harga'];
							$jumlah_lantai = $_GET['jumlah_lantai'];
							$jumlah_kamar_tidur = $_GET['jumlah_kamar_tidur'];
					
							$harga *= 1000000;
					
							$sql = "SELECT * FROM primary_home WHERE harga <= $harga AND jumlah_lantai <= $jumlah_lantai AND jumlah_kamar_tidur <= $jumlah_kamar_tidur;";
						}else{
							$sql = "SELECT * FROM primary_home";
						}
						$query = mysqli_query($conn, $sql);

						if(mysqli_num_rows($query) == 0){
							echo "no result";
						}else{
							while($row = mysqli_fetch_array($query)){
								?>
									<div class="row" style="background-color: black;color:white;">
									
										<div class="col-4">
											<img src="../../image/primary1.jpg" alt="foto" width="100%" height="auto">
										</div>
										<div class="col-8">
								<?php
								echo $row['nama_object']."<br/>";
								echo "Lokasi : ".$row['lokasi']."<br/>";
								echo "Harga : ".$row['harga']."<br/>";
								echo "Jumlah Lantai : ".$row['jumlah_lantai']."<br/>";
								echo "Jumlah Kamar Tidur : ".$row['jumlah_kamar_tidur']."<br/>";
								echo "Luas Tanah : ".$row['luas_tanah']."<br/>";
								echo "Luas Bangunan : ".$row['luas_bangunan']."<br/>";
								echo "Usia Bangunan : ".$row['usia_bangunan'];
								?>
										</div>
									</div>
								<?php
							}
						}
					?>
			</div>
		</div>
		
							
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="./script/jquery-3.5.1.min.js"></script>
		<script src="./script/script.js"></script>

		<style>
			#kategori1 {
				font-weight: bold;
				background-color: #888;
				color: #fff;
				border-radius: 5px;
			}

			#kategori1 + .dropdown-menu {
				background-color: #888;
				color: #fff; 
			}
		</style>

		<script>
		var myHarga = document.getElementById("myHarga");
		var harga = document.getElementById("harga");
		harga.innerHTML = myHarga.value;

		myHarga.oninput = function() {
			harga.innerHTML = this.value;
		}

		var myJumlahLantai = document.getElementById("myJumlahLantai");
		var jumlahLantai = document.getElementById("jumlahLantai");
		jumlahLantai.innerHTML = myJumlahLantai.value;

		myJumlahLantai.oninput = function() {
			jumlahLantai.innerHTML = this.value;
		}

		var myJumlahKamarTidur = document.getElementById("myJumlahKamarTidur");
		var kamarTidur = document.getElementById("kamarTidur");
		kamarTidur.innerHTML = myJumlahKamarTidur.value;

		myJumlahKamarTidur.oninput = function() {
			kamarTidur.innerHTML = this.value;
		}
		</script>
	</body>
</html>
