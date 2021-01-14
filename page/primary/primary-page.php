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
				<div class="slidecontainer">
						<label for="harga">Harga (juta)</label><br/>
							<input class="min-max" type="number" min=100 value="<?php if(isset($_POST['min_harga'])){
									echo $_POST['min_harga'];
								}else{
									echo "100";
								}?>"id="minHarga" name="min_harga" placeholder="min">
						<label> - </label>
							<input class="min-max" type="number" min=100 value="<?php if(isset($_POST['max_harga'])){
									echo $_POST['max_harga'];
								}else{
									echo "100";
								}?>"id="maxHarga" name="max_harga" placeholder="max">
					</div>

					<div class="slidecontainer">
						<label for="jumlahLantai">Jumlah Lantai</label><br/>
							<input class="min-max" type="number" min=1 value="<?php if(isset($_POST['min_jumlah_lantai'])){
									echo $_POST['min_jumlah_lantai'];
								}else{
									echo "1";
								}?>"id="minJumlahLantai" name="min_jumlah_lantai" placeholder="min">
						<label> - </label>
							<input class="min-max" type="number" min=1 value="<?php if(isset($_POST['max_jumlah_lantai'])){
									echo $_POST['max_jumlah_lantai'];
								}else{
									echo "1";
								}?>"id="maxJumlahLantai" name="max_jumlah_lantai" placeholder="max">
					</div>

					<div class="slidecontainer">
						<label for="kamarTidur">Jumlah Kamar Tidur</label><br/>
							<input class="min-max" type="number" min=1 value="<?php if(isset($_POST['min_kamar_tidur'])){
									echo $_POST['min_kamar_tidur'];
								}else{
									echo "1";
								}?>"id="minKamarTidur" name="min_kamar_tidur" placeholder="min">
						<label> - </label>
							<input class="min-max" type="number" min=1 value="<?php if(isset($_POST['max_kamar_tidur'])){
									echo $_POST['max_kamar_tidur'];
								}else{
									echo "1";
								}?>"id="maxLuasBangunan" name="max_kamar_tidur" placeholder="max">
					</div>
					<div>
						<label for="luasBangunan">Luas Bangunan (m<sup>2</sup>)</label><br/>
							<input class="min-max" type="number" min=100 value="<?php if(isset($_POST['min_luas_bangunan'])){
								echo $_POST['min_luas_bangunan'];
							}else{
								echo "100";
							}?>"id="minLuasBangunan" name="min_luas_bangunan" placeholder="min">
						<label> - </label>
							<input class="min-max" type="number" min=199 value="<?php if(isset($_POST['max_luas_bangunan'])){
								echo $_POST['max_luas_bangunan'];
							}else{
								echo "100";
							}?>"id="maxLuasBangunan" name="max_luas_bangunan" placeholder="min">
					</div>
					<div class="slidecontainer">
						<label for="harga">Harga</label><br/>
							<select name="harga">
								<option selected="on">--Pilih disini--</option>
								<?php
									$query = mysqli_query($conn, "SELECT * FROM harga_primary");
									while($row = mysqli_fetch_array($query)){	
								?>
								<option value="<?=$row['id_harga']?>"><?=substr($row['min_harga'], 0, 3)?>-<?=substr($row['max_harga'], 0, 3)?> <?=(strlen($row['max_harga']) > 9) ? "Miliar" : "Juta"?></option>
								<?php
										}
								?>
								<option value="500+">> 5 Miliar</option>
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
							$min_harga = $_POST['min_harga'];
							$max_harga = $_POST['max_harga'];

							$min_jumlah_lantai = $_POST['min_jumlah_lantai'];
							$max_jumlah_lantai = $_POST['max_jumlah_lantai'];
							
							$min_kamar_tidur = $_POST['min_kamar_tidur'];
							$max_kamar_tidur = $_POST['max_kamar_tidur'];

							$min_luas_bangunan = $_POST['min_luas_bangunan'];
							$max_luas_bangunan = $_POST['max_luas_bangunan'];
					
							
							$min_harga *= 1000000;
							$max_harga *= 1000000;
							
							$sql = "SELECT * FROM primary_home WHERE harga >= $min_harga AND harga <= $max_harga AND jumlah_lantai >= $min_jumlah_lantai AND jumlah_lantai <= $max_jumlah_lantai AND jumlah_kamar_tidur >= $min_kamar_tidur AND jumlah_kamar_tidur <= $max_kamar_tidur AND luas_bangunan >= $min_luas_bangunan AND luas_bangunan <= $max_luas_bangunan;";
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
									if($row['harga'][1] != '0'){
										for($i=1;$i<4;$i++){
											$pricePlus .= $row['harga'][$i];
										}
										$price .= $pricePlus." Ribu";	
									}
								}
								?>
									<div class="row" style="border: 1px solid black">
									
										<div class="col-4">
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
