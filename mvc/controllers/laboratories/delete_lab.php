<?php

try
{
    require ("../../models/laboratory_model.php");

    // Get the id from the 'labs_list.php' path param
    $lab_id = $_GET['lab_id'];

    // Calls the  model to do the deletion
    deleteLab($lab_id);

    header("Location: /SIVAL/mvc/views/laboratories/labs_list.php");
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
