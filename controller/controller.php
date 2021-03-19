<?php
require_once("../model/model.php");
$conn = new Model();
$show = $conn -> showProducts();
$showInsert = $conn -> showInsert();
$showUpdate = $conn -> showUpdate();
$showOrder = $conn -> showOrder();
$showInsertProduct = $conn -> showInsertProduct();


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
    break;

    case 'update':
        $update = new Controller();
        $update -> update();
    break;

    case 'pintar':
        $pintar = new Controller();
        $pintar -> pintar();
    break;

    case 'insertProduct':
        $insertProduct = new Controller();
        $insertProduct -> insertProduct();
    break;

    case 'deleteProd':
        $deleteProd = new Controller();
        $deleteProd -> deleteProd();
    break;

    case 'updateProduct':
        $updateProduct = new Controller();
        $updateProduct -> updateProduct();
    break;

    case 'insertOrder':
        $insertOrder = new Controller();
        $insertOrder -> insertOrder();
    break;

    case 'delPO':
        $delPO = new Controller();
        $delPO -> delPO();
    break;
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

    function update(){
        $model = new Model();
        $model -> update();
    }

    function pintar(){
        $model = new Model();
        $model -> pintarDatos();
    }

    function insertProduct(){
        $model = new Model();
        $model -> insertProduct();
    }

    function deleteProd(){
        $model = new Model();
        $model -> deleteProd();
    }

    function updateProduct(){
        $model = new Model();
        $model -> updateProduct();
    }

    function insertOrder(){
        $model = new Model();
        $model -> insertOrder();
    }

    function delPO(){
        $model = new Model();
        $model -> delPO();
    }
}
?>