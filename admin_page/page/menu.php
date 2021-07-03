<?php
$data_kategori = $kategori->get_all();
$data_menu = $menu->get_all();
if (isset($_POST['submit'])) {
    if ($menu->store()) {
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
                            <h3>Form Menu</h3>
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <div class="form-group">
                            <label for="nama_menu">Id Menu</label>
                            <input type="text" class="form-control" id="id_menu" name="id_menu">
                        </div>
                        <div class="form-group">
                            <label for="nama_menu">Nama Menu</label>
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu">
                        </div>
                        <div class="form-group">
                            <label for="comment">Deskripsi Menu</label>
                            <textarea name="deskripsi" class="form-control" rows="5" id="comment" style="height: 50px;"></textarea>
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
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="custom-file">
                        <input name="gambar" type="file" class="custom-file-input" id="customFile">
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="submit" value="Tambah menu" class="btn btn-primary">
                    </div>
                </form>
            </tbody>

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
                                <th class="border-top-0" style="width: 10%;">No</th>
                                <th class="border-top-0" style="width: 20%;">Gambar</th>
                                <th class="border-top-0">Deskripsi</th>
                                <th class="border-top-0" style="width:24%;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_menu as $data) { ?>
                                <tr>
                                    <td align="center" class="align-middle"><?php echo $i; ?></td>
                                    <td align="center">
                                        <img src="../assets/images/<?php echo $data['gambar'] ?>" alt="" style="height: 100px; width: auto; border-radius: 15px;">
                                    </td>
                                    <td><b>Nama :</b> <?php echo $data['nama_menu'] ?> <br>
                                        <b>Deskripsi:</b> <?php echo $data['deskripsi'] ?><br>
                                        <b>Harga:</b> Rp.<?php echo $data['harga'] ?>,-<br>
                                        <b>Kategori:</b> <?php echo $data['nama_kategori'] ?><br>
                                    </td>
                                    <td align="center" class="align-middle text-light">
                                        <?php
                                        $encry->word = $data['id_menu'];
                                        $id_menu = $encry->encr();
                                        ?>
                                        <a href="?p=edit_menu&e=<?php echo $id_menu ?>">
                                            <button type="button" class="btn btn-success btn-block align-items-right text-white">edit</button>
                                        </a>
                                        <a onclick="confirmation(event);" href="page/delete_menu.php?d=<?php echo $id_menu ?>">
                                            <button type=" button" class="btn btn-danger btn-block text-white hapus">hapus</button>
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
<!-- Row -->