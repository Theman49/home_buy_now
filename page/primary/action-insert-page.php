<?php

    include "../../connection.php";

    if(isset($_POST['insert'])){
        $query = mysqli_query($conn, "SELECT * FROM primary_home;");
        $getLastId = mysqli_num_rows($query);
        $getLastId++;

        $nama_object = $_POST['nama_object'];
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

        $sql = "INSERT INTO primary_home VALUES($getLastId, '$nama_object', $id_lokasi, $jumlah_lantai, $harga, $luas_tanah, $luas_bangunan, $jumlah_kamar_tidur, $usia_bangunan, $id_harga, $id_luas);";
        $insert = mysqli_query($conn, $sql);

        if(!$insert){
            die(mysqli_error($insert));
        }else{
            // $select = mysqli_query($conn, "SELECT * FROM primary_image;");
            // $count = mysqli_num_rows($select);

            // if($count == 0){
            //     $number_item = 1;
            //     $insert = mysqli_query($conn, "INSERT INTO primary_image VALUES($getLastId, $number_item);");
            // }else{

            // }
            
            $type = "1.".$imageFileType;
            // echo $type;

            $insert_image = mysqli_query($conn, "INSERT INTO primary_image VALUES($getLastId, $getLastId, '$type');");
            // echo $insert_image;

            $destination = "./uploads/".$getLastId;
            // echo $destination;
            mkdir($destination, 0777, true);
            move_uploaded_file($_FILES['gambar']['tmp_name'], $destination."/1.".$imageFileType);
            echo "<script>alert('suksess');document.location.href = './admin-primary.php'</script>";
        }
    }
?>