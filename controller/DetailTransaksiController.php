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
        $sql = "SELECT c.harga, c.nama_menu, a.jumlah, a.total_harga FROM detail_transaksi a
        INNER JOIN transaksi b ON b.no_struk = a.no_struk
        INNER JOIN menu c ON c.id_menu = a.id_menu
        WHERE a.no_struk = $no_struk
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
