<?php

include("../config.php");

if(isset($_POST['delete'])){
    $karyawan_id = $_POST['karyawan_id'];

    $getid = "SELECT proyek_id FROM karyawan WHERE karyawan_id = '$karyawan_id'";
    $querygetid = mysqli_query($mysqli, $getid);

    $arraygetid = mysqli_fetch_array($querygetid);
    $idproyek = $arraygetid['proyek_id'];

    $sqldelete = "DELETE FROM proyek where proyek_id='$idproyek'";
    $query = mysqli_query($mysqli, $sqldelete);

    // apakah query simpan berhasil?
    if($querygetid && $query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
        
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>