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
			<div id="float-filter">
				<p>filter</p>
			</div>
			<!-- F I L T E R -->
			<div id="filter" class="col-md-3 col-sm-12">
				<form action="./primary-page.php" method="POST" class="container">
					<!-- S E L E C T I O N  C H O O S E -->
					<div class="sub-filter">
						<br/>
							<select name="lokasi" <?php echo ($_POST['lokasi'] != 'null') ? "style='background-color:cyan;'": "";?>>
								<option selected="on" value="null">LOKASI</option>
								<?php
									$query = mysqli_query($conn, "SELECT * FROM lokasi");
									while($row = mysqli_fetch_array($query)){	
								?>
								<option <?php if(isset($_POST['lokasi'])){echo ($row['id_lokasi'] == $_POST['lokasi']) ? " selected='on'":"";}?>value="<?=$row['id_lokasi']?>"><?=$row['nama_lokasi']?></option>
								<?php
										}
								?>
							</select>
						
					</div>

					<div class="sub-filter">
						<br/>
						<select name="harga" <?php echo ($_POST['harga'] != 'null') ? "style='background-color:cyan;'": "";?>>
								<option selected="on" value="null">HARGA</option>
								<?php
									$query = mysqli_query($conn, "SELECT * FROM harga_primary");
									$banyak = mysqli_num_rows($query);
									while($row = mysqli_fetch_array($query)){	
								?>
								<option <?php if(isset($_POST['harga'])){echo ($row['id_harga'] == $_POST['harga']) ? " selected='on'":"";}?> 
									value="<?php echo $row['id_harga']?>"><?php if($row['id_harga'] == $banyak){echo "> 5 Miliar";}else{?>
										<?php echo (strlen($row['min_harga']) > 9) ? substr($row['min_harga'], 0, strlen($row['min_harga'])-9) : substr($row['min_harga'], 0, 3); ?>
										-
										<?php echo (strlen($row['max_harga']) > 9) ? substr($row['max_harga'], 0, strlen($row['max_harga'])-9) : substr($row['max_harga'], 0, 3); ?> 
										<?php echo (strlen($row['max_harga']) > 9) ? "Miliar" : "Juta";}?>
								</option>
								<?php
										}
								?>
							</select>
						
					</div>
					<div class="sub-filter">
						<br/>
						<select name="jumlah_lantai" <?php echo ($_POST['jumlah_lantai'] != 'null') ? "style='background-color:cyan;'": "";?>>
								<option selected="on"  value="null">JUMLAH LANTAI</option>
								<option <?php if(isset($_POST['jumlah_lantai'])){echo ($_POST['jumlah_lantai'] == 1) ? " selected='on'":"";}?>value="1">1</option>
								<option <?php if(isset($_POST['jumlah_lantai'])){echo ($_POST['jumlah_lantai'] == 2) ? " selected='on'":"";}?> value="2">2</option>
								<option <?php if(isset($_POST['jumlah_lantai'])){echo ($_POST['jumlah_lantai'] == '2+') ? " selected='on'":"";}?> value="2+">>2</option>
							</select>
						
					</div>
					<div class="sub-filter">
						<br/>
						<select name="jumlah_kamar_tidur" <?php echo ($_POST['jumlah_kamar_tidur'] != 'null') ? "style='background-color:cyan;'": "";?>>
								<option selected="on"  value="null">JUMLAH KAMAR TIDUR</option>
								<option <?php if(isset($_POST['jumlah_kamar_tidur'])){echo ($_POST['jumlah_kamar_tidur'] == 1) ? " selected='on'":"";}?> value="1">1</option>
								<option <?php if(isset($_POST['jumlah_kamar_tidur'])){echo ($_POST['jumlah_kamar_tidur'] == 2) ? " selected='on'":"";}?> value="2">2</option>
								<option <?php if(isset($_POST['jumlah_kamar_tidur'])){echo ($_POST['jumlah_kamar_tidur'] == '2+') ? " selected='on'":"";}?> value="2+">>2</option>
							</select>
						
					</div>

					<div class="sub-filter">
						<br/>
						<select name="luas_tanah" <?php echo ($_POST['luas_tanah'] != 'null') ? "style='background-color:cyan;'": "";?>>
								<option selected="on"  value="null">LUAS TANAH (m<sup>2</sup>)</option>
								<?php
									$query = mysqli_query($conn, "SELECT * FROM luas_tanah_dan_bangunan_primary");
									$banyak = mysqli_num_rows($query);
									while($row = mysqli_fetch_array($query)){	
								?>
								<option <?php if(isset($_POST['luas_tanah'])){echo ($row['id_luas'] == $_POST['luas_tanah']) ? " selected='on'":"";}?> value="<?=$row['id_luas']?>"><?php if($row['id_luas'] == $banyak){echo "> 500";}else{?><?php echo $row['min_luas'];?>-<?php echo $row['max_luas'];}?></option>
								<?php
										}
								?>
							</select>
					</div>

					<button type="submit" value="true" name="filter" style="margin-top:20px">Filter</button>
					<button type="reset" onclick="document.location.href='./primary-page.php'"/>Reset</button>
				</form>

				<div style="margin-top:30px">
					<h3>Berminat? Hubungi Sales untuk :</h3>
					<ul>
						<li>Info Diskon dan Promo</li>
						<li>Appointment Jadwal Survey <a href="https://api.whatsapp.com/send?phone=6285729331669">Disini!</a></li>
					</ul>
					
				</div>
			</div>

			<!-- M A I N  C O N T E N T -->
			<div id="main-content" class="col-md-9 col-sm-12">
					<?php
						if(isset($_POST['filter']) == 'true'){

							$cekNull = 0;
							$saveSql = [];

							$getLokasi = $_POST['lokasi'];
							$sqlLokasi = 'id_lokasi = '.$getLokasi;
							if($getLokasi == 'null'){
								$cekNull += 1;
								$sqlLokasi = "";
							}else{
								array_push($saveSql,$sqlLokasi);
							}

							$harga = $_POST['harga'];
							$sqlHarga = 'id_harga = '.$harga;
							if($harga == 'null'){
								$cekNull += 1;
								$sqlHarga = "";
							}
							else if($harga == '5M+'){
								$harga = 6;
								$sqlHarga = 'id_harga = '. $harga;
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

							$luas_tanah = $_POST['luas_tanah'];
							$sqlLuasTanah = 'id_luas = '.$luas_tanah;
							if($luas_tanah == 'null'){
								$cekNull += 1;
								$sqlLuasTanah = "";
							}else if($luas_tanah == '500+'){
								$luas_tanah = 7;
								$sqlLuasTanah = 'id_luas > '.$luas_tanah;
								array_push($saveSql,$sqlLuasTanah);
							}else {
								array_push($saveSql,$sqlLuasTanah);
							}

							
							if($cekNull == 5){
								$sql = "SELECT * FROM primary_home";
							}else if($cekNull == 4){
								$sql = "SELECT * FROM primary_home WHERE ".$saveSql[0];
							}else if($cekNull == 3){
								$sql = "SELECT * FROM primary_home WHERE ".$saveSql[0]." AND ".$saveSql[1];
							}else if($cekNull == 2){
								$sql = "SELECT * FROM primary_home WHERE ".$saveSql[0]." AND ".$saveSql[1]." AND ".$saveSql[2];
							}else {
								$sql = "SELECT * FROM primary_home WHERE ".$saveSql[0]." AND ".$saveSql[1]." AND ".$saveSql[2]." AND ".$saveSql[3];
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
									<div class="row item" style="border: 1px solid black;cursor:pointer;" onclick="openModal('myModal<?=$row['id_primary']?>');currentSlide(<?=$row['id_primary']?>, 'myModal<?=$row['id_primary']?>')">
										
										<?php
											$id_primary = $row['id_primary'];

											$select = mysqli_query($conn, "SELECT * FROM primary_image WHERE id_primary = $id_primary AND (item = '1.jpg' OR item = '1.jpeg');");
											$image = mysqli_fetch_array($select);
										?>

										<div class="col-4" style="padding: 0px;">
											<img src="./uploads/<?=$row['id_primary']?>/<?=$image['item']?>" alt="<?=$image['item']?>" width="100%" height="100%">
										</div>
										<div class="col-8">
											<h2 style="margin:10px auto;text-align:center;">
												<?php
												echo $row['nama_object']."<br/>";
												?>
											</h2>
											<div class="row" style="margin:20px;">
												<div class="col">
													<?php
													$idLokasi = $row['id_lokasi'];
													$see = mysqli_query($conn, "SELECT nama_lokasi FROM lokasi WHERE id_lokasi = $idLokasi");
													$lokasi = mysqli_fetch_assoc($see);
													echo "Lokasi : ".$lokasi['nama_lokasi']."<br/>";
													echo "Harga : ".$price."<br/>";
													echo "Jumlah Lantai : ".$row['jumlah_lantai']."<br/>";
													echo "Jumlah Kamar Tidur : ".$row['jumlah_kamar_tidur']."<br/>";
													?>
												</div>

												<div class="col">
													<?php
													echo "Luas Tanah : ".$row['luas_tanah']." m<sup>2</sup><br/>";
													echo "Luas Bangunan : ".$row['luas_bangunan']." m<sup>2</sup><br/>";
													echo "Usia Bangunan : ".$row['usia_bangunan'];
													?>
												</div>
											</div>
										</div>
									</div>

									<div id="myModal<?=$id_primary?>" class="modal">
										<span class="close cursor" onclick="closeModal('myModal<?=$id_primary?>')">&times;</span>
										<div class="modal-content">
											<?php 
											$destination = "./uploads/".$id_primary."/";
											$nomor = 1;

											$countOtherPoster = mysqli_query($conn, "SELECT * FROM primary_image WHERE id_primary = $id_primary ORDER BY item ASC");

											$counted = mysqli_num_rows($countOtherPoster);

											while($image_item = mysqli_fetch_array($countOtherPoster)){
												?>
													<div class="mySlides">
														<div class="numbertext"><?=$nomor?> / <?=$counted?></div>
														<img src="<?=$destination.$image_item['item']?>" alt="<?=$image_item['item']?>" style="width:100%;height:100%;">
													</div>
												<?php
												$nomor++;
											}

											?>

											<?php
												

												if($counted > 1){
												?>
													<a class="prev" onclick="plusSlides(-1, 'myModal<?=$row['id_primary']?>')">&#10094;</a>
													<a class="next" onclick="plusSlides(1, 'myModal<?=$row['id_primary']?>')">&#10095;</a>
												<?php		
												}
											?>

											<div class="caption-container">
												<p id="caption"></p>
											</div>

											<div class="row">
												<?php
												$nomor=1;
												
												$countOtherPoster = mysqli_query($conn, "SELECT * FROM primary_image WHERE id_primary = $id_primary ORDER BY item ASC");

												while($image_item = mysqli_fetch_array($countOtherPoster)){
												?>
														
													<div class="col">
														<img class="demo cursor" src="<?=$destination.$image_item['item']?>" alt="<?=$image_item['item']?>" style="width:100%;height:100%;" onclick="currentSlide(<?=$nomor?>, 'myModal<?=$row['id_primary']?>')">
													</div>
													<?php
														$nomor++;
													}
												?>
											</div>

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





		<script src="../../script/jquery-3.5.1.min.js"></script>
		<script src="./script-primary.js"></script>
		<script>
		$(document).ready(function(){
					$("#searchButton").click(function() {
							var value = $("#myInput").val().toLowerCase();
							$("#main-content .row").filter(function() {
								$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					});
					// toogle hide and block with jquery
					$("#float-filter").click(function() {
						var filter = $('#filter');
						if(filter.css("display") == "block"){
							filter.css("display","none");
						}else{
							filter.css("display","block");
						}
					});
					


			});
		</script>


		
	</body>
</html>