<?php
$data_kategori = $kategori->get_all();
if (isset($_POST['submit'])) {
    $id_kat = $_POST['id_kategori'];
    $nama_kat = $_POST['nama_kategori'];
    if ($kategori->store($id_kat, $nama_kat)) {
        echo "<script>
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

        Toast.fire({
            icon: 'success',
            title: 'Tambah Data Berhasil!'
        })</script>";
    } else {
        echo "<script>    
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
   
            Toast.fire({
                icon: 'error',
                title: 'Tambah Data Gagal!'
            })
        </script>";
    }
}
?>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-12">
        <div class="white-box">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <center>
                            <h3> Form Kategori</h3>
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <div class="form-group">
                            <label for="id_kategori">ID Kategori</label>
                            <input type="text" class="form-control" id="id_kategori" name="id_kategori">
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                        </div>
                        <div>
                            <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            <input type="reset" name="cancel" value="cancel" class="btn btn-light">
                        </div>
                    </div>
                </form>
            </tbody>
            <!--?php    //ieu tadina rek nambah kategori, ngan gagal malah error jd dikieukeun we hela :)
                if (isset($_POST["submit"])) {
                    $db = store();
                    if ($db->connect_errno == 0) {
                ?>
                                <center>
                                <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Sukses!</strong> Data Berhasil Disimpan
                                </div>
                                </center>
                <!-?php
                            }
                        } else {
                ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Gagal! </strong>Data gagal disimpan karena nama kategori mungkin sudah ada.
                            </div>
                            <!-?php
                        }
                    } ?-->
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive align-items-center">
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th class="border-top-0" style="width: 5%;">No</th>
                                <th class="border-top-0" style="width: 10%;">Id Kategori</th>
                                <th class="border-top-0" style="width: 40%;">Nama Kategori</th>
                                <th class="border-top-0" style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_kategori as $data) { ?>
                                <tr>
                                    <td align="center" class="align-middle"><?php echo $i; ?></td>
                                    <td align="center" class="align-middle"><?php echo $data['id_kategori'] ?></td>
                                    <td align="center" class="align-middle">
                                        <?php echo $data['nama_kategori'] ?> <br>
                                    </td>

                                    <td align="center" class="align-middle">
                                        <?php
                                        $encry->word = $data['id_kategori'];
                                        $id_menu = $encry->encr();
                                        ?>
                                        <a href="?p=edit_kategori&e=<?php echo $id_menu ?>">
                                            <button type="button" class="btn btn-success btn-block align-items-right text-white">Edit</button>
                                        </a>

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

    await Toast.fire({
        icon: 'success',
        title: 'Success'
    })
</script>
<!-- Row -->