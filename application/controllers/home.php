<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class Controller_Home extends Controller_Base {


    function index()
    {
        include "../application/view/indexs.php";
    }

    function view() {
        echo 'hello home view!';
    }

}