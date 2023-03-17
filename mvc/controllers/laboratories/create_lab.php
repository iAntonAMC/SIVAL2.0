<?php

try
{
    require ("../../models/laboratory_model.php");

    $lab_name = $_POST["lab_name"];
    $building = $_POST["building"];
    $floor = $_POST["floor"];
    $capacity = $_POST["capacity"];

    insertLab($lab_name, $building, $floor, $capacity);

    header('Location: https://'.$_SERVER['HTTP_HOST'].'/SIVAL/mvc/views/laboratories/labs_list.php');
}
catch(Exception $e)
{
    die("ERROR !   \n" . "Controller 'create_lab' dropped:   \n" . $e->getMessage());
}

?>
