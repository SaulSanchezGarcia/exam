<?php

class ConectarDB {

    function conectar(){
        $servername = "localhost";
        $database = "examen";
        $username = "root";
        $password = "root";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }else{
            // print_r("SUCCESS");
        }
        return $conn;
    }
}
?>