<div class="row ">
    <div class="col-md-4 ">

        <div class="card-box bg-blue">
            <?php

            $data_menu = $menu->get_count();

            ?>

            <div class="inner">
                <h3> <?php
                        echo $data_menu['jmlMenu'];
                        ?> Data</h3>
                <p> Jumlah Menu</p>
            </div>
            <div class="icon">
                <i class="fa fa-utensils" aria-hidden="true"></i>
            </div>
            <a href="index.php?p=menu" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-md-4 ">

        <div class="card-box bg-green">
            <?php
            $data_transaksi = $trans->get_count();
            ?>
            <div class="inner">
                <h3> <?php
                        echo $data_transaksi['jmlTrans'];
                        ?> Data</h3>
                <p> Jumlah Transaksi </p>
            </div>
            <div class="icon">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <a href="index.php?p=transaksi" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
        </div>


    </div>
    <div class="col-md-4">


        <div class="card-box bg-orange">
            <?php
            $data_kasir = $user->get_count();
            ?>

            <div class="inner">
                <h3> <?php
                        echo $data_kasir['jmlKasir'];
                        ?> Data</h3>
                <p> Jumlah Kasir</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </div>
            <a href="index.php?p=user" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>