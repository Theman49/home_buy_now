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
				<form action="./primary-page.php" method="POST" class="container">
					<!-- S E L E C T I O N  C H O O S E -->
					<div class="sub-filter">
						<label for="harga">Harga</label><br/>
							<select name="harga">
								<option selected="on" value="null" style="background-color:red;padding:40px;">--Pilih disini--</option>
								<?php
									$query = mysqli_query($conn, "SELECT * FROM harga_primary");
									while($row = mysqli_fetch_array($query)){	
								?>
								<option value="<?=$row['id_harga']?>"><?=substr($row['min_harga'], 0, 3)?>-<?=substr($row['max_harga'], 0, 3)?> <?=(strlen($row['max_harga']) > 9) ? "Miliar" : "Juta"?></option>
								<?php
										}
								?>
								<option value="5M+">> 5 Miliar</option>
							</select>
						
					</div>
					<div class="sub-filter">
						<label for="lantai">Jumlah Lantai</label><br/>
							<select name="jumlah_lantai">
								<option selected="on"  value="null">--Pilih disini--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="2+">>2</option>
							</select>
						
					</div>
					<div class="sub-filter">
						<label for="kamar">Jumlah Kamar Tidur</label><br/>
							<select name="jumlah_kamar_tidur">
								<option selected="on"  value="null">--Pilih disini--</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="2+">>2</option>
							</select>
						
					</div>

					<div class="sub-filter">
						<label for="luas-bangunan">Luas Bangunan (m<sup>2</sup>)</label><br/>
							<select name="luas_bangunan" >
								<option selected="on"  value="null">--Pilih disini--</option>
								<?php
									$query = mysqli_query($conn, "SELECT * FROM luas_tanah_dan_bangunan_primary");
									while($row = mysqli_fetch_array($query)){	
								?>
								<option value="<?=$row['id_luas']?>"><?=$row['min_luas']?>-<?=$row['max_luas']?></option>
								<?php
										}
								?>

								<option value="500+">> 500</option>
							</select>
					</div>

					<button type="submit" value="true" name="filter" style="margin-top:20px">Filter</button>
					<button type="submit" onclick="document.location.href='./primary-page.php'"/>Reset</button>
				</form>
			</div>

			<!-- M A I N  C O N T E N T -->
			<div id="main-content" class="col-9">
					<?php
						if(isset($_POST['filter']) == 'true'){
							$cekNull = 0;
							$connector = ["AND","AND","AND"];
							$saveSql = [];

							$harga = $_POST['harga'];
							$sqlHarga = 'id_harga = '.$harga;
							if($harga == 'null'){
								$cekNull += 1;
								$sqlHarga = "";
							}else if($harga == '5M+'){
								$harga = 5;
								$sqlHarga = 'id_harga > '. $harga;
								array_push($saveSql,$sqlHarga);
							}
							else{
								array_push($saveSql,$sqlHarga);
							}
							
							$jumlah_lantai = $_POST['jumlah_lantai'];
							$sqlLantai = 'jumlah_lantai = '.$jumlah_lantai;
							if($jumlah_lantai == 'null'){
								$cekNull += 1;
								$sqlLantai = "";
								$connector[0] = '';
							}
							else if($jumlah_lantai == '2+'){
								$jumlah_lantai = 2;
								$sqlLantai = 'jumlah_lantai > '. $jumlah_lantai;
								array_push($saveSql,$sqlLantai);
							}else{
								array_push($saveSql,$sqlLantai);
							}

							$jumlah_kamar_tidur = $_POST['jumlah_kamar_tidur'];
							$sqlKamar = 'jumlah_kamar_tidur = '.$jumlah_kamar_tidur;
							if($jumlah_kamar_tidur == 'null'){
								$cekNull += 1;
								$sqlKamar = "";
								$connector[1] = '';
							}
							else if($jumlah_kamar_tidur == '2+'){
								$jumlah_kamar_tidur = 2;
								$sqlKamar = 'jumlah_kamar_tidur > '.$jumlah_kamar_tidur;
								array_push($saveSql,$sqlKamar);
							}else {
								array_push($saveSql,$sqlKamar);
							}

							$luas_bangunan = $_POST['luas_bangunan'];
							$sqlLuasBangunan = 'id_luas = '.$luas_bangunan;
							if($luas_bangunan == 'null'){
								$cekNull += 1;
								$sqlLuasBangunan = "";
							}else if($luas_bangunan == '500+'){
								$luas_bangunan = 7;
								$sqlLuasBangunan = 'id_luas > '.$luas_bangunan;
								array_push($saveSql,$sqlLuasBangunan);
							}else {
								array_push($saveSql,$sqlLuasBangunan);
							}

							
							if($cekNull == 4){
								$sql = "SELECT * FROM primary_home";
							}else if($cekNull == 3){
								$sql = "SELECT * FROM primary_home WHERE ".$saveSql[0];
							}else if($cekNull == 2){
								$sql = "SELECT * FROM primary_home WHERE ".$saveSql[0]." AND ".$saveSql[1];
							}else {
								$sql = "SELECT * FROM primary_home WHERE ".$saveSql[0]." AND ".$saveSql[1]." AND ".$saveSql[2];
							}
							echo $sql;
						
						}else{
							$sql = "SELECT * FROM primary_home";
						}
						$query = mysqli_query($conn, $sql);
						if(mysqli_num_rows($query) == 0){
							echo "no result";
						}else{
							while($row = mysqli_fetch_array($query)){
								$lengthPrice = strlen($row['harga']) - 6;
								$price = "";
								$pricePlus = "";
								if($lengthPrice > 3){
									$digit = $lengthPrice - 3;
									for($i=1;$i<=$digit;$i++){
										$price .= $row['harga'][$i-1];
									}
									$price .= " Miliar ";
									if($row['harga'][1] != '0'){
										for($i=1;$i<4;$i++){
											$pricePlus .= $row['harga'][$i];
										}
										$price .= $pricePlus." Juta";	
									}
									
									
								}else{
									for($i=1;$i<=$lengthPrice;$i++){
										if($row['harga'][0] == '0'){
											continue;
										}else{
											$price .= $row['harga'][$i-1];
										}
									}
									$price .= " Juta ";
									if($row['harga'][3] != '0'){
										for($i=3;$i<6;$i++){
											$pricePlus .= $row['harga'][$i];
										}
										$price .= $pricePlus." Ribu";	
									}
								}
								?>
									<div class="row item" style="border: 1px solid black;cursor:pointer;" onclick="alert('nice')">
									
										<div class="col-4" style="padding: 0px;">
											<img src="../../image/primary1.jpg" alt="foto" width="100%" height="auto">
										</div>
										<div class="col-8">
								<?php
								echo $row['nama_object']."<br/>";
								echo "Lokasi : ".$row['lokasi']."<br/>";
								echo "Harga : ".$price."<br/>";
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
<script src="../../script/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(){
			$("#searchButton").click(function() {
					console.log("hai");
					var value = $("#myInput").val().toLowerCase();
					$("#main-content .row").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
	});
</script>
	</body>
</html>
