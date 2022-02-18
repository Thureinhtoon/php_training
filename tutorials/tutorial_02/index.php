<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial2</title>
    <style>
      section{
        margin: 0 500px;
      }
    </style>
</head>
<body> 
  <section>
<?php
  
  $length=6;
  for($row = 1; $row < $length; $row++) {
    for($column = 1;$column <= (2*$length)-1; $column++){
      if($column >= $length-($row-1) && $column <= $length+($row-1)){
        echo "*";
      }else {
        echo "&nbsp;&nbsp;";
      }
    }
    echo "<br>";
  }

  for($row = $length; $row >= 1; $row--){
    for($column = 1; $column <= (2*$length)-1; $column++){
      if($column >=$length-($row-1) && $column<=$length+($row-1)){
        echo "*";
      }else {
        echo "&nbsp;&nbsp;";
      }
    }
    echo "<br>";
  }
?>
</section>
</body>
</html>