<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class Controller_Client extends Controller_Base {

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

    function index(){
        $a_data = array(
            'list_mark' => $this->getAllMark()
        );
        include "../application/view/client.php";
    }

    function add(){
        $query = "SELECT DISTINCT new_price FROM model WHERE moid=:moid";
        $sth = $this->db->prepare($query);
        $sth->execute(array(
            ':moid' =>  $_POST['model']
        ));
        $result = $sth->fetch();
        $price = $result['new_price'];
        $price = $price * ((100 - (($_POST['year'] - 1970))) / 100);
        $query = "insert into assessment (uid, moid, year, firstname, lastname, number_phone,  passport_id, price)
            values (:uid, :moid, :year, :firstname, :lastname, :number_phone,  :passport_id, :price)";
        $sth = $this->db->prepare($query);

        try {
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
            $this->db->beginTransaction();
            $sth->execute(
                array(
                    'uid' => $_POST['uis'],
                    ':number_phone' => $_POST['number_phone'],
                    ':firstname' => $_POST['firstname'],
                    ':lastname' => $_POST['lastname'],
                    ':passport_id' => $_POST['number_pas'],
                    ':moid' => $_POST['model'],
                    ':year' => $_POST['year'],
                    ':price' => $price

                )
            );
            $this->db->commit();

        } catch (\PDOException $e) {
            $this->db->rollback();
            echo "Database error: " . $e->getMessage();
            die();
        }



        echo json_encode(array('price' => $price));
    }

    public function getAllMark(){
        $query = "SELECT DISTINCT maid, name_mark FROM mark";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $result = $sth->fetchAll();
        if (!$result) {
            return false;
        }
        return ($result);
    }

    public function getAllModel(){
        $query = "SELECT DISTINCT moid, name_model FROM model WHERE maid=:mark";
        $sth = $this->db->prepare($query);
        $sth->execute(array(
            ':mark' =>  $_POST['mark']
        ));
        $result = $sth->fetchAll();
        if (!$result) {
            echo json_encode(false);
        }
        echo json_encode($result);
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