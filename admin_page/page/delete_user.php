<?php
include_once('../../controller/db_config.php');
include_once('../../controller/UserController.php');
include_once('../../controller/Function.php');
$user = new User();
$encry = new Enkripsi();
$encry->word = $_GET['d'];
$id = $encry->decr();
if ($user->destroy($id)) {
    return header('location:../index.php?p=user');
} else {
    return header('location:../index.php?p=user');
}
