<?php 
    include "../connection.php";

	if(isset($_POST['submitSignUpBuyer'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$no_handphone = $_POST['no_handphone'];
		$jenis_kategori = $_POST['jenis_kategori'];
		$password = $_POST['password'];

		$select = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' AND status = 'buyer'");
		if(mysqli_num_rows($select) == 0){
			$query = mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$nama', '$email', '$no_handphone', '$jenis_kategori', '$password', DEFAULT)");
			if(!$query){
				header("Location: ../?status=gagal-sign-up");
				die(mysqli_error($query));
			}else{
				echo "<script>
				alert('Berhasil Mendaftar');
				document.location.href = '../page/".$jenis_kategori."/".$jenis_kategori."-page.php?email=".$email."&status=buyer';
				</script>";
			}
		}else{
			echo "<script>
				alert('Email Anda Sudah Terdaftar, Silahkan Login :)');
				document.location.href = '../index.php';
				</script>";
		}
	}
?>