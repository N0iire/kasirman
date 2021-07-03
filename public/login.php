<?php
session_start();
include_once '../controller/UserController.php';
$user = new User();

if (isset($_POST['submit'])) {
    $id = $user->db->escape_string($_POST['id']);
    $password = $user->db->escape_string($_POST['password']);
    $login = $user->login($id, $password);
    if ($login) {
        // Registration Success
        header("location:../index.php?p=sukses");
    } else {
        // Registration Failed
        echo 'Wrong username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard Admin</title>
    <link rel="icon" type="image/png" sizes="19x16" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Masukkan username terlebih dahulu!'
                });
                return false;
            } else if (form.password.value == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Masukkan password!',
                });
                return false;
            }
        }
    </script>



    <div class="login-dark">
        <form method="post" action="login.php" name="login">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <img src="../assets/images/login.svg" alt="login">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="id" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" onclick="return(submitlogin());" type="submit" name="submit" value="Login">
            </div><a href="registration.php" class="forgot">Register new user</a>
        </form>
    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>