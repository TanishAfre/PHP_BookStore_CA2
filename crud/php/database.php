<?php

function Createdb(){
    $dsn = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bookstore';


    // creating a table
    $con = mysqli_connect($dsn,$username,$password);

    if(!$con){
        die("Connection Failed: ".mysqli_connect_error());
    }

    // Creating new database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($dsn,$username,$password,$dbname);
        $sql = "
                CREATE TABLE IF NOT EXISTS books(
                    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    book_name VARCHAR(25) NOT NULL,
                    book_publisher varchar(20),
                    book_cost FLOAT
                );
        ";

        if (mysqli_query($con, $sql)){
            return $con;
        }
        else
            echo "Cant create table";
    }
    else
        echo "Error while creating a new database".mysqli_error($con);

    // try {
    //     $db = new PDO($dsn, $username, $password);
    // } catch (PDOException $e) {
    //     $error_message = $e->getMessage();
    //     include('database_error.php');
    //     exit();
    // }
}

?>