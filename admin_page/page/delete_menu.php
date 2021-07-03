<?php
include_once('../../controller/db_config.php');
include_once('../../controller/MenuController.php');
include_once('../../controller/Function.php');
$menu = new Menu();
$encry = new Enkripsi();
$encry->word = $_GET['d'];
$id = $encry->decr();
if ($menu->destroy($id)) {
    return header('location:../index.php?p=menu');
} else {
    return header('location:../index.php?p=menu');
}
