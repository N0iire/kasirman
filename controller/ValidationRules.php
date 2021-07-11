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
                $err_value = "Only letters and white space allowed";
                return $this->err = $err_value;
            }
        }
        if (empty($_POST['nama_menu'])) {
            $err_value = "nama menu is required!";
            return $this->err = $err_value;
        } else {
            $nama_menu = $this->test_input($_POST['nama_menu']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nama_menu)) {
                $err_value = "Only letters and white space allowed";
                return $this->err = $err_value;
            }
        }
        if (empty($_POST['deskripsi'])) {
            $err_value = "deskripsi is required!";
            return $this->err = $err_value;
        } else {
            $deskripsi = $this->test_input($_POST['deskripsi']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $deskripsi)) {
                $err_value = "Only letters and white space allowed";
                return $this->err = $err_value;
            }
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
