<?php
session_start();
include_once('../controller/UserController.php');
include_once('../controller/MenuController.php');
include_once('../controller/TransaksiController.php');
include_once('../controller/DetailTransaksiController.php');
include_once('../controller/KategoriController.php');
include_once('../controller/Function.php');
if ($_SESSION['login']) {
    if (time() - $_SESSION["login_time_stamp"] > 600) {
        session_unset();
        session_destroy();
        header("Location:../index.php");
    }

    $id = $_SESSION['id'];
    $user = new User();
    $menu = new Menu();
    $kategori = new Kategori();
    $kasir = $user->get_user($id);
    $trans = new Transaksi();
    $detail_transaksi = new DetailTransaksi();
    $encry = new Enkripsi();

    if (!$user->get_session()) {
        header("location:../public/login.php");
    }

    if (isset($_GET['q'])) {
        $user->logout();
        header("location:../public/login.php");
    }

    if (isset($_GET['p'], $_GET['e'])) {
        $encry->word = $_GET['e'];
        $id_for_edit = $encry->decr();
    }
} else {
    header("location:../public/login.php");
    die();
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin Page</title>
    <link rel="canonical" href="" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="19x16" href="plugins/images/favicon copy.png">
    <link rel="shortcut icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" type="image/x-icon">
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-content {
            color: white;
        }
    </style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5" style="background-color: #38ef7d;">
            <nav class="navbar top-navbar navbar-expand-md" style="background-color: #38ef7d;">
                <div class="navbar-header" data-logobg="skin6" style="background-color: #38ef7d;">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="../index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/" alt="" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/kalasenja-text.png" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="index.php?q=logout">
                                <span class="text-white font-medium">Logout</span> <i class="fa fa-power-off"></i></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>


        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?p=dashboard" aria-expanded="false">
                                <i class="far fa-compass" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?p=transaksi" aria-expanded="false">
                                <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                <span class="hide-menu">Daftar Transaksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?p=menu" aria-expanded="false">
                                <i class="fa fa-utensils" aria-hidden="true"></i>
                                <span class="hide-menu">Daftar Menu</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?p=kategori" aria-expanded="false">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span class="hide-menu">Daftar Kategori</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?p=user" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <!-- Row -->
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast'
                        },
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true
                    })

                    function success() {
                        await Toast.fire({
                            icon: 'success',
                            title: 'Sukses'
                        })
                    }

                    function failed() {
                        await Toast.fire({
                            icon: 'error',
                            title: 'Gagal'
                        })
                    }
                </script>
                <?php
                // fungsi page
                if (!isset($_GET['p'])) {
                    require_once 'page/dashboard.php';
                } else if ($_GET['p'] == 'dashboard') {
                    require_once 'page/' . $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'menu' || $_REQUEST['p'] == 'menu') {
                    require_once 'page/' . $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'edit_menu') {
                    require_once 'page/' . $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'transaksi') {
                    require_once 'page/' . $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'kategori') {
                    require_once 'page/' . $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'edit_kategori') {
                    require_once 'page/' . $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'user') {
                    require_once 'page/' . $_GET['p'] . '.php';
                }
                ?>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            console.log(urlToRedirect); // verify if this is the right URL
            Swal.fire({
                    title: "Kamu Yakin?",
                    text: "Sekali terhapus data tidak bisa kembali!",
                    icon: "warning",
                    showDenyButton: true,
                    confirmButtonText: `Hapus`,
                    dangerMode: true,
                    denyButtonText: `Batal`,

                    allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                    }
                })
                .then((willDelete) => {

                    // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value

                    if (willDelete.isConfirmed) {
                        Swal.fire('Saved!', '', 'success', {
                            timer: 1500
                        })
                        window.location = urlToRedirect;
                    } else if (willDelete.isDenied) {
                        Swal.fire('Data Aman!', '', 'info')
                    }
                });
        }
    </script>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="sweetalert2.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>


</body>

</html>