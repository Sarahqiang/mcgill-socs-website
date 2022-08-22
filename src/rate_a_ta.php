<?php

$Course = $_POST['course'];
$Term = $_POST['term'];
$Select_a_ta = $_POST['select'];
$Rating =  $_POST['rating'];
$Comment = $_POST['comment'];

$data = [$Course,$Term,$Select_a_ta,$Rating,$Comment];
$filename = 'rate_ta.csv';
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