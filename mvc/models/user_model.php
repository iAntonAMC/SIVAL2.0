<?php

function readUsers() {
    try
    {
        require "connection.php";

        $query = $cnxn->prepare("SELECT * FROM users;");
        $query->execute();

        $users = $query->fetchAll();
    
        return $users;
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "Laboratory model.readLabs SAYS:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}

?>