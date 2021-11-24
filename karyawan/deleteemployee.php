<?php

include('../config.php');

if(isset($_POST['delete'])){
    $karyawan_id = $_POST['karyawan_id'];

    $sqldelete = "DELETE FROM karyawan where karyawan_id='$karyawan_id'";
    $query = mysqli_query($mysqli, $sqldelete);
    
    // apakah query simpan berhasil?
    if($sqldelete) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: ../index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}
?>