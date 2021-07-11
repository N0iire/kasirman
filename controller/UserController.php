<?php
include("db_config.php");

class User
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
     * Registration
     */
    public function store($id, $nama, $password)
    {
        $password = md5($password);
        $sql = "SELECT * FROM kasir WHERE id_kasir='$id'";

        // Checking if the id is available
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;

        // If the id is not in db then insert to the table
        if ($count_row == 0) {
            $sql1 = "INSERT INTO kasir SET id_kasir='$id', nama_kasir='$nama', password='$password'";
            $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Get count user
     */
    public function get_count()
    {
        $sql4 = "SELECT COUNT(*) as jmlKasir FROM kasir";
        $result = $this->db->query($sql4);
        $kasir = $result->fetch_assoc();
        return $kasir;
    }


    /**
     * Login
     */
    public function login($id, $password)
    {
        $password = md5($password);
        $sql2 = "SELECT id_kasir FROM kasir WHERE id_kasir='$id' AND password='$password'";
        // Checking if the id and the password is macthes
        $result = $this->db->query($sql2);
        $user_data = $result->fetch_assoc();
        $count_row = $result->num_rows;

        if ($count_row == 1) {
            // this login var will use for the session thing
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id_kasir'];
            $_SESSION['login_time_stamp'] = time();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Getting the User
     */
    public function get_user($id)
    {
        $sql3 = "SELECT id_kasir, nama_kasir FROM kasir WHERE id_kasir='$id'";
        $result = $this->db->query($sql3);
        $user_data = $result->fetch_assoc();

        return $user_data;
    }

    /**
     * get all user 
     */
    public function get_all()
    {
        $sql5 = "SELECT * FROM kasir";
        $result = $this->db->query($sql5);
        $kasir = $result->fetch_all(MYSQLI_ASSOC);

        return $kasir;
    }

    /**
     * Start the session
     */
    public function get_session()
    {
        return $_SESSION['login'];
    }

    /**
     * Destroying the session
     */
    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }

    /**
     * 
     */
    public function view($id)
    {
        $sql6 = "SELECT * FROM kasir WHERE id_kasir = '$id'";
        $result = $this->db->query($sql6);
        $kategori = $result->fetch_assoc();

        return $kategori;
    }

    /**
     * 
     */
    public function update($id_before)
    {
        $id_kasir = $_POST['id_kasir'];
        $nama_kasir = $_POST['nama_kasir'];

        $sql7 = "UPDATE kasir 
                 SET 
                 id_kasir = '$id_kasir', 
                 nama_kasir = '$nama_kasir' 
                 WHERE id_kasir = '$id_before'";
        $query = $this->db->query($sql7);
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }

}
