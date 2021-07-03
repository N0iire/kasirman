<?php
session_start();
include_once '../controller/UserController.php';
$user = new User();

if (isset($_POST['submit'])) {
    $id = $user->db->escape_string($_POST['id']);
    $nama = $user->db->escape_string($_POST['nama']);
    $password = $user->db->escape_string($_POST['password']);
    $regis = $user->store($id, $nama, $password);
    if ($regis) {
        //Registration success
        $login = $user->login($id, $password);
        if ($login) {
            // Registration Success
            header("location:../index.php");
        } else {
            // Registration Failed
            echo 'ID atau Password salah';
        }
        header("location:../index.php?message=regisOk");
    } else {
        echo "Registrasi gagal";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/login.css">
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

</head>

<body>
    <script type="text/javascript" language="javascript">
        function submitlogin() {
            var form = document.login;
            if (form.id.value == "") {
                alert("Enter id");
                return false;
            } else if (form.password.value == "") {
                alert("Enter password.");
                return false;
            } else if (form.nama.value == "") {
                alert("Enter name.")
            }
        }
    </script>




    <div class="login-dark">
        <form method="post" action="" name="login">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img src="../assets/images/login.svg" alt="login"></div>
            <div class="form-group"><input class="form-control" type="text" name="id" placeholder="Username" required></div>
            <div class="form-group"><input class="form-control" type="text" name="nama" placeholder="Name" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><input class="btn btn-primary btn-block" onclick="return(submitlogin());" type="submit" name="submit" value="Register"></div>
        </form>
    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
</body>

</html>