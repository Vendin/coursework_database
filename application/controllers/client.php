<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class Controller_Client extends Controller_Base {



    function index(){
        include "../application/view/client.php";
    }

    function add(){
        var_dump($_POST);
    }

    function view() {
        echo 'hello home view!';
    }

}