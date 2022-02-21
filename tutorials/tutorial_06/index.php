<?php

$folder = "";
$folderErr =  "";
$success = "";
$errors[] = "";

if (isset($_POST['submit'])) {
    if (empty($_POST["folder"])) {
        $folderErr = "Folder required";
    } else {
        $folder = $_POST["folder"];
    }
    $image_name = $_FILES["img"]["name"];
    $temp_name  = $_FILES["img"]["tmp_name"];
    if (empty($image_name)) {
        $errors[] = "File field is required";
    }

    if ($folder && $image_name) {
            if (!is_dir($folder)) {
                mkdir($folder, 0777);
            }
            $path = $folder ."/".$image_name;
            if (count($errors) <= 1 &&  ( ($_FILES["img"]["type"] == "image/jpeg")
            || ($_FILES["img"]["type"] == "image/png")
            || ($_FILES["img"]["type"] == "image/jpg")) ) {
                move_uploaded_file($temp_name, $path);
                $success = 'Complete Uploaded!';
            }else{
                $errors[] = "Your input must be image!";
            }
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 6</title>
</head>

<body>
    <h1>Tutorial06 </h1>
    <span class="success"><?php echo $success; ?></span>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-control">
            <label for="img">Image</label>
            <input id="image" type="file" name="img">
            <?php
            foreach ($errors as $error) {
                echo  $error;
            }
            ?>
        </div>
        <div class="form-control">
            <label for="folder">Folder</label>
            <input type="text" name="folder">
            <?php echo $folderErr; ?>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    
</body>

</html>