<?php

/* Inserts a new user into DB:
    @param $first_name : str
    @param $last_name : str
    @param $charge : str ('A'|'C'|'P')
    @param $area : str ('salud'|'tics')
    @param $username : str
    @param $passwd : str
*/
function createUser($first_name, $last_name, $charge, $area, $username, $passwd)
{
    try
    {
        require ("connection.php");

        $query = "INSERT INTO users (first_name, last_name, charge, area, username, passwd) VALUES (?, ?, ?, ?, ?, ?);";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$first_name, $last_name, $charge, $area, $username, $passwd]);
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


/* Get all users regitered in DB:
    @return $results : array of arrays
*/
function readAllUsers()
{
    try
    {
        require ("connection.php");
        
        $query = "SELECT * FROM users WHERE status = 1;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute();

        $results = $cursor -> fetchAll();

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


/* Search the user_id in DB for update the lab data::
    @param $uid : int
    @return $results : array
*/
function readUID($uid)
{
    try
    {
        require ("connection.php");

        $query = "SELECT * FROM users WHERE uid = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute();

        $results = $cursor -> fetch();

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


/* Updates the user values
    @param $uid : int
    @param $first_name : str
    @param $last_name : str
    @param $charge : str ('A'|'C'|'P')
    @param $area : str ('salud'|'tics')
    @param $username : str
    @param $passwd : str
*/
function updateUser($uid, $first_name, $last_name, $charge, $area, $username)
{
    try
    {
        require ("connection.php");

        $query = "UPDATE users SET (first_name = ?, last_name = ?, charge = ?, area = ?, username = ?) WHERE uid = ?";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$first_name, $last_name, $charge, $area, $username]);
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


/* Updates the user_status to 0, wich means it's no longer active
    @param $uid : int
*/
function deactivateUser($uid)
{
    try
    {
        require ("connection.php");

        $query = "UPDATE users SET status = 0 WHERE uid = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$uid]);
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
