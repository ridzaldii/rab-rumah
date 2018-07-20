  <?php 
    include "connect.php";
    session_start();
    if (!isset($_SESSION['login'])) {
      header('location:login.php');
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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Admin - Rencana Anggaran Biaya</title>
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="index.php">
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
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   <!--  <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li> -->
                                    <li><a href="<?php echo $link ?>/proses/validasi_user.php?log=out"><i class="fa fa-power-off"></i> Logout</a></li>
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
                            <a href="index.php"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>   
                        <li class="nav-label">Desain</li>
                        <li> 
                            <a href="pages/tambahdesain.php"><i class="fa fa-plus-circle"></i><span class="hide-menu">Tambah Desain</span></a>
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
                            <a href="pages/jenispekerjaan.php"><i class="fa fa-crop"></i><span class="hide-menu">Jenis Pekerjaan</span></a>
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
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <?php 
                  $query_desain = "SELECT * FROM desain";
                  $query_jenis = "SELECT * FROM jenis_pekerjaan";

                  $result_desain = $conn->query($query_desain);
                  $result_jenis = $conn->query($query_jenis);
                  ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-home f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $result_desain->num_rows; ?></h2>
                                    <p class="m-b-0">Desain Rumah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-crop f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $result_jenis->num_rows; ?></h2>
                                    <p class="m-b-0">Jenis Pekerjaan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                                <h4 class="card-title">Pengantar</h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Rencana Anggaran Biaya (RAB)</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Rumah Sederhana</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Extreme Programming</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home2" role="tabpanel">
                                        <div class="p-20">
                                            <h5>Pengertian Rencana Anggaran Biaya (RAB)</h5>
                                            <p class="text-justify" style="color:grey">Rencana Anggaran Biaya (RAB) merupakan salah satu proses utama dalam suatu proyek karena merupakan dasar untuk membuat penawaran sistem pembiayaan dan kerangka budget yang akan dikeluarkan. Rencana Anggaran Biaya diperlukan untuk memperhitungkan suatu bangunan atau proyek dengan banyaknya biaya yang diperlukan untuk bahan dan upah, serta biaya- biaya lain yang berhubungan dengan pelaksanaan bangunan atau proyek. Untuk Mewujudkan benda, apalagi membangun sebuah rumah untuk dihuni sendiri atau sebagai investasi dimasa depan maupun properti konsumsi publik membutuhkan biaya yang tidak sedikit. Untuk itu diperlukan perhitungan-perhitungan yang teliti. Baik dari jumlah biaya pembuatannya, volume pekerjaan, jenis pekerjaan, harga bahan, dan upah pekerja. Semua itu bertujuan untuk menekan biaya pembuatan rumah sehingga lebih efisien dan terukur sesuai dengan keinginan pemilik dalam membangun rumah, baik rumah sederhana atau rumah sedang </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile2" role="tabpanel">
                                        <h5>Pengertian Rumah Sederhana</h5>
                                        <p class="text-justify" style="color:grey">Menurut peraturan menteri keuangan nomor 248/pmk.06/2011 tentang standar barang dan standar kebutuhan barang milik negara berupa tanah dan/atau bangunan yang di maksud dengan klasifikasi bangunan sederhana adalah bangunan dengan spesifikasi teknis sederhana, memiliki kompleksitas dan teknologi sederhana, dengan ciri utama tidak bertingkat atau memiliki jumlah lantai paling tinggi 2 (dua) lantai yang luas lantai keseluruhannya kurang dari 500 m2 (lima ratus meter persegi) dan masa penjaminan kegagalan bangunannya adalah selama 10 (sepuluh) tahun. Klasifikasi bangunan sederhana ini memiliki standar luas bangunan yang tidak dapat diutilisasi sesuai fungsi utama bangunan, seperti luas ruang untuk lift, tangga, Air Handling Unit (AHU), koridor, dapur /pantry dan Dead Space akibat konstruksi serta akibat bentuk arsitektur bangunan, sebesar 20% (dua puluh persen) dari luas bangunan bruto.
                                            <br><br>Rumah tinggal adalah salah satu jenis bangunan hunian yang paling banyak dijumpai. Sehingga RAB rumah tinggal ini sering dibuat atau digunakan. RAB tersebut mempunyai peran sangat penting dalam manajemen pembangunan rumah. Apalagi banyak rumah di Indonesia dibangun secara langsung oleh pemilik/owner.</p>
                                    </div>
                                    <div class="tab-pane p-20" id="messages2" role="tabpanel">
                                        <h5>Pengertian Metode Extreme Programming</h5>
                                        <p class="text-justify" style="color:grey">
                                                Extreme Programming (XP) merupakan salah satu metodologi dalam rekayasa perangkat lunak dan juga merupakan satu dari beberapa agile software development methodologies yang tidak hanya berfokus pada coding sebagai aktivitas utama di semua tahap pada siklus pengembangan perangkat lunak  (software development lifecycle) namun juga meliputi seluruh area pengembangan perangkat lunak. Metodologi ini mengedepankan proses pengembangan yang lebih responsive terhadap kebutuhan customer (”agile”) dibandingkan dengan metode - metode tradisional sambil membangun suatu software dengan kualitas yang lebih baik. XP berjalan berdasarkan 4 value yakni communication, simplicity, feedback, dan courage. XP menjadi begitu populer sejak diperkenalkan oleh Kent Beck menjadi sebuah metodologi untuk pengembangan perangkat lunak. 
                                                <br><br>
                                                
                                                Metode extreme programming, mempunyai kerangka kerja diantaranya adalah: <br><br>
                                                1.  Planning (perencanaan) 
                                                Planning berfokus untuk mendapatkan gambaran fitur dan fungsi dari perangkat lunak yang akan dibangun. Aktivitas planning dimulai dengan membuat kumpulan gambaran atau cerita yang telah diberikan oleh klien yang akan menjadi gambaran dasar dari perangkat lunak tersebut. Kumpulan gambaran atau cerita tersebut akan dikumpulkan dalam sebuah indeks dimana setiap poin memiliki prioritasnya masing-masing. Selama proses pengembangan perangkat lunak, klien dapat mengubah setiap rencana dari aplikasi yang dibuat. Selanjutnya akan dipertimbangkan semua hal yang ingin diubah oleh klien sebelum mengubah aplikasi tersebut. <br><br>
                                                2.  Design 
                                                Aktivitas design dalam pengembangan aplikasi ini, bertujuan untuk mengatur pola logika dalam sistem. Sebuah desain aplikasi yang baik adalah desain yang dapat mengurangi ketergantungan antar setiap proses pada sebuah sistem. Jika salah satu 14 fitur pada sistem mengalami kerusakan, maka hal tersebut tidak akan mempengaruhi sistem secara keseluruhan. Tahap design pada model proses Extreme Programming merupakan panduan dalam membangun perangkat lunak yang didasari dari cerita klien sebelumnya yang telah dikumpulkan pada tahap planning. Dalam XP, proses design terjadi sebelum dan sesudah aktivitas coding berlangsung. Artinya, aktivitas design terjadi secara terus-menerus selama proses pengembangan aplikasi berlangsung. <br><br>
                                                3.  Coding 
                                                Setelah menyelesaikan gambaran dasar perangkat lunak dan menyelesaikan design untuk aplikasi secara keseluruhan, XP lebih merekomendasikan untuk membuat modul unit tes terlebih dahulu yang bertujuan untuk melakukan uji coba setiap cerita dan gambaran yang diberikan oleh klien. Setelah berbagai unit tes selesai dibangun, barulah melanjutkan aktivitas ke penulisan coding aplikasi. <br><br>
                                                4.  Testing 
                                                Walaupun tahapan uji coba sudah dilakukan pada tahapan coding, XP juga akan melakukan pengujian sistem yang sudah sempurna. Pada tahap coding, XP akan terus mengecek dan memperbaiki semua masalah-masalah yang terjadi walaupun hanya masalah kecil. Setiap modul yang sedang dikembangkan, akan diuji terlebih dahulu dengan modul unit tes yang telah dibuat sebelumnya. Setelah semua modul selesai dan dikumpulkan ke dalam sebuah sistem yang sempurna, maka dilakukan pengujian penerimaan atau acceptance test. Pada tahap ini, aplikasi akan langsung diuji coba oleh user dan klien agar mendapat tanggapan langsung mengenai penerapan gambaran dan cerita yang telah dilakukan sebelumnya.

                                                <br><br></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


    <script src="js/lib/datamap/d3.min.js"></script>
    <script src="js/lib/datamap/topojson.js"></script>
    <script src="js/lib/datamap/datamaps.world.min.js"></script>
    <script src="js/lib/datamap/datamap-init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>
<?php 
}
 ?>