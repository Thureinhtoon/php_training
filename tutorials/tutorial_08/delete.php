<?php
include_once('connect.php');
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');
if (isset($_POST['submit'])) {
    $delete = "DELETE FROM users WHERE id = $id;";
    $execute = mysqli_query($connect, $delete);
    header("location: index.php?delete='true'");
} elseif (isset($_POST['cancel'])) {
    header("location: index.php");
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete person | tutorial 08</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="delete.php?id=<?php echo $id; ?>" method="POST" class="delete">
        <h3 class="text-center text-danger my-5">Are you sure you want to delete?</h3>
        <div class="form-group my-5">
            <input type='submit' value='Delete' name="submit" class='btn btn-danger form-control my-3'>
            <input type='submit' value='Cancel' name="cancel" class='btn btn-outline-primary form-control'>
        </div>
    </form>

</body>

</html>