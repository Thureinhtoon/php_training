<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>tutorial 04</title>
  <style>

    h1 {
      margin: 50px auto;
    }

    form {
      margin:0 auto;
    }


    form input {
      display: block;
      width: 50%;
      margin-bottom: 20px;
      padding: 20px;
    }

    form input[type=submit] {
      width: 50%;
      border: 1px solid #000;
      background-color: #fff;
      color: #000;
      cursor: pointer;
    }

    p {
      color: red;
    }

    .btn {
      padding: 8px;
      border: 1px solid #ff0000;
      color: #ff0000;
      text-decoration: none;
      border-radius: 5px;
    }

    .btn:hover {
      background-color: #ff0000;
      color: #fff;
    }
  </style>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user'])) {
          echo " <h3>Welcome From Admin Panel</h3>
          <a href='logout.php'>Logout</a>" ;
        } 
        else {
          echo "<h1>Login</h1>
          <form action='login.php' method='POST'>
              <input type='email' name='email' id='email' placeholder='Enter Email' required>
              <input type='password' name='password' id='password' placeholder='Enter Password' required>
              <input type='submit' value='Login'>
          </form>";
        
        }
      if ( isset($_GET['error']) ){
          echo "<p>Invalid Email or Password</p>";
      }
    ?>
       

</body>
</html>