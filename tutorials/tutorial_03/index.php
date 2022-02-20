<?php
error_reporting(0);
$birthday = $_POST['birthday'];
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial03</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <style>
        body {
            text-align: center;
            box-sizing: border-box;
        }

        h1 {
            margin: 20px 0;
            font-size: 40px;
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        input {
            display: inline-block;
            width: 50%;
            margin: 10px;
            padding: 20px;
            border: 1px solid #000;
        }

        input[type=submit] {
            width: 50%;
            border: 2px solid #000;
            color: black;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Tutorial 03 Assignment</h1>
    <form class="form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" autocomplete="off">
        <label for="birthday">Select Your Birthday</label>
        <input id="date" type="text" name="birthday" value="<?php echo $birthday; ?>">
        <input type="submit" name="submit" value="Caculate Your Age">
    </form>

    <?php

    if (isset($_POST['submit'])) {
        $birthday = $_POST['birthday'];
        $yourBirthDate = new DateTime($birthday);
        $today = new DateTime();
        if ($yourBirthDate > $today) {
            echo 'Are you a time traveller?';
        } else {
            $age = $yourBirthDate->diff($today);
            echo 'Your Age is: ' . $age->y . ' Years ' . $age->m . ' Months ' . $age->d . ' Days ';
        }
    }
    ?>
    <script>
        $(document).ready(function() {
            $("#date").datepicker();
        });
    </script>
</body>

</html>