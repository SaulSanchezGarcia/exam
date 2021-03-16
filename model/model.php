<?php
require_once("../dbConection/connection.php");

class Model{

    function login(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $user_name = $_REQUEST['user_name'];
        $password = $_REQUEST['password'];

        session_start();
        $_SESSION['user_name'] = $user_name;
        
        $variable = array("encontrado" => false, "mensaje" => "");

        $query = "SELECT * FROM employees WHERE user_name = '$user_name' AND password = '$password'";
        $result = mysqli_query($connection, $query);
        $filas = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if($filas >=1){
            if($row['idE'] == 1){
                $variable['encontrado'] = true;
                $variable['mensaje'] = "Welcome you are the admin";
            }else{
                $variable['encontrado'] = true;
                $variable['mensaje'] = "Welcome you are an a employee";
            }
        }else{
            $variable['encontrado'] = false;
            $variable['mensaje'] = "The user name or the password are incorrect";
        }
        echo json_encode($variable);
        mysqli_close($connection); 
       
    }

    function insert(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();
    }

    function delete(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();
    }

    function update(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();
    }

    function showProducts(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $query = "SELECT * FROM products"; 
        $result = mysqli_query($connection, $query);

        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            echo "ERROR".$sql."<br>".mysqli_error($conection);
        }
        mysqli_close($conection);

    }
}
?>