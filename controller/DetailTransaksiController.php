<?php

class DetailTransaksi
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

    public function view($no_struk)
    {
        $sql = "SELECT * FROM detail_transaksi
            INNER JOIN transaksi ON transaksi.no_struk = detail_transaksi.no_struk
            INNER JOIN menu ON menu.id_menu = detail_transaksi.id_menu
            WHERE detail_transaksi.no_struk = $no_struk
        ";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function store($no_struk, $id_menu, $jumlah, $harga)
    {
        $sql1 = "INSERT INTO detail_transaksi VALUE(
            '$no_struk', '$id_menu', '$jumlah', '$harga'
        )";

        $query = $this->db->query($sql1);

        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
}
