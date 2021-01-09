<?php
	include "../../connection.php";
	
	
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		


		<title>PRIMARY | Home Buy Now</title>
	</head>

	<body>

		<?php
            include "../../component/navigation.php";
        ?>
		<form action="./primary-page.php" method="GET" class="container">
		<div>
				<div class="slidecontainer">
				
					<input type="range" min="1" max="100" value="<?php if(isset($_GET['range'])){
						echo $_GET['range'];
					}else{
						echo "50";
					}?>" class="slider" id="myRange" name="range">
				</div>
		</div>
		<div>
				<p id="demo"></p>
		</div>
		<input type="submit" value="filter">
		</form>
							
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
		var slider = document.getElementById("myRange");
		var output = document.getElementById("demo");
		output.innerHTML = slider.value;

		slider.oninput = function() {
		output.innerHTML = this.value;
		}
		</script>
	</body>
</html>
