<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class Controller_Admin extends Controller_Base {


    private $db;
    private $db_host = "localhost";
    private $db_name = "autodb";
    private $db_user = "root";
    private $db_pass = "root";


    public function __construct($username = null, $password = null)
    {
        $this->username = $username;
        $this->connectDb($this->db_name, $this->db_user, $this->db_pass, $this->db_host);
    }

    function index() {

    }

    function add() {
        include '../application/view/add.php';
    }

    function otchet($c) {
        $query = "SELECT * FROM otchet WHERE number = :number";
        $sth = $this->db->prepare($query);
        $result = $sth->execute(
            array(
                ':number' => $_POST['number']
            )
        );
        $result = $sth->fetchAll();

        $a_data = array(
            'lists' => $result
        );
        include '../application/view/otchet.php';

    }

    function lists() {
        $query = "SELECT * FROM info_otchet ORDER BY id DESC";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $result = $sth->fetchAll();
        $a_data = array(
            'lists' => $result
        );
        include '../application/view/lists.php';
    }

    function add_create() {
        $query = "CALL new_procedure('". $_POST['start'] ."', '". $_POST['end'] ."');";

        $sth = $this->db->prepare($query);
        try {
            $sth->execute();
        } catch (PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }
        header("Location: /home");
    }

    public function connectdb($db_name, $db_user, $db_pass, $db_host = "localhost")
    {
        try {
            $this->db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (\pdoexception $e) {
            echo "database error: " . $e->getmessage();
            die();
        }
        $this->db->query('set names utf8');

        return $this;
    }
}