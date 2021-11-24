<?php

include("../config.php");

if (isset($_POST['submit'])){
    $nama_proyek = $_POST['nama_proyek'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tenggat_waktu = $_POST['tenggat_waktu'];
    $keterangan = $_POST['keterangan'];

    $sqlproyek = "INSERT INTO proyek (nama_proyek, tenggat_waktu, keterangan) VALUE ('$nama_proyek', '$tenggat_waktu', '$keterangan')";
    $queryproyek = mysqli_query($mysqli, $sqlproyek);
    $idproyek = mysqli_insert_id($mysqli);

    $sqlkaryawan = "UPDATE karyawan SET proyek_id='$idproyek' WHERE nama_lengkap='$nama_lengkap'";
    $querykaryawan = mysqli_query($mysqli, $sqlkaryawan);

    if($queryproyek && $querykaryawan) {
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