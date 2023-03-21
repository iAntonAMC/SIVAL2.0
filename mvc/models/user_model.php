<?php

function readUsers() {
    try
    {
        require "connection.php";

        $query = $cnxn -> prepare("SELECT * FROM users;");
        $query -> execute();

        $users = $query->fetchAll();
    
        return $users;
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "User model.readUsers SAYS:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}


function insertUser($first_name, $last_name, $charge, $area, $username, $passwd) {
    try
    {
        require "connection.php";

        $query = $cnxn -> prepare("INSERT INTO users (first_name, last_name, charge, area, username, passwd) VALUES (?, ?, ?, ?, ?, ?);");
        $query -> execute();
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "User model.createUser SAYS:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}


?>
