<?php

try
{
    require ("../../models/laboratory_model.php");

    // The form values come from 'views/lab_insert.html'
    $lab_name = $_POST["lab_name"];
    $building = $_POST["building"];
    $floor = $_POST["floor"];
    $capacity = $_POST["capacity"];

    // Calls the model to do the insertion
    createLab($lab_name, $building, $floor, $capacity);

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
