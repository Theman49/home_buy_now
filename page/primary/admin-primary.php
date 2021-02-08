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
		


		<title>ADMIN PRIMARY | Home Buy Now</title>
	</head>

	<body>

		<div class="" style="">
            <h1>Admin</h1>
        </div>

		<div class="row">
			<!-- F I L T E R -->
			<div id="input-data" class="col-md-3 col-sm-12">
				<form action="./insert-page.php" method="POST" enctype="multipart/form-data" class="container">
                    <textarea name="nama_object" placeholder="Nama Object"></textarea>
                    <input type="number" name="harga" placeholder="Harga"/>
                    <input type="number" min="1" name="jumlah_lantai" placeholder="Jumlah Lantai"/>
                    <input type="number" min="1" name="jumlah_kamar_tidur" placeholder="Jumlah Kamar Tidur"/>
                    <input type="number" min="1" name="luas_tanah" placeholder="Luas Tanah"/>
                    <input type="number" min="1" name="luas_bangunan" placeholder="Luas Bangunan"/>
                    <input type="number" min="1" name="usia_bangunan" placeholder="Usia Bangunan"/>
                    <input type="file" name="gambar"/>

					<button type="submit" value="true" name="insert" style="margin-top:20px">Insert</button>
					<button type="reset">Reset</button>
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
									<div class="row item" style="border: 1px solid black;cursor:pointer;" onclick="alert('<?=$row['nama_object']?>')">
									
										<div class="col-4" style="padding: 0px;">
											<img src="../../image/<?=$row['id_primary']?>.jpg" alt="foto" width="100%" height="100%">
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
                                                    <div style="margin-top:10px;">
                                                        <a class="update btn" href="#edit">Edit</a>
                                                        <a class="delete btn" href="#delete">Hapus</a>
                                                    </div>
												</div>
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
					})
			});
		</script>
	</body>
</html>