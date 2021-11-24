<?php

include("../config.php");

if (isset($_POST['update'])) {
    $karyawan_id = $_POST['karyawan_id'];
    $nama_proyek = $_POST['nama_proyek'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tenggat_waktu = $_POST['tenggat_waktu'];
    $keterangan = $_POST['keterangan'];

    $getidproyek1 = "SELECT proyek_id FROM karyawan WHERE karyawan_id = '$karyawan_id'";
    $querygetidproyek1 = mysqli_query($mysqli, $getidproyek1);

    $arraygetid1 = mysqli_fetch_array($querygetidproyek1);
    $idproyek1 = $arraygetid1['proyek_id'];

    $sqlproyek = "UPDATE proyek SET nama_proyek='$nama_proyek', tenggat_waktu='$tenggat_waktu', keterangan='$keterangan' WHERE proyek_id='$idproyek1'";
    $queryproyek = mysqli_query($mysqli, $sqlproyek);

    $getidproyek2 = "SELECT proyek_id FROM proyek WHERE nama_proyek='$nama_proyek'";
    $querygetidproyek2 = mysqli_query($mysqli, $getidproyek2);

    $arraygetid2 = mysqli_fetch_array($querygetidproyek2);
    $idproyek2 = $arraygetid2['proyek_id'];

    $sqlkaryawan1 = "UPDATE karyawan SET proyek_id=0 WHERE proyek_id='$idproyek2'";
    $querykaryawan1 = mysqli_query($mysqli, $sqlkaryawan1);

    $sqlkaryawan2 = "UPDATE karyawan SET proyek_id='$idproyek2' WHERE nama_lengkap='$nama_lengkap'";
    $querykaryawan2 = mysqli_query($mysqli, $sqlkaryawan2);

    if($querygetidproyek1 && $queryproyek && $querygetidproyek2 && $querykaryawan1 && $querykaryawan2) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
        
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }

} else {
    die("Akses Dilarang...");
}

?>