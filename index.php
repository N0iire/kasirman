<?php
session_start();
include_once('./controller/UserController.php');
include_once('./controller/MenuController.php');
include_once('./controller/TransaksiController.php');
include_once('./controller/DetailTransaksiController.php');
if ($_SESSION['login']) {
    if (time() - $_SESSION["login_time_stamp"] > 600) {
        session_unset();
        session_destroy();
        header("Location:public/login.php");
    }
    $id = $_SESSION['id'];
    $user = new User();
    $menu = new Menu();
    $transaksi = new Transaksi();
    $detail_transaksi = new DetailTransaksi();



    $kasir = $user->get_user($id);

    if (!$user->get_session()) {
        header("location:./public/login.php");
    }

    if (isset($_GET['q'])) {
        $user->logout();
        header("location:./public/login.php");
    }

    if (isset($_GET['index'])) {
        header('Location: index.php');
    }

    if (isset($_POST['bayar'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        $total_item = 0;
        $total_bayar = 0;
        $date = date('Y-m-d');
        $pembeli = $_POST['pembeli'];
        $id_kasir = $_SESSION['id'];
        for ($i = 0; $i < count($cart); $i++) {
            $total_item += $cart[$i]['pembelian'];
            $total_bayar += $cart[$i]['pembelian'] * $cart[$i]['harga'];
        }
        $data_transaksi = $transaksi->store($date, $total_bayar, $pembeli, $id_kasir);
        if ($data_transaksi) {
            $sql = "SELECT no_struk FROM `transaksi` ORDER BY `no_struk` DESC LIMIT 1";
            $query = $transaksi->db->query($sql);
            $dataQuery = $query->fetch_assoc();
            for ($i = 0; $i < count($cart); $i++) {
                $id_menu = $cart[$i]['id_menu'];
                $pembelian = $cart[$i]['pembelian'];
                $no_struk = $dataQuery['no_struk'];
                $subtotal = $pembelian * $cart[$i]['harga'];
                $data_transaksi = $detail_transaksi->store($no_struk, $id_menu, $pembelian, $subtotal);
            }
            echo "Pesan Berhasil";
        } else {
            echo "Gagal";
        }
    }
} else {
    header("location:./public/login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pemesanan Kopi</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/card.css">
    <link rel="stylesheet" href="assets/cart.css">
    <link rel="icon" type="image/png" sizes="19x16" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
        #sidebar {
            min-height: 100vh;
        }

        .napbar {
            min-width: 90hv;
        }

        .cart {
            border-radius: 20px;
            background: rgb(17, 153, 142);
            background: linear-gradient(31deg, rgba(17, 153, 142, 1) 0%, rgba(56, 239, 125, 1) 100%);
            color: #fff;
        }

        .card-header {
            border-radius: 15px;
        }

        .cart h4 {

            margin-top: 2px;
            color: #fff;
        }

        #alert-gagal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-light">



        <?php
        if (isset($_GET['p']) == 'sukses') {
            //toast login sukses
            echo "<script> const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
    
           
                Toast.fire({
                    icon: 'success',
                    title: 'Login berhasil'
                })
                </script>
            ";
        }
        ?>

        <div class="row">
            <!--Sidebar-->
            <?php include 'assets/component/sidebar.php' ?>
            <!--Navbar-->
            <?php include 'assets/component/navbar.php' ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <?php
                        foreach ($menu->get_all() as $data) { ?>
                            <div class="col-md-4">
                                <div class="container">
                                    <div class="harga">Rp. <?php echo $data["harga"] ?></div>
                                    <div class="menu"><?php echo $data["nama_menu"] ?></div>
                                    <img src="assets/images/<?php echo $data["gambar"] ?>" class="image shadow-md">
                                    <form action="" method="POST">
                                        <input type="hidden" type="number" name="pembelian" value="1" min="1">
                                        <div class="overlay">
                                            <input type="hidden" name="id_menu" value="<?php echo $data['id_menu'] ?>">
                                            <input class="btn-grad" type="submit" name="tambah" value="tambah">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php include 'assets/component/cart.php' ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        function inputcart() {
            Swal.fire({
                icon: 'warning',
                title: 'Pilih menu terlebih dahulu!',
                timer: 1500,
                type: 'danger',
                confirmButtonClass: "btn-danger"
            })
        }
    </script>
</body>

</html>