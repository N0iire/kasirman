<?php
include_once('./controller/UserController.php');
$user = new User();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $kasir = $user->get_user($id);
}
?>
<div class="col-md-fluid">
    <nav class="navbar navbar-expand-lg navbar-light hijau fixed-top">

        <div class="">
            <h2>KalaSenja</h2>
            <small>Coffee and Tea</small>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav">


            </ul>


            <ul class="navbar-nav ml-md-auto">
                <li class="nav-item">
                    <div>
                        <button class="btn">
                            <font size=5>
                                <span>Logout </span>
                                <span class="bi bi-box-arrow-right"></span>
                            </font>
                        </button>

                    </div>
                </li>
            </ul>

        </div>
    </nav>