<?php
include_once('../../controller/db_config.php');
include_once('../../controller/DetailTransaksiController.php');
$key = $_GET['d'];
$detail_trans = new DetailTransaksi();
$data = $detail_trans->view($key);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
</head>

<body>
    <table border="1">
        <tr>
            <td>Tanggal</td>
            <td>No Struk</td>
            <td>Kasir</td>
            <td>Pembeli</td>
            <td>Menu</td>
            <td>Jumlah</td>
            <td>Total</td>
        </tr>
        <tr>
            <?php foreach ($data as $trans) { ?>
                <td><?php echo $trans['tgl']; ?></td>
                <td><?php echo $trans['no_struk'] ?></td>
                <td><?php echo $trans['id_kasir'] ?></td>
                <td><?php echo $trans['pembeli'] ?></td>
                <td><?php echo $trans['nama_menu'] ?></td>
                <td><?php echo $trans['jumlah'] ?></td>
                <td><?php echo $trans['total'] ?></td>
            <?php } ?>
        </tr>
    </table>
</body>

</html>