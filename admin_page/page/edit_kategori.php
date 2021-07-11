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



    function failed() {
        await Toast.fire({
            icon: 'error',
            title: 'Gagal'
        })
    }
</script>

<?php
$data_kategori = $kategori->view($id_for_edit);
if (isset($_POST['edit'])) {
    if ($kategori->update($id_for_edit)) {
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
            title: 'Edit Berhasil!'
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
                title: 'Edit Gagal!'
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
                            <h3> Form Edit Kategori</h3>
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <div class="form-group">
                            <label for="id_kategori">ID Kategori</label>
                            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?php echo $data_kategori['id_kategori'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $data_kategori['nama_kategori'] ?>">
                        </div>
                        <div>
                            <input type="submit" name="edit" value="Ubah" class="btn btn-primary">
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
    <!-- Column -->
</div>
<!-- Row -->