<?php

try
{
    require ("../../models/laboratory_model.php");

    $lab_id = $_POST["lab_id"];
    $lab_name = $_POST["lab_name"];
    $building = $_POST["building"];
    $floor = $_POST["floor"];
    $capacity = $_POST["capacity"];

    updateLab($lab_name, $building, $floor, $capacity, $lab_id);

    header('Location: https://'.$_SERVER['HTTP_HOST'].'/SIVAL/mvc/views/laboratories/labs_list.php');
}
catch(Exception $e)
{
    die("ERROR !   \n" . "Controller 'create_lab' dropped:   \n" . $e->getMessage());
}

?>
