<?php $data_kasir = $user->get_all(); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                                <th class="border-top-0" style="width: 5%;">No</th>
                                <th class="border-top-0" style="width: 20%;">Name</th>
                                <th class="border-top-0" style="width: 20%;">Username</th>
                                <th class="border-top-0" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data_kasir as $data) { ?>
                                <tr>
                                    <td align="center" class="align-middle"><?php echo $i; ?></td>
                                    <td align="center" class="align-middle"><?php echo $data['nama_kasir']; ?><br></td>
                                    <td align="center" class="align-middle"><?php echo $data['id_kasir']; ?><br></td>
                                    <td align="center" class="align-middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Action
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="edit_user.php">Edit</a>
                                        <a class="dropdown-item" href="delete_user.php">Delete</a>
                                        </div>
                                    </div>
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