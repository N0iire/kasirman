<?php

class Transaksi
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
     * Get all transaksi from database
     * 
     * @return $data[]
     */
    public function index()
    {
        $sql = "SELECT * FROM transaksi
        INNER JOIN kasir ON transaksi.id_kasir = kasir.id_kasir";
        $query = $this->db->query($sql);
        $transaksi = $query->fetch_all(MYSQLI_ASSOC);

        return $transaksi;
    }

    // Get count menu from database
    // @return $menu1[]
    public function get_count()
    {
        $sql2 = "SELECT COUNT(*) as jmlTrans FROM transaksi";
        $result = $this->db->query($sql2);
        $trans = $result->fetch_assoc();
        return $trans;
    }

    public function store($tggl, $total, $pembeli, $id_kasir)
    {
        $sql1 = "INSERT INTO transaksi(tgl, total, pembeli, id_kasir) VALUES(
            '$tggl', '$total', '$pembeli', '$id_kasir'
        )";
        $query = $this->db->query($sql1);
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }

    public function view($id)
    {
        $sql1 = "SELECT * FROM transaksi WHERE no_struk = '$id'";
        $result = $this->db->query($sql1);
        $transaksi = $result->fetch_assoc();

        return $transaksi;
    }
}
