<?php

include("../config.php");

if(isset($_POST['update'])){
    $karyawan_id = $_POST['karyawan_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $telp = $_POST['telp'];
    $asal = $_POST['asal'];
    $kontrak = $_POST['kontrak'];
    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];

    $getid = "SELECT jabatan_id, gaji_id FROM karyawan WHERE karyawan_id = '$karyawan_id'";
    $querygetid = mysqli_query($mysqli, $getid);

    $arraygetid = mysqli_fetch_array($querygetid);
    $idjabatan = $arraygetid['jabatan_id'];
    $idgaji = $arraygetid['gaji_id'];

    $sqlkaryawan = "UPDATE karyawan SET nama_lengkap='$nama_lengkap', telp='$telp', asal='$asal', kontrak='$kontrak' WHERE karyawan_id='$karyawan_id'";
    $querykaryawan = mysqli_query($mysqli, $sqlkaryawan);

    $sqljabatan = "UPDATE jabatan SET nama_jabatan='$nama_jabatan' WHERE jabatan_id='$idjabatan'";
    $queryjabatan = mysqli_query($mysqli, $sqljabatan);

    $sqlgaji = "UPDATE gaji SET gaji_pokok='$gaji_pokok', tunjangan='$tunjangan' WHERE gaji_id='$idgaji'";
    $querygaji = mysqli_query($mysqli, $sqlgaji);

    // apakah query simpan berhasil?
    if($queryjabatan && $querygaji && $querykaryawan) {
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