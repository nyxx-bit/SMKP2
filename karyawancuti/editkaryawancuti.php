<?php

include('../config.php');

if(isset($_POST['update'])) {
    $karyawan_id = $_POST['karyawan_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggalmulai = $_POST['tanggalmulai'];
    $tanggalakhir = $_POST['tanggalakhir'];
    $keterangan = $_POST['keterangan'];

    $getid = "SELECT cuti_id FROM karyawan WHERE karyawan_id = '$karyawan_id'";
    $querygetid = mysqli_query($mysqli, $getid);

    $arraygetid = mysqli_fetch_array($querygetid);
    $idcuti = $arraygetid['cuti_id'];

    $sqlkaryawan = "UPDATE karyawan SET nama_lengkap='$nama_lengkap' WHERE karyawan_id='$karyawan_id'";
    $querykaryawan = mysqli_query($mysqli, $sqlkaryawan);

    $sqlcuti = "UPDATE cuti SET tanggalmulai = '$tanggalmulai', tanggalakhir = '$tanggalakhir', keterangan='$keterangan' WHERE cuti_id = '$idcuti'";
    $querycuti = mysqli_query($mysqli, $sqlcuti);

    if($querygetid && $querykaryawan && $querycuti) {
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