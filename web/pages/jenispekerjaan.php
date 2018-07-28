  <?php 
    include "../connect.php";
    session_start();
    if (!isset($_SESSION['login'])) {
      header('location:../login.php');
    }elseif (isset($_SESSION['login'])) {

 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <title>Admin - Rencana Anggaran Biaya</title>
    <link href="../css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="../css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../css/helper.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">
                        <!-- Logo icon -->
                        <b><img src="" ></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span> -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   <!--  <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li> -->
                                    <li><a href="../proses/validasi_user.php?log=out"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> 
                            <a href="../index.php"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>   
                        <li class="nav-label">Desain</li>
                        <li> 
                            <a href="tambahdesain.php"><i class="fa fa-plus-circle"></i><span class="hide-menu">Tambah Desain</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bars"></i><span class="hide-menu">List Desain</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php 
                                  $query_d = "SELECT * FROM desain";
                                  $result_d = $conn->query($query_d);

                                  while ($row_d = $result_d->fetch_assoc()) {
                                    echo "<li><a href='".$link."/pages/detaildesain.php?id=".$row_d['id']."''>".$row_d['namadesain']."</a></li>";
                                  }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-label">Lainnya</li>
                        <li> 
                            <a href="jenispekerjaan.php"><i class="fa fa-crop"></i><span class="hide-menu">Jenis Pekerjaan</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Jenis Pekerjaan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Lainnya</a></li>
                        <li class="breadcrumb-item active">Jenis Pekerjaan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Tambah Jenis Pekerjaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../proses/crud_jenis.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" name="jenispekerjaan" class="form-control input-default " placeholder="Jenis Pekerjaan" required>
                                        </div>
                                        <button id="btn_submit" type='submit' name='submit' class='btn btn-success' value='Submit' style="float:right"><i class='fa fa-check'></i> Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4 id="title">Update Jenis Pekerjaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../proses/crud_jenis.php" method="post" enctype="multipart/form-data">
                                        <div id="inp" class="form-group">
                                            <input type="hidden" name="id" id="idUp">
                                            <input id="jenisUp" type="text" name="jenispekerjaan" class="form-control input-default" placeholder="Jenis Pekerjaan" disabled required>
                                        </div>
                                        <button id="btn_update" type='submit' name='update' class='btn btn-success' value='Submit' style="float:right" disabled><i class='fa fa-check'></i> Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Jenis Pekerjaan</h4>
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Jenis Pekerjaan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr><th>Jenis Pekerjaan</th>
                                                <th>Action</th></tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $query = "SELECT * FROM jenis_pekerjaan";
                                                $resultj = $conn->query($query);
                                                while ($rowj=$resultj->fetch_assoc()) {
                                             ?>
                                                    <tr>
                                                        <td><?php echo $rowj['jenispekerjaan']; ?></td>
                                                        <td>
                                                            <button id="btn_edit" onclick="functionEdit('<?php echo $rowj['id'] ?>','<?php echo $rowj['jenispekerjaan']; ?>')" class="btn-sm btn-info">Edit</button>
                                                            <a href="../proses/crud_jenis.php?hapus=<?php echo $rowj['id']; ?>"><button onclick="return confirm('Yakin ingin menghapus jenis pekerjaan, <?php echo $rowj['jenispekerjaan']; ?>? Semua Uraian Pekerjaan yang menggunakan jenis pekerjaan ini akan turut terhapus.');" class="btn-sm btn-danger">Hapus</button></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->
            </div>
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="../js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstra../p tether Core JavaScript -->
    <script src="../js/lib/bootstrap/js/popper.min.js"></script>
    <script src="../js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscro../llbar scrollbar JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Menu side../bar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--stickey k../it -->
    <script src="../js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../js/lib/datamap/d3.min.js"></script>
    <script src="../js/lib/datamap/topojson.js"></script>
    <script src="../js/lib/datamap/datamaps.world.min.js"></script>
    <script src="../js/lib/datamap/datamap-init.js"></script>
    <script src="../js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="../js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit ../init-->
    <script src="../js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit ../init-->
    <script src="../js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit ../init-->
    <script src="../js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit ../init-->
    <script src="../js/lib/calendar-2/pignose.init.js"></script>
    <!--Custom Ja../vaScript -->
    <script src="../js/custom.min.js"></script>

    <script src="../js/lib/datatables/datatables.min.js"></script>
    <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="../js/lib/datatables/datatables-init.js"></script>
    <script>
      function functionEdit(id,jns){
        var submit, idup, jenis, h, inp;
        idup = document.getElementById('idUp');
        jenis = document.getElementById('jenisUp');
        submit = document.getElementById('btn_update');
        h = document.getElementById('title');
        inp = document.getElementById('inp');

        jenis.disabled=false;
        submit.disabled=false;
        h.innerHTML = 'Update : '+jns;
        idup.value = id;
        jenis.value = jns;
        jenis.focus();
        inp.setAttribute("class","form-group has-success");
        window.scrollTo(0,0);
      }
    </script>
</body>

</html>
<?php 
}
 ?>