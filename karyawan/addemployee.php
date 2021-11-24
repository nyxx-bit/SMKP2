<?php

include("../config.php");

if(isset($_POST['submit'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $telp = $_POST['telp'];
    $asal = $_POST['asal'];
    $kontrak = $_POST['kontrak'];
    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];

    $sqljabatan = "INSERT INTO jabatan (nama_jabatan) VALUE ('$nama_jabatan')";
    $queryjabatan = mysqli_query($mysqli, $sqljabatan);
    $idjabatan = mysqli_insert_id($mysqli);

    $sqlgaji = "INSERT INTO gaji (gaji_pokok, tunjangan) VALUE ('$gaji_pokok', '$tunjangan')";
    $querygaji = mysqli_query($mysqli, $sqlgaji);
    $idgaji = mysqli_insert_id($mysqli);

    $sqlkaryawan = "INSERT INTO karyawan (nama_lengkap, telp, asal, kontrak, jabatan_id, gaji_id, cuti_id, proyek_id) VALUE ('$nama_lengkap', '$telp', '$asal', '$kontrak', '$idjabatan', '$idgaji', '0', '0' )";
    $querykaryawan = mysqli_query($mysqli, $sqlkaryawan);

    // apakah query simpan berhasil?
    if($queryjabatan && $querygaji && $querykaryawan) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: ../index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>