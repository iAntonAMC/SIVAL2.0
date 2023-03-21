<?php

function login($username, $passwd)
{
    try
    {
        require ("connection.php");

        $query = $cnxn -> prepare("SELECT * FROM users WHERE username = :username AND passwd = :passwd AND status = 1;");
        $query -> execute(array(":username" => $username, ":passwd" => $passwd));

        $results = $query -> rowCount();
        if ($results != 0)
        {
            $user_data = $query -> fetch();
        }
        return $user_data;
    }
    catch(Exception $e)
    {
        die ("ERROR !" . "Login Consult dropped an error:" . $e -> getMessage());
    }
    finally
    {
        $cnxn = null;
    }

}

?>