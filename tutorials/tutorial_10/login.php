<?php
include_once './connect.php';
$success = false;
$error = false;
if (isset($_GET['pass'])) {
        $success = true;
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $check = "SELECT email, password FROM users WHERE email='$email' AND password=MD5('$pass')";
    $execute = mysqli_query($connect, $check);
    $row = mysqli_fetch_assoc($execute);
    if ($row) {
        session_start();
        $_SESSION['user'] = "admin";
        header('location: ./index.php');
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
    <title>Tutorial10|Login</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h3>Login Form</h3>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass" id="pass">
            </div>
            <input type="submit" name="submit" class="btn btn-success form-control" value="submit">
        </form>
        <a href="resetPassword.php" class="btn btn-danger form-control">reset password</a>
        <?php
        if ($error) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Your  email or password is incorrect!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span> </button> </div>";
        }

        if ($success) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
               Your password changed successfully!.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span> </button> </div>";
        }
        ?>
    </div>
    <!-- ./container -->
</body>

</html>