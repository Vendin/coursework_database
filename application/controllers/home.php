<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class Controller_Home extends Controller_Base {


    function index()
    {
        echo "hello home index!";
        var_dump($_SESSION);
    }

    function view() {
        echo 'hello home view!';
    }

}