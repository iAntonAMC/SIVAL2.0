<?php

/* Gets all users registered into DB:
    @return $results : array of arrays
*/
function readUsers()
{
    try
    {
        require ("../../models/user_model.php");

        $results = readAllUsers();

        return $results;
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
