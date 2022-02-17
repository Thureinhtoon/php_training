<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email === 'admin@gmail.com' and $password === 'admin123') {
        $_SESSION['user'] = "admin";
        header("location: index.php");
    } 
    else {
        header("location: index.php?error=true");
    }