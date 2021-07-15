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
    });
</script>

<?php
$data_kategori = $kategori->view($id_for_edit);
if (isset($_POST['edit'])) {
    if ($kategori->update($id_for_edit)) {
        echo "<script>
        Toast.fire({
            icon: 'success',
            title: 'Edit Berhasil!'
        })</script>";
    } else {
        echo "<script>    
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
                            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?php echo $data_kategori['id_kategori'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $data_kategori['nama_kategori'] ?>" required>
                        </div>
                        <div>
                            <input type="submit" name="edit" value="Ubah" class="btn btn-warning">
                            <input type="reset" name="cancel" value="cancel" class="btn btn-light">
                        </div>
                    </div>
                </form>
            </tbody>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <!-- Column -->
</div>
<!-- Row -->