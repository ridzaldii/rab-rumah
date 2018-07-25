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
                    <h3 class="text-primary">Gambar-gambar Desain <?php 
                        $query_d = "SELECT * FROM desain WHERE id=".$_GET['id'];
                          $result_d = $conn->query($query_d);

                          while ($row_d = $result_d->fetch_assoc()) {                          
                     ?></h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Desain</a></li>
                        <li class="breadcrumb-item"><a href="detaildesain.php?id=<?php echo $row_d['id'] ?>"><?php echo $row_d['namadesain']; ?></a></li>
                        <li class="breadcrumb-item active">Gambar-gambar Desain</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-4">
                        <button class="btn btn-success" data-toggle="dropdown"><i class="fa fa-plus"></i> Tambah Gambar</button>
                        <!-- toggle -->
                        <div class="dropdown-menu animated zoomIn col-12" style="padding:20px;">
                            <ul class="mega-dropdown-menu row">
                                <li class="col-md-12">
                                    <h4 class="m-b-20">Masukkan Gambar Baru</h4>
                                    <form action="../proses/crud_gambar.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input type="file" id="imgInp" name="gambar">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <div class="form-group" style="margin-top:15px">
                                                <label>Nama Ruangan</label>
                                                <input type="hidden" name="iddesain" value="<?php echo $_GET['id'] ?>">
                                                <input type="text" name="namaruangan" class="form-control input-default " placeholder="Nama Ruangan">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi</label>
                                                <textarea placeholder="Deskirpsi Ruangan" style="resize:vertical; min-height:100px" type="text" name="deskripsi" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button type='submit' name='tambahgambar' class='btn btn-success' value='Submit' style="float:right"/><i class='fa fa-check'></i> Submit</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- end toggle -->
                    </div>
                </div>
                <div class="row">
                <?php 
                    $query_g = "SELECT * FROM gambar WHERE id_desain=".$_GET['id'];
                    $result_g = $conn->query($query_g);

                    if ($result_g->num_rows==0) {
                        ?>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <img style="height: 200px; width:100%" src="../images/no-image-avail.png" alt="Gambar tidak tersedia">
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                    while ($row_g = $result_g->fetch_assoc()) { 
                        ?>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#" data-toggle="dropdown"><img style="height: 200px; width:100%" src="../images/upload/<?php echo $row_g['gambar'] ?>" alt="<?php echo $row_g['gambar'] ?>"></a>
                                    <h4 style="text-align:center"><?php echo $row_g['namaruangan'] ?></h4>
                                    <!-- toggle -->
                                    <div class="dropdown-menu animated zoomIn col-12" style="padding:10px;">
                                        <ul class="mega-dropdown-menu row">
                                            <li class="col-md-12">
                                                <h4 class="m-b-20">Detail Gambar</h4>
                                                <form action="../proses/crud_gambar.php" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-default btn-file">
                                                                    Browse… <input type="file" id="imgInp" name="gambar" value="<?php echo $row_g['gambar'] ?>">
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control" value="<?php echo $row_g['gambar'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group" style="margin-top:15px">
                                                            <label>Nama Ruangan</label>
                                                            <input type="text" name="namaruangan" class="form-control input-default " value="<?php echo $row_g['namaruangan'] ?>" placeholder="Nama Ruangan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Deskripsi</label>
                                                            <textarea placeholder="Deskirpsi Ruangan" style="resize:vertical; min-height:100px" type="text" name="deskripsi" class="form-control"><?php echo $row_g['deskripsi'] ?></textarea>
                                                        </div>
                                                        <img id='img-upload'/>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $row_g['id'] ?>">
                                                    <input type="hidden" name="iddesain" value="<?php echo $_GET['id'] ?>">
                                                    <button type='submit' name='updatedetail' class='btn btn-success' value='Submit' style="float:right"/><i class='fa fa-pencil'></i> Update</button>
                                                </form>
                                                    <a href="../proses/crud_gambar.php?hapusg=<?php echo $row_g['id'] ?>&idd=<?php echo $_GET['id'] ?>"><button onclick="return confirm('Yakin ingin menghapus gambar tersebut?')" name='hapusgambar' class='btn btn-danger' value='Submit' style="float:left"/><i class='fa fa-trash'></i> Hapus</button></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end toggle -->
                                </div>
                            </div>
                        </div>
                        <?php
                    }          
                 ?>
                 </div>
            </div>
            <?php } ?>
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
    <script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
    });
    </script>

</body>

</html>
<?php 
}
 ?>