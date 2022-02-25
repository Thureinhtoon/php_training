<?php
session_start();
if(!isset($_SESSION['user'] )) {
    header("location:login.php");
}
include_once 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $ph = $_POST["ph"];
    $city = $_POST["city"];
    $create = "INSERT INTO users (name, email, password, phone_number, city) VALUES ('$name', '$email', '$password', '$ph', '$city');";
    $query = mysqli_query($connect, $create);
    header("location:index.php?created='true'");
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tutorial 08</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h3>Create User</h3>
        <form action="create.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="ph">Phone Number:</label>
                <input type="number" id="ph" class="form-control" name="ph" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" class="form-control" name="city" required>
            </div>
            <input type="submit" value="create" name="submit" class="btn btn-primary" required>
        </form>
    </div>
</body>

</html>
