<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
    die("Anda belum login");//jika belum login jangan lanjut..
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Dasboard</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <style>
        /* CSS untuk mengatur ukuran logo */
        .logo {
        width: 45px; /* Sesuaikan ukuran sesuai kebutuhan */
        height: auto; /* Ini akan menjaga aspek rasio logo */
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman_admin.php">
            <div class="sidebar-brand-text mx-3"><img src="assets/img/logo.jpg" alt="" class="logo"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="halaman_admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Admin -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_admin.php">
                    <i class="fas fa-user-cog"></i>
                    <span>Admin</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Nasabah -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_nasabah.php">
                    <i class="fas fa-users"></i>
                    <span>Nasabah</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Sampah -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-trash"></i>
                    <span>Sampah</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Sampah:</h6>
                        <a class="collapse-item" href="sampah.php">Tabel Sampah</a>
                        <a class="collapse-item" href="tabel_kategori.php">Kategori Sampah</a>
                        <a class="collapse-item" href="harga_nasabah.php">Detil Harga Nasabah</a>
                        <a class="collapse-item" href="harga_pengepul.php">Detil Harga Pengepul</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Setor -->
            <li class="nav-item active">
                <a class="nav-link" href="setor.php">
                    <i class="fas fa-cart-plus"></i>
                    <span>Setor</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Tabungan -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_penabung.php">
                    <i class="fas fa-book"></i>
                    <span>Riwayat Setor</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Tabungan -->
            <li class="nav-item active">
                <a class="nav-link" href="validasi_pengajuan.php">
                    <i class="fas fa-check"></i>
                    <span>Validasi Pengajuan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800" align="center">Ubah Bobot</h1>

                    <!-- Content Row -->
                    <div class="row">
                    <?php
                    include 'config.php';
                    $id_setor = $_GET['id_setor'];
                    $id_sampah = $_GET['id_sampah'];
                    $detil  = mysqli_query($db, "select * from detil_setor where id_sampah='$id_sampah' AND id_setor='$id_setor' ");
                    $row        = mysqli_fetch_array($detil);
                    
                    $setor  = mysqli_query($db, "select * from setoran where id_setor='$id_setor' ");
                    $baris  = mysqli_fetch_array($setor);
                    $id_nasabah = $baris['id_nasabah'];
                    
                    $tabungan  = mysqli_query($db, "select * from tabungan where id_nasabah='$id_nasabah' ");
                    $tabung  = mysqli_fetch_array($tabungan);
                    
                    $sampah  = mysqli_query($db, "select * from sampah where id_sampah='$id_sampah' ");
                    $smp  = mysqli_fetch_array($sampah);
                    
                    $saldo_sekarang=$tabung['saldo']-$row['harga_nasabah'];
                    ?>
                    <div class="card-body" style="margin-left: 150px; margin-right: 150px">
                        <div class="table-responsive">
                            <table class="shadow table table-bordered" cellspacing="0">
                                <form action="proses-ubahds.php" method="POST">
                                    <tr>
                                        <td>Nama Sampah </td>
                                        <td><input type="text" name="nama_sampah" value="<?php echo $smp['nama_sampah'] ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td>Bobot </td>
                                        <td><input type="number" name="jumlah" id="jumlah" value="<?php echo $row['total'] ?>" /></td>
                                    </tr>
                                    <input type="hidden" name="harga_nasabah" id="harga_nasabah" value="<?php echo $smp['harga_nasabah'] ?>" />
                                    <input type="hidden" name="harga_pengepul" id="harga_pengepul" value="<?php echo $smp['harga_pengepul'] ?>" />
                                    <input type="hidden" name="hrg_nasabah" id="hrg_nasabah"  value="<?php $hrg_n=$row['total']*$smp['harga_nasabah']; echo $hrg_n ?>"  readonly="readonly" />
                                    <input type="hidden" name="hrg_pengepul" id="hrg_pengepul"  value="<?php $hrg_p=$row['total']*$smp['harga_pengepul']; echo $hrg_p ?>"  readonly="readonly" /></td>
                                    
                                    <p style="display:none">
                                        <input type="text" name="saldo" value="<?php echo $saldo_sekarang ?>" />
                                        <input type="text" name="id_nasabah" value="<?php echo $id_nasabah ?>" />
                                        <input type="text" name="id_setor" value="<?php echo $id_setor ?>" />
                                        <input type="text" name="id_sampah" value="<?php echo $id_sampah ?>" />
                                    </p>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Simpan" name="simpan" /></td>
                                    </tr>
                                </form>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    Copyright &copy; <strong><span>2023</span></strong>. All Rights Reserved
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#jumlah').change(function(){
            
            var jumlah=parseInt($('#jumlah').val());
            var harga_nasabah=parseInt($('#harga_nasabah').val());
            var harga_pengepul=parseInt($('#harga_pengepul').val());
            
            var credit=jumlah*harga_nasabah;
            var credit2=jumlah*harga_pengepul;
            $('#hrg_nasabah').val(credit);
            $('#hrg_pengepul').val(credit2);
            });
        });
    </script>
</body>
</html>
