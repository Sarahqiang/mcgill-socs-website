<?php

$Office_hour = $_POST['Office_hour'];
$Location = $_POST['location'];
$Responsibility = $_POST['responsibility'];

$data = [$Office_hour,$Location,$Responsibility];
$filename = 'data.csv';
$f = fopen($filename, 'a');

if($f === false)
{
    die('Error opening the file ' . $filename);
}

fputcsv($f,$data);
fclose($f);


// $dataOutput = [];
// $fOutput = fopen($filename, 'r');
// if ($fOutput == false) {
//     die('Cannot open the file ' . $filename);
// }
// while (($row = fgets($fOutput)) !== false)
// {
//     echo $row;
// }


// fclose($fOutput);