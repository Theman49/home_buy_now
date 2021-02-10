<?php
    include "../../connection.php";
    $id_primary = $_GET['id'];
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="./style-primary.css">
		


		<title>EDIT PRIMARY | Home Buy Now</title>
	</head>

	<body>

		<div class="" style="">
            <h1>Edits</h1>
        </div>

		<div class="row">
			<!-- F I L T E R -->
			<div id="input-data" class="col-md-3 col-sm-12">
				<form action="" method="POST" enctype="multipart/form-data" class="container">
                    <?php
                        $sql = "SELECT * FROM primary_home WHERE id_primary = $id_primary;";
                        $query = mysqli_query($conn, $sql);
                        
                        
                        if(mysqli_num_rows($query) == 0){
                            echo "no result";
                        }else{
                            $row = mysqli_fetch_array($query);
                        }
                    ?>
                    <textarea name="nama_object" placeholder="Nama Object" required><?=$row['nama_object']?></textarea>
					<select name="lokasi" style="margin: 10px 0px;padding: 4px 0px">
						<?php
                            $id_lokasi = $row['id_lokasi'];
							$query = mysqli_query($conn, "SELECT * FROM lokasi");
							while($row = mysqli_fetch_array($query)){	
						?>
                        <option 
                            <?php
								$lokasi = $row['id_lokasi'];
                                echo ($row['id_lokasi'] == $id_lokasi) ? "selected='on' value='$lokasi'" : "value='$lokasi'";
                            ?>>
                            <?=$row['nama_lokasi']?>
                        </option>
						<?php
								}
						?>
					</select>
                    
                    <?php
                        $sql = "SELECT * FROM primary_home WHERE id_primary = $id_primary;";
                        $query = mysqli_query($conn, $sql);
                        
                        
                        if(mysqli_num_rows($query) == 0){
                            echo "no result";
                        }else{
                            $row = mysqli_fetch_array($query);
                        }
                    ?>

                    <input type="number" name="harga" placeholder="Harga" value="<?=$row['harga']?>" required/>
                    <input type="number" min="1" name="jumlah_lantai" placeholder="Jumlah Lantai" value="<?=$row['jumlah_lantai']?>" required/>
                    <input type="number" min="1" name="jumlah_kamar_tidur" placeholder="Jumlah Kamar Tidur" value="<?=$row['jumlah_kamar_tidur']?>" required/>
                    <input type="number" min="1" name="luas_tanah" placeholder="Luas Tanah" value="<?=$row['luas_tanah']?>" required/>
                    <input type="number" min="1" name="luas_bangunan" placeholder="Luas Bangunan" value="<?=$row['luas_bangunan']?>" required/>
                    <input type="number" min="1" name="usia_bangunan" placeholder="Usia Bangunan" value="<?=$row['usia_bangunan']?>" required/>
					<label>Poster Utama</label><br/>
                    <input type="file" name="gambar" required/>
					<label>Poster Tambahan</label><br/>
					<input type="file" name="gambar_multiple[]" multiple required/>

					<button type="submit" value="true" name="update" style="margin-top:20px">Update</button>
					<button type="reset">Reset</button>
				</form>
			</div>

			<!-- M A I N  C O N T E N T -->
			<div id="main-content" class="col-md-9 col-sm-12">
					<?php
						$sql = "SELECT * FROM primary_home WHERE id_primary = $id_primary;";
						$query = mysqli_query($conn, $sql);
						if(mysqli_num_rows($query) == 0){
							echo "no result";
						}else{
                                $row = mysqli_fetch_array($query);
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
								<?php
						}
					?>
			</div>
		</div>

        <!-- action update -->
        <?php
		if(isset($_POST['update'])){
			$nama_object = mysqli_real_escape_string($conn, $_POST['nama_object']);
            $id_lokasi = $_POST['lokasi'];
            $harga = $_POST['harga'];
            $jumlah_lantai = $_POST['jumlah_lantai'];
            $jumlah_kamar_tidur = $_POST['jumlah_kamar_tidur'];
            $luas_tanah = $_POST['luas_tanah'];
            $luas_bangunan = $_POST['luas_bangunan'];
            $usia_bangunan = $_POST['usia_bangunan'];
            $title_image = basename($_FILES['gambar']['name']);
            $size_image = $_FILES['gambar']['size'];
            $imageFileType = strtolower(pathinfo($title_image,PATHINFO_EXTENSION));
    
            $sql = "SELECT * FROM harga_primary";
            $select = mysqli_query($conn, $sql);
    
            $id_harga = $id_luas = 0;
            while($row = mysqli_fetch_array($select)){
                $id = $row['id_harga'];
                $min_harga = $row['min_harga'];
                $max_harga = $row['max_harga'];
    
                if(($harga >= $min_harga) && ($harga <= $max_harga)){
    
                // echo $id.$min_harga.$max_harga;
                // echo "<br/>";
                    $id_harga = $id;
                }
            }
    
            $sql = "SELECT * FROM luas_tanah_dan_bangunan_primary";
            $select = mysqli_query($conn, $sql);
    
            while($row = mysqli_fetch_array($select)){
                $id = $row['id_luas'];
                $min_luas = $row['min_luas'];
                $max_luas = $row['max_luas'];
    
                if(($luas_tanah >= $min_luas) && ($luas_tanah <= $max_luas)){
    
                // echo $id.$min_luas.$max_luas;
                // echo "<br/>";
                    $id_luas = $id;
                }
            }
            // echo "harga";
            // echo $id_harga."<br/>";
    
            // echo "luas";
            // echo $id_luas;
    
            $sql = "UPDATE  primary_home SET nama_object = '$nama_object', id_lokasi =  $id_lokasi, jumlah_lantai = $jumlah_lantai, harga = $harga, luas_tanah = $luas_tanah, luas_bangunan = $luas_bangunan, jumlah_kamar_tidur = $jumlah_kamar_tidur, usia_bangunan = $usia_bangunan, id_harga = $id_harga, id_luas = $id_luas WHERE id_primary = $id_primary;";
            $update = mysqli_query($conn, $sql);
    
            if(!$update){
                die(mysqli_error($update));
            }else{
                // $select = mysqli_query($conn, "SELECT * FROM primary_image;");
                // $count = mysqli_num_rows($select);
    
                // if($count == 0){
                //     $number_item = 1;
                //     $insert = mysqli_query($conn, "INSERT INTO primary_image VALUES($getLastId, $number_item);");
                // }else{
    
                // }
                $select = mysqli_query($conn, "SELECT * FROM primary_image WHERE id_primary = $id_primary AND (item = '1.jpg' OR item = '1.jpeg');");
                $selected = mysqli_fetch_array($select);
                $item = $selected['item'];

                $type = "1.".$imageFileType;
                // echo $type;
    
                $update_image = mysqli_query($conn, "UPDATE primary_image SET item = '$type' WHERE item = '$item' AND id_primary = $id_primary;");
                // echo $insert_image;
    
                $destination = "./uploads/".$id_primary;
                if(move_uploaded_file($_FILES['gambar']['tmp_name'], $destination."/1.".$imageFileType)){
					echo "<script>alert('berhasil')</script>";
				}else{
					echo "<script>alert('gagal')</script>";
				}
            }
		}
            
        ?>
		
		
							
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