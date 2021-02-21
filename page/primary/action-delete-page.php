<?php
    include "../../connection.php";

    $id_primary = $_GET['id'];
    echo $id_primary;

    $sql = mysqli_query($conn, "DELETE FROM primary_home WHERE id_primary = $id_primary");
    $sql = mysqli_query($conn, "DELETE FROM primary_image WHERE id_primary = $id_primary");

    if(!$sql && !$sql2){
        die(mysqli_error($conn));
    }

    $destination = "./uploads/".$id_primary."/";

    if($handle = opendir($destination)){
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                // echo "$entry\n";
                unlink($destination.$entry);
            }
        }
    }

    rmdir($destination);

    echo "sukses";
?>