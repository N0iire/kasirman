<?php
$data_trans = $trans->index();
?>
<div class="row">
    <!-- Column -->
    <!-- Column -->
    <div class="">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive align-items-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th class="border-top-0" style="width: 5%;">No Struk</th>
                                <th class="border-top-0" style="width: 20%;">Tanggal Pembelian</th>
                                <th class="border-top-0">Total</th>
                                <th class="border-top-0">Pembeli</th>
                                <th class="border-top-0">Kasir</th>
                                <th class="border-top-0" style="width:10%;">Status</th>
                                <th class="border-top-0" style="width:15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_trans as $data) { ?>
                                <tr>
                                    <td><b></b>
                                        <?php echo $data['no_struk'] ?>
                                    </td>
                                    <td><b></b>
                                        <?php echo $data['tgl'] ?>
                                    </td>
                                    <td><b></b>
                                        <?php echo $data['total'] ?>
                                    </td>
                                    <td><b></b>
                                        <?php echo $data['pembeli'] ?>
                                    </td>
                                    <td><b></b>
                                        <?php echo $data['nama_kasir'] ?>
                                    </td>
                                    <td align="center" class="align-middle">
                                        <?php if ($data['status'] == 'Y') { ?>
                                            <button type="button" class="btn btn-success btn-sm align-items-right text-white" readonly>Confirmed</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-danger btn-sm align-items-right text-white" readonly>Not Confirmed</button>
                                        <?php  } ?>
                                    </td>
                                    <td align="center" class="align-middle">

                                        <button type="button" class="btn btn-info btn-block align-items-right text-white view_order" data-id="<?php echo $data['no_struk'] ?>">View Order</button>

                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<script>
    $('.view_order').click(function() {
        uni_modal('Transaksi', 'view_order.php?id=' + $(this).attr('data-id'))
    })
</script>
<!-- Row -->