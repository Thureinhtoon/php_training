<?php 
$host = "localhost";
$username = "root";
$password = "1234";

$connect = new mysqli($host,$username,$password);
if(!$connect){
    echo "database cannot connect".mysqli_connect_error();
}

$create_db = 'CREATE DATABASE IF NOT EXISTS tutorial_09;';
if(mysqli_query($connect,$create_db)){
    echo "Database created successfully.";
    $create_table = 'CREATE TABLE IF NOT EXISTS users(
        id int AUTO_INCREMENT NOT NULL,
        PRIMARY KEY (id),
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        password varchar(100) NOT NULL,
        phone_number varchar(100) NOT NULL,
        city varchar(100) NOT NULL
    );';
    mysqli_select_db($connect,"tutorial_09");
    if(mysqli_query($connect,$create_table)){
        echo "Table have been successfully created <a href='index.php'>Go To Index</a>.";
    }else{
        echo "Table have not been created yet!";
    }

}

mysqli_close($connect);
?>