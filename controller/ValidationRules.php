<?php
class Validation
{
    private $err = [];

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function menuValidation()
    {
        if (empty($_POST['id_menu'])) {
            $err_value = "id menu is required!";
            return $this->err = $err_value;
        } else {
            $id_menu = $this->test_input($_POST['id_menu']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $id_menu)) {
                $nameErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST['nama_menu'])) {
        } else {
        }
        if (empty($_POST['deskripsi'])) {
        } else {
        }
        if (empty($_POST['nama_kategori'])) {
        } else {
        }
        if (empty($_POST['harga'])) {
        } else {
        }
        if (empty($_POST['gambar'])) {
        } else {
        }
    }
}
