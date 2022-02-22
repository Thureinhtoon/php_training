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
        <h3>Tutorial 08</h3>
        <a href="create.php" class=" btn btn-primary my-5">Create User</a>
        <?php
        include_once('connect.php');
        if (isset($_GET['delete'])) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Hello</strong> user id  deleted successfully.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
        }
        if (isset($_GET['updated'])) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Hello</strong> Your record updated successfully.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
        }
        if (isset($_GET['created'])) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Hello</strong> Your record created successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        }

        $select = 'SELECT * from users;';
        $execute = mysqli_query($connect, $select);
        if (mysqli_num_rows($execute) > 0) {
            echo "<table  class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>Id</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Password</th>
                        <th scope='col'>Phone</th>
                        <th scope='col'>City</th>
                        <th scope='col'>Actions</th>
                    </tr>
                </thead>";
            while ($row = mysqli_fetch_assoc($execute)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>
                            <a href=\"update.php?id={$row['id']}\" class='btn btn-sm btn-success'>edit</a> | 
                            <a href=\"delete.php?id={$row['id']}\" class='btn btn-sm btn-danger'>delete</a>
                        </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "users table have no record yet.";
        }
        mysqli_close($connect);
        ?>
    </div>
</body>

</html>