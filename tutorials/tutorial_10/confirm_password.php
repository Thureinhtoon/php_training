<?php
include_once "./connect.php";
$error = false;
session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
$email = $_SESSION['email'];
if (isset($_POST['submit'])) {
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    if ($pass === $cpass) {
        $query = "UPDATE users SET password = MD5('$pass') WHERE email = '$email'";
        $execute = mysqli_query($connect, $query);
        if ($execute) {
            header("location: login.php?pass=success");
        }
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 10</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">

        <h3>Reset your password</h3>
        <form action="confirm_password.php" method="post">
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>
            <div class="form-group">
                <label for="pass">Confirm Password:</label>
                <input type="password" class="form-control" name="cpass" id="pass">
            </div>
            <input type="submit" value="change" name="submit" class="btn btn-success form-control">
        </form>
        <?php
        if ($error) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Your passwords are not the same.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span> </button> </div>";
        }
        ?>
    </div>
    <!-- ./container -->
</body>

</html>