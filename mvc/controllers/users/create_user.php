<?php

try
{
    require ("../../models/user_model.php");

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $charge = $_POST["charge"];
    $area = $_POST["area"];
    $username = $_POST["username"];
    $passwd = $_POST["passwd"];

    insertUser($first_name, $last_name, $charge, $area, $username, $passwd);

    header('Location: https://' . $_SERVER['HTTP_HOST'] . '/SIVAL/mvc/views/laboratories/labs_list.php');
}
catch(Exception $e)
{
    die("ERROR !   \n" . "Controller 'create_lab' dropped:   \n" . $e->getMessage());
}

?>
