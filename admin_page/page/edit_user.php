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
$data_kasir = $kasir->view($id_for_edit);
if (isset($_POST['edit'])) {
    if ($kasir->update($id_for_edit)) {
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
                            <h3> Form Edit User</h3>
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" enctype="multipart/form-data">
                    <div>
                        <div class="form-group">
                            <label for="nama_kasir">Name</label>
                            <input type="text" class="form-control" id="nama_kasir" name="nama_kasir" value="<?php echo $data_kasir['nama_kasir'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_kasir">Username</label>
                            <input type="text" class="form-control" id="id_kasir" name="id_kasir" value="<?php echo $data_kasir['id_kasir'] ?>">
                        </div>
                        <div>
                            <input type="submit" name="edit" value="Ubah" class="btn btn-primary">
                            <input type="reset" name="cancel" value="cancel" class="btn btn-light">
                        </div>
                    </div>
                </form>
            </tbody>
           
        </div>
    </div>
   
</div>
