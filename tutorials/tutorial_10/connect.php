<?php
    $host = "localhost";
    $user = "root";
    $password = "1234";
    $db = "tutorial_10";
    $connect = mysqli_connect($host, $user, $password, $db);
    if (!$connect) {
        die('Could not connect: ' . mysqli_connect_error());  
    }