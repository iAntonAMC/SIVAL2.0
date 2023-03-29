<?php

try
{
    require ("../../models/user_model.php");

    $uid = $_GET['uid'];  // Gets the UID value from 'users_list.php'

    // Calls the model to make the update
    deactivateUser($uid);

    header("Location: /SIVAL/mvc/views/users/users_list.php");
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
