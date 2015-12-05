<?php

class Controller_Index extends Controller_Base {

    function index(){
        include "../application/view/index.php";
    }

    function view(){

        echo "Hello index view!";

    }
}