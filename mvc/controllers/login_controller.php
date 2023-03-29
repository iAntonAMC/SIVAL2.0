<?php

try
{
    require ("../models/login_model.php");

    // Get the values inserted in login.html form
    $username = $_POST["username"];
    $passwd = $_POST["passwd"];
    $remind = strval($_POST['remind_user']);
    //$passwd = md5($passwd);

    // Make the consult that match user credentials into the DB model
    $results = loginRequest($username, $passwd);

    if ($results[0] == true)
    {
        session_start();

        $_SESSION["uid"] = $results[1];

        // Set functionallity cookies
        setcookie("username", $username, time() + (86400 * 30), "/");
        setcookie("fname", $results[2], time() + (86400 * 30), "/");
        setcookie("lname", $results[3], time() + (86400 * 30), "/");
        setcookie("charge", $results[4], time() + (86400 * 30), "/");
        setcookie("passwd", $results[5], time() + (86400 * 30), "/");

        if ($remind == 'on')
        {
            setcookie("auth_token", "true", time() + (86400 * 15), "/");
        }
        else
        {
            setcookie("auth_token", "false", time() + (86400 * 15), "/");
        }

        header("Location: /SIVAL/mvc/views/master.php");
    }
    else
    {
        header("Location: /SIVAL/mvc/views/login.html");
    }
}
catch(Exception $e)
{
    die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
}


?>
