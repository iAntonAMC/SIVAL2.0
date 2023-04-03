<?php

$args = $_GET['args'];
echo $args;

$output = exec("python report.py $args");

echo $output;

?>
