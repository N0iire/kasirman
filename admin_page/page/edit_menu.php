<?php
$data_menu = $menu->view($id_for_edit);
if (isset($_POST['edit'])) {

    if ($menu->update($id_for_edit)) {
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
                            <h3>Form Edit Menu</h3>
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <div class="form-group">
                            <label for="nama_menu">Id Menu</label>
                            <input type="text" class="form-control" id="id_menu" name="id_menu" value="<?php echo $data_menu['id_menu'] ?>" </div>
                            <div class=" form-group">
                                <label for="nama_menu">Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="<?php echo $data_menu['nama_menu'] ?>">
                            </div>
                            <div class=" form-group">
                                <label for="comment">Deskripsi Menu</label>
                                <textarea name="deskripsi" class="form-control" rows="5" id="comment" style="height: 50px;"><?php echo $data_menu['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="status" value="Y" class="custom-control-input" id="switch1">
                            <label class="custom-control-label" for="switch1">Tersedia</label>
                        </div>
                        <br>Kategori
                        <select name="kategori" class="custom-select">
                            <option selected>Pilih Menu</option>
                            <?php foreach ($data_kategori as $data) { ?>
                                <option value="<?php echo $data['id_kategori'] ?>"><?php echo $data['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                        <br><br>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="custom-file">
                        <input name="gambar" type="file" class="custom-file-input" id="customFile">
                    </div>
                    <div class="form-group">
                        <p><img src="../assets/images/<?php echo $data_menu['gambar'] ?>" alt="" style="height: 100px; width: auto; border-radius: 15px;"></p>
                        <small><?php echo $data_menu['gambar'] ?></small>
                    </div>

                    <br>
                    <div>
                        <input type="submit" name="edit" value="Ubah menu" class="btn btn-primary">
                    </div>
                </form>
            </tbody>

        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->