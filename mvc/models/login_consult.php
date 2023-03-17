<?php

try
{
    require "connection.php";

    $query = "SELECT * FROM users WHERE username = :username AND passwd = :passwd AND status = 1;";

    $query = $cnxn->prepare($query);

    $username = htmlspecialchars(addslashes($_POST["username"]));
    $passwd = htmlspecialchars(addslashes($_POST["passwd"]));
    #$cifpass=md5($passwd);

    $query -> execute(array(":username"=>$username, ":passwd"=>$passwd));

    $results = $query -> rowCount();
    $user_data = $query -> fetch();

if ($results |= 0)
{
    session_start();
    $_SESSION["DATA"] = $user_data;
    $_SESSION["USER"] = $username;
    header("Location:/SIVAL/index.php");
}
else
{
    header("Location:/SIVAL/mvc/views/login.html");
}
}
catch(Exception $e)
{
    die("--- ERROR ---\nLogin Consult dropped an error:\n" . $e->getMessage());
}

finally{$cnxn = null;}

?>
