<?php

$Select_TA = $_POST['select'];
$Comment = $_POST['comment'];

$data = [$Select_TA,$Comment];
$filename = 'ta_performance_log.csv';
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