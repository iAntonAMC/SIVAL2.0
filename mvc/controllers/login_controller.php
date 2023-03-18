<?php

require ("../models/login_consult.php");

try
{
    $username = htmlspecialchars(addslashes($_POST["username"]));
    $passwd = htmlspecialchars(addslashes($_POST["passwd"]));
    $passwd = md5($passwd);

    $user_data = login($username, $passwd);

    session_start();

    $_SESSION["DATA"] = $user_data;

    setcookie("username", $username, time() + (86400 * 30), "/");

    if ($_POST['remind_user'] == 'on')
    {
        setcookie("token", $token, time() + (86400 * 15), "/");
    }
    else
    {
        setcookie("token", '', time() - 3600, "/");
    }

    header ("Location: /SIVAL/index.php");
}

?>
