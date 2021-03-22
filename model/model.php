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

    function insertProduct(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();
        
        $img = $_REQUEST['img'];
        $name = $_REQUEST['name'];
        $brand = $_REQUEST['brand'];
        $model = $_REQUEST['model'];
        $stock = $_REQUEST['stock'];
        $price = $_REQUEST['price'];
        $variable = array("insert" => false,"mensaje" => "");
        
        $query = "INSERT INTO products(img, name, brand, model, stock, price) VALUES ('$img','$name','$brand','$model','$stock','$price')";
        $result = mysqli_query($connection, $query);

        if($result){
            $variable["insert"] = true;
            $variable["mensaje"] = "Successfull Registration";
        }else{
            $variable["insert"] = false;
            $variable["mensaje"] = "Something went wrong";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);
    }

    function insertOrder(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();
        
        $date = $_REQUEST['date'];
        $idC = $_REQUEST['idC'];
        $idE = $_REQUEST['idE'];
        $idP = $_REQUEST['idP'];
        $idO = $_REQUEST['idO'];
        $variable = array("insert" => false,"mensaje" => "");
        
        $query = "INSERT INTO sales(date, CUSTOMERS_idC, EMPLOYEES_idE, PRODUCTS_idP, OUTLETS_idO) VALUES ('$date','$idC','$idE','$idP','$idO')";
        $result = mysqli_query($connection, $query);

        if($result){
            $variable["insert"] = true;
            $variable["mensaje"] = "Successfull Registration";
        }else{
            $variable["insert"] = false;
            $variable["mensaje"] = "Something went wrong";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);
    }

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

    function deleteProd(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $idP = $_REQUEST["idP"];
        $query = "DELETE FROM products WHERE idP = '$idP'";
        $result = mysqli_query($connection, $query);
        $variable = array("eliminado" => false, "mensaje" => "");

        if($result){
            $variable["eliminado"] = true;
            $variable["mensaje"] = "SUCCESSFULL DELETE";
        }else{
            $variable["eliminado"] = false;
            $variable["mensaje"] = "SOMETHING WENT WRONG";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);
    }

    function delPO(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $idS = $_REQUEST["idS"];
        $query = "DELETE FROM sales WHERE idS = '$idS'";
        $result = mysqli_query($connection, $query);
        $variable = array("eliminado" => false, "mensaje" => "");

        if($result){
            $variable["eliminado"] = true;
            $variable["mensaje"] = "SUCCESSFULL DELETE";
        }else{
            $variable["eliminado"] = false;
            $variable["mensaje"] = "SOMETHING WENT WRONG";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);
    }

    function update(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $idC = $_REQUEST['idC'];
        $name = $_REQUEST['name'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $zip = $_REQUEST['zip'];
        $phone = $_REQUEST['phone'];
        $variable = array("actualizado"=> false, "mensaje"=> "");

        $query = "UPDATE customers 
        SET name = '$name', last_name = '$last_name', email = '$email', zip = '$zip', phone = '$phone' WHERE idC = '$idC'";
        $result = mysqli_query($connection, $query);
        if($result){
            // echo "Se actualizo";
            $variable["actualizado"] = true;
            $variable["mensaje"] = "SUCCESSFULLY UPDATED";
        }else{
            $variable["actualizado"] = false;
            $variable["mensaje"] = "SOMETHING WENT WRONG";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);
    }

    function updateProduct(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $idP = $_REQUEST['idP'];
        $name = $_REQUEST['name'];
        $brand = $_REQUEST['brand'];
        $model = $_REQUEST['model'];
        $stock = $_REQUEST['stock'];
        $price = $_REQUEST['price'];
        $variable = array("actualizado"=> false, "mensaje"=> "");

        $query = "UPDATE products 
        SET name = '$name', brand = '$brand', model = '$model', stock = '$stock', price = '$price' WHERE idP = '$idP'";
        $result = mysqli_query($connection, $query);
        if($result){
            // echo "Se actualizo";
            $variable["actualizado"] = true;
            $variable["mensaje"] = "SUCCESSFULLY UPDATED";
        }else{
            $variable["actualizado"] = false;
            $variable["mensaje"] = "SOMETHING WENT WRONG";
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        echo json_encode($variable);
        mysqli_close($connection);
    }

    function pintarDatos(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $idC = $_REQUEST['idC'];
        $query = "SELECT name, last_name, email, zip, phone FROM customers WHERE idC = '$idC'";

        $result = mysqli_query($connection, $query);

        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $arr[] = $row;
            }
            //  print_r($arr);
             echo json_encode($arr);
        }else{
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        mysqli_close($connection);
    }

    function showOrder(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $query = "SELECT sales.idS AS PO, customers.name AS Customer_Name, employees.name AS Employee_Name, 
        products.brand AS Brand, products.model AS Model, products.price AS Price, sales.date AS Date FROM sales
        INNER JOIN customers ON customers.idC = sales.CUSTOMERS_idC
        INNER JOIN employees ON employees.idE = sales.EMPLOYEES_idE
        INNER JOIN products ON products.idP = sales.PRODUCTS_idP"; 
        $result = mysqli_query($connection, $query);

        if($result){
            while($row = mysqli_fetch_array($result)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        mysqli_close($connection);
    }

    function showInsertProduct(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $query = "SELECT * FROM products"; 
        $result = mysqli_query($connection, $query);

        if($result){
            while($row = mysqli_fetch_array($result)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        mysqli_close($connection);
    }

    function showInsert(){
        $conn = new ConectarDB();
        $connection = $conn->conectar();

        $query = "SELECT * FROM customers"; 
        $result = mysqli_query($connection, $query);

        if($result){
            while($row = mysqli_fetch_array($result)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        mysqli_close($connection);
    }

    function showUpdate(){
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
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        mysqli_close($connection);
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
            echo "ERROR".$query."<br>".mysqli_error($connection);
        }
        mysqli_close($connection);

    }
}
?>