<?php
session_start();
include_once('../../controller/db_config.php');
include_once('../../controller/DetailTransaksiController.php');
include_once('../../controller/TransaksiController.php');
include_once('../../controller/UserController.php');
include_once('../../controller/Function.php');
if ($_SESSION['login']) {
    $encry = new Enkripsi();
    $user = new User();
    $transaksi = new Transaksi();
    $detail_trans = new DetailTransaksi();

    $encry->word = $_GET['id'];
    $key = $encry->decr();
    $data_transaksi = $transaksi->view($key);
    $data_kasir = $data_transaksi['id_kasir'];
    $kasir = $user->view($data_kasir);
    $data_detail_trans = $detail_trans->view($key);
} else {
    header("location:../../public/login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th colspan="4">KASIRMAN</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th colspan="4">-------------------------------------------------</th>
        </tr>
        <tr>
            <td colspan="4">
                Kasir : <?php echo $kasir['nama_kasir'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                Tanggal : <?php echo $data_transaksi['tgl'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                No Struk : <?php echo $data_transaksi['no_struk'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                Pembeli : <?php echo $data_transaksi['pembeli'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                --------------------------------------------------
            </td>
        </tr>
        <tr>
            <td colspan="2">Nama Menu</td>
            <td>Jumlah</td>
            <td>Subtotal</td>
        </tr>
        <?php foreach ($data_detail_trans as $data) { ?>
            <tr>
                <td colspan="2"><?php echo $data['nama_menu'] ?></td>
                <td colspan="1"><?php echo $data['jumlah'] ?></td>
                <td colspan="2"><?php echo $data['harga'] ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4">
                --------------------------------------------------
            </td>
        </tr>
        <tr>
            <td colspan="4">
                Total : Rp.<?php echo $data_transaksi['total'] ?>
            </td>
        </tr>
    </table>
    <button onclick="window.print()">CETAK</button>
</body>

</html>