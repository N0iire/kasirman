<?php
if (isset($_POST['tambah'])) {
    $id_menu = $_POST['id_menu'];
    $pembelian = $_POST['pembelian'];
    $data_menu = $menu->view($id_menu);

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));

    // jika produk sudah ada dalam cart maka pembelian akan diupdate
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['id_menu'] == $id_menu) {
            $index = $i;
            $_SESSION['cart'][$i]['pembelian'] += $pembelian;
            break;
        }
    }

    // jika produk belum ada dalam cart
    if ($index == -1) {
        $_SESSION['cart'][] = [
            'id_menu' => $id_menu,
            'nama_menu' => $data_menu['nama_menu'],
            'harga' => $data_menu['harga'],
            'pembelian' => $pembelian
        ];
    }
}
if (!empty($_SESSION['cart'])) {
    if (isset($_SESSION['cart'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        $index = 0;
        $no = 1;
        $total = 0;
        $total_bayar = 0;
    }
?>
    <div class="card" style="border-radius: 15px;">
        <div class="card-header cart">
            <h4>Pesan Baru</h4>
            <small><?php echo count($cart); ?> jenis pesanan dalam keranjang </small>
        </div>


        <div class="card-body">
            <?php
            for ($i = 0; $i < count($cart); $i++) {
                $total = $_SESSION['cart'][$i]['harga'] * $_SESSION['cart'][$i]['pembelian'];
                $total_bayar += $total;
            ?>
                <div class="row">
                    <div class="col-md-1">
                        <a href="?index=<?= $index; ?>"><i class="bi bi-trash align-self-center" style="font-size:1.5rem; color:red !important;"></i></a>
                    </div>
                    <div class="col-md-6">
                        <span><b><?php echo $cart[$i]['nama_menu'] ?></b></span><br>
                        <small>Rp. <?php echo $cart[$i]['harga'] ?></small>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control float-right" style="width: 50px; text-align: center;" value="<?php echo $cart[$i]['pembelian']; ?>" type="number" name="jumlah" min="1" max="<?php echo $cart[$i]['pembelian']; ?>">
                    </div>
                </div>
            <?php $index++;
            }
            // hapus produk dalam cart
            if (isset($_GET['index'])) {
                $cart = unserialize(serialize($_SESSION['cart']));
                unset($cart[$_GET['index']]);
                $cart = array_values($cart);
                $_SESSION['cart'] = $cart;
            }
            ?>
        </div>
        <div class="card-footer">
            <form action="" method="POST">
                <div class="row mb-3">

                    <div class="col-md-6 pull-left">
                        <input class="form-control" type="text" name="pembeli" placeholder="Atasnama Pembeli" required>
                    </div>
                    <div class=" col-md-6 float-right">
                        <button class="btn btn-success float-right">Ubah</button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 float-left">
                        <h4>Total :</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        Rp. <?php echo $total_bayar; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-danger btn-block" value="Bayar" name="bayar">
                    </div>
                </div>
            </form>

        </div>
    </div>
<?php } else {
?>
    <div class="card" style="border-radius: 15px;">
        <div class="card-header cart">
            <h4>Pesan Baru</h4>
            <small>0 pesanan dalam keranjang </small>
        </div>

        <div class="card-footer">
            <div class="row mb-3">
                <div class="col-md-6 pull-left">
                    <input class="form-control" type="text" name="pembeli" placeholder="Atasnama Pembeli">
                </div>
                <div class=" col-md-6 float-right">
                    <button class="btn btn-success float-right">Ubah</button>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6 float-left">
                    <h4>Total :</h4>
                </div>
                <div class=" col-md-6 text-right">
                    Rp. 0
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="Bayar Pesanan" name="bayar" onclick="inputcart();" class="btn btn-danger btn-block">
                </div>
            </div>
        </div>
    </div>

<?php
}

?>