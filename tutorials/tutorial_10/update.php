<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
include_once 'connect.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');
$select = "select * from users where id = $id;";
$execute = mysqli_query($connect, $select);
$rows = mysqli_fetch_assoc($execute);
$name = $rows['name'];
$email = $rows['email'];
$password = $rows['password'];
$ph = $rows['phone_number'];
$city = $rows['city'];

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ph = $_POST["ph"];
    $city = $_POST["city"];
    $update = "UPDATE users SET name = '$name', email = '$email',
    password = '$password', phone_number = '$ph', city = '$city'
    WHERE id = $id;";
    mysqli_query($connect, $update);
    header("location:index.php?updated='true'");
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
        <h3>Update a record</h3>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($name) ? $name : "" ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo isset($email) ? $email : "" ?>" required>
            </div>
            <div class="form-group">
                <label for="password">password:</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php echo isset($password) ? $password : "" ?>" required>
            </div>
            <div class="form-group">
                <label for="ph">Phone Number:</label>
                <input type="text" id="ph" name="ph" class="form-control" value="<?php echo isset($ph) ? $ph : "" ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" class="form-control" value="<?php echo isset($city) ? $city : "" ?>" required>
            </div>
            <input type="submit" value="update" name="submit" class="btn btn-success form-control">
        </form>
    </div>

</body>

</html>