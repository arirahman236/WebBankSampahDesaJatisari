<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id_nasabah'])){
die("Anda belum login");//jika belum login jangan lanjut..
}
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nasabah | Tabungan</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
          
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman_nasabah.php">
                <div class="sidebar-brand-text mx-3">BSPBS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="halaman_nasabah.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tabungan -->
            <li class="nav-item active">
                <a class="nav-link" href="tabungan.php">
                    <i class="fas fa-user-cog"></i>
                    <span>Tabungan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pengajuan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-cart-plus"></i>
                    <span>Pengajuan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Pengajuan:</h6>
                        <a class="collapse-item" href="pengajuan.php">Pengajuan</a>
                        <a class="collapse-item" href="#">Riwayat Pengajuan</a>
                    </div>
                </div>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['id_nasabah']; ?></span>
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
                    <h1  class="h3 mb-2 text-gray-800" align="center">Riwayat Pengajuan</h1>
                    <div class="mb-4">
                    <?php
                    include 'config.php';
                    $id_nasabah= $_SESSION['id_nasabah'];
                    $rekening  = mysqli_query($db, "select * from tabungan where id_nasabah='$id_nasabah'");
                    $row        = mysqli_fetch_array($rekening);
                    ?>
                    <input type="hidden" value="<?php echo $row['saldo']; ?>" name="money" id="money" />
                    <p style="visibility: hidden;" style="text-align: center;">Total Uang Direkening anda sebesar : <span id="formattedMoney"></span></p>
                    
                    <div>
                    <br/>
                    <div class="container" style="width:100%;"> 
                         <div class="d-flex justify-content-around"> 
                              <div class="col-md-8">
                                    <table>
                                        <tr>
                                        <td>  <input type="text" name="from_date" id="from_date" class="form-control"  />  </td>
                                        <td>  <input type="text" name="testin" id="testin" class="form-control"  />  </td>
                                        <td> <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  </td>
                                        <td> <input type="button" name="reset" id="reset" value="reset" class="btn btn-info" />  </td>
                                        </tr>
                                    </table>
                                </div>  
                              
                         </div> 
                    <div style="clear:both"></div>                 
                    <br />  
                    <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>ID</th>  
                               <th>tanggal</th>  
                               <th>Admin</th>
                               <th>Jumlah</th>
                               <th>Status</th>
                                

                          </tr>  
                     <?php
                     setlocale(LC_ALL, 'id-ID', 'id_ID');
                     $query = "SELECT pengajuan.id_pengajuan , pengajuan.tanggal_pengajuan,pengajuan.id_nasabah,pengajuan.id_admin, pengajuan.status,pengajuan.jumlah , admin.nama FROM pengajuan LEFT JOIN admin ON pengajuan.id_admin = admin.id_admin where id_nasabah='$id_nasabah' GROUP BY pengajuan.id_pengajuan ORDER BY tanggal_pengajuan desc";  
                     $result = mysqli_query($db, $query);  
                     while($row = mysqli_fetch_array($result))  
                     {  
                         $cr_date=date_create($row['tanggal_pengajuan']);
                         
                         $for_date=strftime('%d-%B-%Y', $cr_date->getTimestamp());
                         
                     ?>  
                          <tr>
                                 
                               <td><?php echo $row["id_pengajuan"]; ?></td>  
                               <td><?php echo $for_date; ?></td>
                               <td><?php echo $row["nama"]; ?></td>  
                               <td><?php echo $row["jumlah"]; ?></td>
                               <td><?php echo $row["status"]; ?></td>
                                 
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                    </div>  
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
    <script>
          var calculation = document.getElementById('money').value;

          //1st way
          var moneyFormatter = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR',
          minimumFractionDigits: 2
          });
          document.getElementById('formattedMoney').innerText = moneyFormatter.format(calculation);
     </script>

     <script>  
          $(document).ready(function(){  
               
               
            var d = new Date();
                var currMonth = d.getMonth();
                var currYear = d.getFullYear();
                var startDate = new Date(currYear, 0, 1);
                var lastDate=new Date(currYear, currMonth + 1,0);
                  

                $('#from_date').datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true }); // format to show
                $('#from_date').datepicker('setDate', startDate);
                
                // $('#dari').datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true }); // format to show
                // $('#dari').datepicker('setDate', baru);
                $('#testin').datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true }); // format to show
                $('#testin').datepicker('setDate', lastDate); 
                 
               $('#filter').click(function(){  
                    var from_date = $('#from_date').val();
                    
                    
                    var from_date2 = new Date(from_date);
                    var hari = from_date2.getDate();
                    var bulan = from_date2.getMonth();
                    var tahun = from_date2.getFullYear();
                    function pad(n) {
                    return n<10 ? '0'+n : n;
                    }
                    var baru = tahun + "-" + pad(hari) + "-" + pad(bulan + 1);
                    var dari = baru;
                    
                      
                    

                    //
                    var testin = $('#testin').val();
                    
                    var test = testin.split("-");
                    var hari2= test[0];
                    
                    var bulan2= test[1];
                    
                    var tahun2= test[2];
                    

                    var ke=test[2] + "-" + test[1]+ "-" + test[0];
                    
                    // var from_date2 = new Date($('#from_date').val());
                    // var hari = from_date2.getDate();
                    // var bulan = from_date2.getMonth();
                    // var tahun = from_date2.getFullYear();
                    // function pad(n) {
                    // return n<10 ? '0'+n : n;
                    // }
                    // var baru = tahun + "-" + pad(hari) + "-" + pad(bulan + 1);
                    // var dari = baru;
                    // console.log("dari2 = "+dari);
                      
                    
                    
                   
                      
                    if(dari != '' && ke != '')  
                    {  
                         $.ajax({  
                              url:"filter_ripe.php",  
                              method:"POST",  
                              data:{from_date:dari, to_date:ke},  
                              success:function(data)  
                              {  
                                   $('#order_table').html(data);  
                              }  
                         });  
                    }  
                    else  
                    {  
                         alert("Please Select Date");  
                    }  
               }); 
                $('#reset').click(function() {
                location.reload();
                }); 
          });  
     </script>

</body>
</html>