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
  
  $n=6;
  for($i=1;$i<$n;$i++) {
    for($j=1;$j<=(2*$n)-1;$j++){
      if($j>=$n-($i-1) && $j<=$n+($i-1)){
        echo "*";
      }else {
        echo "&nbsp;&nbsp;";
      }
    }
    echo "<br>";
  }

  for($i=$n;$i>=1;$i--){
    for($j=1;$j<=(2*$n)-1;$j++){
      if($j>=$n-($i-1) && $j<=$n+($i-1)){
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