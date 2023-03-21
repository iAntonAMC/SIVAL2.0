<?php

require ("../models/login_consult.php");

try
{
    $username = htmlspecialchars(addslashes($_POST["username"]));
    $passwd = htmlspecialchars(addslashes($_POST["passwd"]));
    //$passwd = md5($passwd);

    // Make the consult to the db model
    $request = login($username, $passwd);

    if ($request[0] == true)
    {
        session_start();

        $_SESSION["UID"] = $request[1];

        // Set functionallity cookies
        setcookie("username", $username, time() + (86400 * 30), "/");
        setcookie("charge", $request[2], time() + (86400 * 30), "/");
        setcookie("charge", $request[3], time() + (86400 * 30), "/");
    
        if ($_POST['remind_user'] == 'on')
        {
            setcookie("auth_token", $auth_token, time() + (86400 * 15), "/");
        }
        else
        {
            setcookie("auth_token", '', time() - 3600, "/");
        }
    
        header ("Location: /SIVAL/mvc/views/master.php");
    }
    else
    {
        header ("Location: /SIVAL/mvc/views/login.html");
    }
}
catch(Exception $e)
{
    die ("ERROR !" . "Login Controller dropped an error:" . $e -> getMessage());
}

?>
