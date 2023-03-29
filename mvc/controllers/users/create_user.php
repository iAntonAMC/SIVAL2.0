<?php

try
{
    require ("../../models/user_model.php");

    // Values came from 'user_insert.html' form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $charge = $_POST["charge"];
    $area = $_POST["area"];
    $username = $_POST["username"];
    $passwd = $_POST["passwd"];
    //$passwd = md5($passwd);  // Cifrate the password before insert it in DB

    // Requests the model to do the insertion
    createUser($first_name, $last_name, $charge, $area, $username, $passwd);

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
