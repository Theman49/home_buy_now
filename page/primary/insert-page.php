<?php
    if(isset($_POST['insert'])){
        $nama_object = $_POST['nama_object'];
        $harga = $_POST['harga'];
        $jumlah_lantai = $_POST['jumlah_lantai'];
        $jumlah_kamar_tidur = $_POST['jumlah_kamar_tidur'];
        $luas_tanah = $_POST['luas_tanah'];
        $luas_bangunan = $_POST['luas_bangunan'];
        $usia_bangunan = $_POST['usia_bangunan'];
        $title_image = basename($_FILES['gambar']['name']);
        $size_image = $_FILES['gambar']['size'];
        $imageFileType = strtolower(pathinfo($title_image,PATHINFO_EXTENSION));


        echo $nama_object.$harga.$jumlah_lantai.$jumlah_kamar_tidur.$luas_tanah.$luas_bangunan.$usia_bangunan;
        echo $title_image;
        echo $size_image;
        echo $imageFileType;
        move_uploaded_file($_FILES['gambar']['tmp_name'], "./uploads/3.jpeg");
    }
?>