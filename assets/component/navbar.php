<?php
include_once('./controller/UserController.php');
$user = new User();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $kasir = $user->get_user($id);
}
?>
<div class="col-md-11 fluid p-3">
    <nav class="navbar navbar-default navbar-expand-lg navbar-light ">

        <div class="">
            <div class="logo-text">
                <img src="assets/images/kalasenja-text.png" alt="logo" />
            </div>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="container" style="top:20px;">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0 left-menu" style="left:20px;">


                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5>
                                        <i class="bi bi-person-circle"></i> <?php echo $kasir['nama_kasir'] ?>
                                    </h5>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin_page/index.php">Admin Page</a>
                                    <a class="dropdown-item" href="#">Transaksi</a>
                                    <a class="dropdown-item" href="#">Akun</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.php?q=logout">Logout <i class="bi bi-power"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item"><button class="btn btn-success item_count">
                                <span class="bi-cart-fill"></span>
                                <span>0</span>
                            </button>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </nav>