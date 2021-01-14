<?php
	include "../connection.php";

	if(isset($_POST['submitSignUpSeller'])){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$no_handphone = $_POST['no_handphone'];
		$id_kategori = $_POST['id_kategori'];
		$password = $_POST['password'];

		$select = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' AND status = 'seller'");
		if(mysqli_num_rows($select) == 0){
			$query = mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$nama', '$email', '$no_handphone', '$password', 'seller', $id_kategori)");
			if(!$query){
				header("Location: ../?status=gagal-sign-up");
				die(mysqli_error($query));
			}else{
				$getKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = $id_kategori");
				$row = mysqli_fetch_assoc($getKategori);
				$jenis_kategori = $row['jenis_kategori'];
				echo "<script>
				alert('Berhasil Mendaftar');
				document.location.href = '../page/".$jenis_kategori."/".$jenis_kategori."-page.php?email=".$email."&status=seller';
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