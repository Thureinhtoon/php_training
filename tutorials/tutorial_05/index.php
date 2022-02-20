<?php
require_once 'vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpWord\Element;
use \PhpOffice\PhpWord\IOFactory;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial05</title>
</head>

<body>

    <h3> Read text file</h3>
    <?php
$hellotxt = "hello.txt";
$hello = fopen($hellotxt, "r");
$contents = fread($hello, filesize($hellotxt));
echo "<pre>$contents</pre>";
fclose($hello);
?>
    <h1>Read CSV FILE</h1>

    <?php
echo '<table border="1">';
if (($csv_file = fopen("hello.csv", "r")) !== false) {
    while (($read_data = fgetcsv($csv_file, 1000, ",")) !== false) {
        $column_count = count($read_data);
        echo '<tr>';
        for ($c = 0; $c < $column_count; $c++) {
            echo "<td>" . $read_data[$c] . "</td>";
        }
        echo '</tr>';
    }
    fclose($csv_file);
}
echo '</table>';
?>

    <h3> Read excel file</h3>

    <?php
//$excelReader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$excelReader = new Xlsx();
$excelFile = $excelReader->load("hello.xlsx");
$excelArr = $excelFile->getActiveSheet()->toArray();
foreach ($excelArr as $excel) {
    echo '<table border="1">';
    foreach ($excel as $output) {
        echo '<th>' . $output . '</th>';
    }
    echo '</table>';
}
?>

    <h3> Read docx file</h3>
    <?php
$docfile = 'hello.docx';
$wordfile = IOFactory::load($docfile);

foreach ($wordfile->getSections() as $section) {

    foreach ($section->getElements() as $element) {

        if ($element instanceof Element\TextRun) {
            foreach ($element->getElements() as $result) {

                if ($result instanceof Element\Text) {
                    //var_dump($result->getText());
                    echo "<p>" . $result->getText() . "</p>";
                }
            }
        }
    }
}

?>
</body>

</html>