<?php
// Create database connection using config file
include_once("../config.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sistem Manajemen Karyawan Perusahaan - RPL</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../fonts/material-icons.min.css">
    <link rel="stylesheet" href="../css/Add-Another-Button.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink iconsenyum"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>SMKP RPL</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li role="presentation" class="nav-item"><a class="nav-link" href="../"><i
                                class="fas fa-user"></i><span>Data Karyawan</span></a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="index.php"><i
                                class="fas fa-briefcase"></i><span>Data Karyawan Cuti</span></a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="../karyawanproyek"><i
                                class="far fa-user-circle"></i><span>Proyek Karyawan</span></a></li>
                </ul>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form
                            class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            method="GET" action="index.php">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                    placeholder="Search for ..." name="search" id="search" />
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="submit"
                                        value="search"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>

                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        data-toggle="dropdown" aria-expanded="false" href="#"><span
                                            class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo ucfirst($_SESSION['role']) ?></span><img
                                            class="border rounded-circle img-profile"
                                            src="../img/avatars/avatar1.jpeg" /></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="../login/logout.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="row">
                    <div class="col" style="width: 505px;">
                        <h2 style="margin-top: 12px;margin-right: 0px;margin-left: 31px;">Team</h2>
                    </div>
                    <div class="col"><button
                            class="btn btn-outline-primary btn-sm float-none float-sm-none add-another-btn"
                            type="button" style="margin-right: 30px;margin-top: 12px;" data-toggle="modal"
                            data-target="#addemployee">Add Employee<i class="fas fa-plus-circle edit-icon"></i></button>
                    </div>
                </div>
                <div class="modal fade" id="addemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-6">
                                    <form method="POST" action="addkaryawancuti.php">
                                        <select class="border rounded-0 form-control"
                                            style="width: 440px;margin-bottom: 15px;" id="nama_lengkap"
                                            name="nama_lengkap">
                                            <?php
                                                $tampil1 = mysqli_query($mysqli, "SELECT * from mykaryawan");
                                                while($data1 = mysqli_fetch_array($tampil1)) :
                                            ?>
                                            <option><?=$data1['nama_lengkap']?></option>
                                            <?php endwhile; ?>
                                        </select>
                                        <input type="date" class="border rounded-0 form-control"
                                            style="width: 440px;margin-bottom: 15px;" placeholder="Tanggal Mulai Cuti"
                                            name="tanggalmulai" />
                                        <input type="date" class="border rounded-0 form-control"
                                            style="width: 440px;margin-bottom: 15px;" placeholder="Tanggal Akhir Cuti"
                                            name="tanggalakhir" />
                                        <input type="text" class="border rounded-0 form-control"
                                            style="width: 440px;margin-bottom: 15px;" placeholder="Keterangan"
                                            name="keterangan" />
                                        <input type="submit" class="btn btn-primary" value="Save Changes"
                                            name="submit"></input>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Data Karyawan Cuti</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal Mulai Cuti</th>
                                            <th>Tanggal Akhir Cuti</th>
                                            <th>Keterangan</th>
                                            <?php 
                                            if ($_SESSION['role'] == 'admin'){
                                            echo <<< HaloDoc2
                                            <th>Manage</th>
                                            HaloDoc2;
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <?php 
                                        if(isset($_GET['search'])){
                                            $cari = $_GET['search'];
                                            $tampil = mysqli_query($mysqli, "select * from karyawancuti where nama_lengkap like '%".$cari."%'"); 
                                        }
                                        else{
                                            $tampil = mysqli_query($mysqli, "select * from karyawancuti"); 
                                        }
                                        while($data = mysqli_fetch_array($tampil)) :
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="namecntr"><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="../img/avatars/avatar5.jpeg"><?=$data['nama_lengkap']?>
                                            </td>
                                            <td><?=$data['tanggalmulai']?></td>
                                            <td><?=$data['tanggalakhir']?></td>
                                            <td><?=$data['keterangan']?></td>
                                            <?php
                                            if ($_SESSION['role'] == 'admin'){
                                            ?>
                                            <td>
                                                <i class="fas fa-edit iconedit" style="padding-left: 9px;" type="button"
                                                    data-toggle="modal" data-target="#edit<?=$data['karyawan_id']?>">
                                                </i>
                                                <i class="material-icons icondelete" style="padding-left: 8px;"
                                                    type="button" data-toggle="modal"
                                                    data-target="#deletemas<?=$data['karyawan_id']?>">delete</i>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <div class="modal fade" id="edit<?=$data['karyawan_id']?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Employee</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-6">
                                                            <form method="POST" action="editkaryawancuti.php">
                                                                <input type="hidden"
                                                                    class="border rounded-0 form-control"
                                                                    style="width: 440px;margin-bottom: 15px;"
                                                                    placeholder="Id" name="karyawan_id"
                                                                    value="<?=$data['karyawan_id']?>" />
                                                                <select class="border rounded-0 form-control"
                                                                    style="width: 440px;margin-bottom: 15px;"
                                                                    id="nama_lengkap" name="nama_lengkap"
                                                                    value="<?=$data['nama_lengkap']?>">
                                                                    <?php
                                                                        $tampil1 = mysqli_query($mysqli, "SELECT * from mykaryawan");
                                                                        while($data1 = mysqli_fetch_array($tampil1)) :
                                                                    ?>
                                                                    <option><?=$data1['nama_lengkap']?></option>
                                                                    <?php endwhile; ?>
                                                                </select>
                                                                <input type="date" class="border rounded-0 form-control"
                                                                    style="width: 440px;margin-bottom: 15px;"
                                                                    placeholder="Tanggal Mulai" name="tanggalmulai"
                                                                    value="<?=$data['tanggalmulai']?>" />
                                                                <input type="date" class="border rounded-0 form-control"
                                                                    placeholder="Tanggal Akhir"
                                                                    style="margin-bottom: 15px;width: 440px;"
                                                                    name="tanggalakhir"
                                                                    value="<?=$data['tanggalakhir']?>" />
                                                                <input type="text" class="border rounded-0 form-control"
                                                                    style="width: 440px;margin-bottom: 15px;"
                                                                    placeholder="Keterangan" name="keterangan"
                                                                    value="<?=$data['keterangan']?>" />
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Save Changes" name="update"></input>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="deletemas<?=$data['karyawan_id']?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Employee</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-6">
                                                            <form method="POST" action="deletekaryawancuti.php">
                                                                <h6>Apakah Anda Yakin?</h6>
                                                                <input type="hidden"
                                                                    class="border rounded-0 form-control"
                                                                    style="width: 440px;margin-bottom: 15px;"
                                                                    placeholder="Id" name="karyawan_id"
                                                                    value="<?=$data['karyawan_id']?>" />
                                                                <input type="submit" class="btn btn-primary"
                                                                    value="Okay" name="delete"></input>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                    <?php endwhile; ?>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Nama</strong></td>
                                            <td><strong>Tanggal Mulai Cuti</strong></td>
                                            <td><strong>Tanggal Akhir Cuti</strong></td>
                                            <td><strong>Keterangan</strong></td>
                                            <?php 
                                            if ($_SESSION['role'] == 'admin'){
                                            echo <<<HaloDoc
                                            <td><strong>Manage</strong></td>
                                            HaloDoc;
                                            }
                                            ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © White House 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../js/theme.js"></script>
</body>

</html>