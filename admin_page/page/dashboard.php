<div class="row ">
    <div class="col-md-4 text-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">

                <?php

                $data_menu = $menu->get_count();

                ?>

                <h5 class="card-title">Data Menu</h5>
                <p class="card-text">Data menu yang tersedia</p>
                <h4><?php
                    echo $data_menu['jmlMenu'];
                    ?>
                </h4>
                <a href="index.php?p=menu" class="card-link">Lihat Data Menu</a>
            </div>

        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">

                <?php
                $data_transaksi = $trans->get_count();
                ?>

                <h5 class="card-title">Data Transaksi</h5>
                <p class="card-text">Jumlah Transaksi saat ini</p>
                <h3><?php
                    echo $data_transaksi['jmlTrans'];
                    ?></h3>
                <a href="index.php?p=transaksi" class="card-link">Lihat Data Transaksi</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">

                <?php
                $data_kasir = $user->get_count();
                ?>

                <h5 class="card-title">Data Kasir</h5>
                <p class="card-text">Jumlah Kasir saat ini</p>
                <h3><?php
                    echo $data_kasir['jmlKasir'];
                    ?></h3>
                <a href="index.php?p=menu" class="card-link">Lihat Data Kasir</a>
            </div>
        </div>
    </div>
</div>