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

        $name = $_REQUEST['name'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $zip = $_REQUEST['zip'];
        $phone = $_REQUEST['phone'];
        $variable = array("good" => false,"mensaje" => "");

        $query = "INSERT INTO customers(name, last_name, email, zip, phone) VALUES ('$name','$last_name','$email','$zip','$phone')";
        $result = mysqli_query($connection, $query);

        if($result){
            $variable["good"] = true;
            $variable["mensaje"] = "Successfull Registration";
        }else{
            $variable["good"] = false;
            $variable["mensaje"] = "Something went wrong";
            echo "ERROR".$sql."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);

    }

    // function search(){
    //     $conn = new ConectarDB();
    //     $connection = $conn->conectar();

    //     $search = $_REQUEST["search"];

    //     $query = "SELECT * FROM customers WHERE name LIKE '$search%'";
    //     $result = mysqli_query($connection, $query);

    //     while($row = mysqli_fetch_assoc($result)){
    //         $arr[] = $row;
            
    //     }
    //     print_r($arr);
    //     mysqli_close($connection);
    // }

    function delete(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $idC = $_REQUEST["idC"];
        $sql = "DELETE FROM customers WHERE idC = '$idC'";
        $result = mysqli_query($connection, $sql);
        $variable = array("eliminado" => false, "mensaje" => "");

        if($result){
            $variable["eliminado"] = true;
            $variable["mensaje"] = "SUCCESSFULL DELETE";
        }else{
            $variable["eliminado"] = false;
            $variable["mensaje"] = "SOMETHING WENT WRONG";
            echo "ERROR".$sql."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);
    }

    function update(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();
    }

    function showInsert(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $query = "SELECT * FROM customers"; 
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