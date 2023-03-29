<?php

try
{
    require ("../../models/laboratory_model.php");

    // The form data came from 'views/laboratories/lab_update.php'
    $lab_id = $_POST["lab_id"];
    $lab_name = $_POST["lab_name"];
    $building = $_POST["building"];
    $floor = $_POST["floor"];
    $capacity = $_POST["capacity"];
    
    // Requests to the model to make the laboratory update
    updateLab($lab_name, $building, $floor, $capacity, $lab_id);

    header('Location: /SIVAL/mvc/views/laboratories/labs_list.php');
}
catch(Exception $e)
{
    die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
}
finally
{
    $cnxn = null;
}

?>
