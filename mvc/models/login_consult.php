<?php

function login($username, $passwd)
{
    try
    {
        require ("connection.php");

        $query = $cnxn -> prepare("SELECT * FROM users WHERE username = :username AND passwd = :passwd AND status = 1;");
        $query -> execute(array(":username" => $username, ":passwd" => $passwd));
        $verified = false;

        $results = $query -> rowCount();

        if ($results != 0)
        {
            $user_data = $query -> fetch();
            $verified = true;
            $user_id = $user_data[0];
            $user_name = $user_data[1];
            $user_rol = $user_data[3];
        }

        return array($verified, $user_id, $user_name, $user_rol);
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
