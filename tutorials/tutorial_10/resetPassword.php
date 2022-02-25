<?php
include_once './connect.php';
$error = false;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $query = "SELECT email FROM users WHERE email='$email'";
    $execute = mysqli_query($connect, $query);
    if ($row = mysqli_fetch_assoc($execute)) {
        session_start();
        $_SESSION['email'] = $email;
        header('location: mail.php');
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
    <title>Tutorial10</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h3>Login Form</h3>
        <form action="resetPassword.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <input type="submit" name="submit" class="btn btn-danger form-control" value="Reset">
        </form>
        <?php
if ($error) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Your email is not incorrect!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span> </button> </div>";
}
?>
    </div>
</body>
</html>