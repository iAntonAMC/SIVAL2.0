<?php

/* Executes a query into DB to search matching credentials:
    @param $username : str
    @param $passwd : str
    @return $results : array
*/
function loginRequest($username, $passwd)
{
    try
    {
        require ("connection.php");

        $query = "SELECT * FROM users WHERE username = ? AND passwd = ? AND status = 1;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$username, $passwd]);
        $verified = false;

        $results = $cursor -> rowCount();

        if ($results != 0)
        {
            $user_data = $cursor -> fetch();
            $verified = true;
            $user_id = $user_data[0];
            $user_fname = $user_data[1];
            $user_lname = $user_data[2];
            $user_rol = $user_data[3];
            $user_passwd = $user_data[6];
        }

        return array($verified, $user_id, $user_fname, $user_lname, $user_rol, $user_passwd);
    }
    catch(Exception $e)
    {
        die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}

?>
