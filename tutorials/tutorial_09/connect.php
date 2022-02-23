<?php 
$host = "localhost";
$username = "root";
$password = "1234";
$db_name = "tutorial_09";

$connect = mysqli_connect($host,$username,$password,$db_name);

if(!$connect){
    echo "Database cannot connect".mysqli_connect_error();
}