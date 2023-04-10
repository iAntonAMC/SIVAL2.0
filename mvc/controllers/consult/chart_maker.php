<?php

$args = $_GET['args'];
$date_1 = $_GET['d1'];
$date_2 = $_GET['d2'];

$args = $args . " '" . $date_1 . "' " . "AND '" . $date_2 . "';";

$output = exec("python report.py $args");

exec("xcopy \"chart_report.xlsx\" \"C:\Users\jesus\Desktop\"");

header('Location: '.$_SERVER['HTTP_REFERER']);

?>
