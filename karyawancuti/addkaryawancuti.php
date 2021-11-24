<?php

include("../config.php");

if(isset($_POST['submit'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggalmulai = $_POST['tanggalmulai'];
    $tanggalakhir = $_POST['tanggalakhir'];
    $keterangan = $_POST['keterangan'];

    $sqlcuti = "INSERT INTO cuti (tanggalmulai, tanggalakhir, keterangan) VALUE ('$tanggalmulai', '$tanggalakhir', '$keterangan')";
    $querycuti = mysqli_query($mysqli, $sqlcuti);
    $idcuti = mysqli_insert_id($mysqli);

    $sqlkaryawan = "UPDATE karyawan SET cuti_id='$idcuti' WHERE nama_lengkap='$nama_lengkap'";
    $querykaryawan = mysqli_query($mysqli, $sqlkaryawan);

    // apakah query simpan berhasil?
    if($querycuti && $querykaryawan) {
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