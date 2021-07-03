<?php

class Menu
{
    public $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    /**
     * Get all menu from database
     * 
     * @return $menu[]
     */
    public function get_all()
    {
        $sql1 = "SELECT * FROM menu
            INNER JOIN kategori ON kategori.id_kategori = menu.id_kategori";
        $result = $this->db->query($sql1);
        $menu = $result->fetch_all(MYSQLI_ASSOC);

        return $menu;
    }

    // Get count menu from database
    // @return $menu1[]


    public function get_count()
    {
        $sql3 = "SELECT COUNT(*) as jmlMenu FROM menu";
        $result = $this->db->query($sql3);
        $menu1 = $result->fetch_assoc();
        return $menu1;
    }

    /**
     * Store menu to the database
     * 
     * @param $post
     * @return Location::/page_menu/index.php
     */
    public function store()
    {
        $nama_menu = $_POST['nama_menu'];
        $id_menu = $_POST['id_menu'];
        $id_kategori = $_POST['kategori'];
        $status = $_POST['status'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];

        // Input nama gambar
        $nama_gambar = $_FILES['gambar']['name'];
        $target_dir = "../assets/images/";

        $target_file = $target_dir . basename($_FILES['gambar']['name']);

        // Select File type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        $sql1 = "SELECT id_menu, nama_menu FROM menu
            WHERE id_menu = '$id_menu' AND nama_menu = '$nama_menu'";

        // Checking if the nama_menu is available
        $check = $this->db->query($sql1);
        $count_row = $check->num_rows;

        // If the nama_menu is not in db then insert it to table
        if ($count_row == 0) {
            if (in_array($imageFileType, $extensions_arr)) {
                // Upload file
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_dir . $nama_gambar)) {
                    $sql2 = "INSERT INTO menu 
                VALUES(
                    '$id_menu',
                    '$id_kategori',
                    '$nama_menu',
                    '$deskripsi',
                    '$harga',
                    '$status',
                    '$nama_gambar'
                    )";
                    $result = mysqli_query($this->db, $sql2) or die(mysqli_connect_errno() . "Data cannot inserted");
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * 
     * @return $menu
     */
    public function view($id)
    {
        $sql1 = "SELECT * FROM menu WHERE id_menu = '$id'";
        $result = $this->db->query($sql1);
        $menu = $result->fetch_assoc();

        return $menu;
    }

    /**
     * Update menu
     * @param $id_menu, $id_kategori, $nama_menu, $deskripsi, $harga, $status, $gambar
     * 
     * @return true OR false
     */
    public function update($id_menu_before)
    {
        $nama_menu = $_POST['nama_menu'];
        $id_menu = $_POST['id_menu'];
        $id_kategori = $_POST['kategori'];
        $status = $_POST['status'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        // Input nama gambar
        $nama_gambar = $_FILES['gambar']['name'];
        $target_dir = "../assets/images/";

        $target_file = $target_dir . basename($_FILES['gambar']['name']);

        // Select File type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_dir . $nama_gambar)) {
                $sql1 = "UPDATE menu SET
                id_menu = '$id_menu',
                id_kategori = '$id_kategori',
                nama_menu = '$nama_menu',
                deskripsi = '$deskripsi',
                harga = '$harga',
                status = '$status',
                gambar = '$nama_gambar'
                WHERE id_menu = '$id_menu_before'
            ";

                $query = $this->db->query($sql1);
                $result = $query;
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    /**
     * Delete menu
     * 
     * @param $id
     * @return true OR false
     */
    public function destroy($id)
    {
        $sql1 = "DELETE FROM menu WHERE id_menu = '$id'";
        $query = $this->db->query($sql1);
        $result = $query;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
