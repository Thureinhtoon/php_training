<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial1</title>
    <style>
      table {
        margin: 0 auto;
      }
      td {
        border:1px solid #000;
        height:100px; 
        width:100px; 
      }
    </style>
</head>
<body>
<table>
    <?php
        $length = 8;
        for($row = 1; $row <= $length; $row++){
            echo "<tr>";
            for($col = 1; $col <= $length; $col++){
                if($col %2 == 0){
                    $bgcolor='#000';
                }else{
                    $bgcolor='#fff';
                }
                if($row % 2==0){
                    if($col %2 == 0){
                        $bgcolor='#fff';
                    }else{
                        $bgcolor='#000';
                    }  
                }
                echo "<td style='background-color:$bgcolor;'></td>";
            }
            echo "</tr>";
        }
    ?>
</table> 
</body>
</html>