<?php
require_once("../model/model.php");
$conn = new Model();
$show = $conn -> showProducts();
$showInsert = $conn -> showInsert();


$i = $_REQUEST["accion"];

switch ($i) {
    case 'login':
        $login = new Controller();
        $login -> login();
    break;

    case 'insert':
        $insert = new Controller();
        $insert -> insert();
    break;

    case 'delete':
        $delete = new Controller();
        $delete -> delete();

}

class Controller{

    private $model;

    function login(){
        $model = new Model();
        $model -> login();
    }

    function insert(){
        $model = new Model();
        $model -> insert();
    }

    function delete(){
        $model = new Model();
        $model -> delete();
    }
}
?>