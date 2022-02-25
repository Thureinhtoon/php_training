<?php 
          $host = "localhost";
          $user = "root";
          $password = "1234";
          $connect = new mysqli($host, $user, $password);
          if (!$connect) {
              die('Could not connect: ' . mysqli_connect_error());  
          }
        $create_db = 'CREATE DATABASE IF NOT EXISTS tutorial_10;'; 
        if (mysqli_query($connect, $create_db)) {  
            echo 'Database created successfully.<br>';
            $create_table = 'CREATE TABLE IF NOT EXISTS users(
            id int NOT NULL AUTO_INCREMENT,
            name varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            password varchar(100) NOT NULL,
            phone_number varchar(100) NOT NULL,
            city varchar(100) NOT NULL,
            PRIMARY KEY(id) )';
            mysqli_select_db($connect, "tutorial_10");
            if (mysqli_query($connect, $create_table)) {
                echo 'Users table created successfully.<a href="index.php">Go home page.</a>';
            } else {
                echo 'Table is not created.';
            }
            $userdata = 'INSERT INTO users (email , password) VALUES ("admin@gmail.com", MD5("admin"));';//insert admin 
            if (mysqli_query($connect, $userdata)) {
                echo "user created.";
            } else {
                echo "user create error.";
            }
        }
        mysqli_close($connect);
     
?>