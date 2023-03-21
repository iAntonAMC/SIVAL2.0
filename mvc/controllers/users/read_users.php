<?php

function readAll() {
    try
    {
        require ("../../models/user_model.php");

        $users = readUsers();

        return $users;
    }
    catch(Exception $e)
    {
        die("ERROR !  \n" . "Controller 'read_labs' dropped:\n  " . $e->getMessage());
    }
}

?>
