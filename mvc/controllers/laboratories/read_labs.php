<?php

function readAll() {
    try
    {
        require ("../../models/laboratory_model.php");

        $laboratories = readLabs();

        return $laboratories;
    }
    catch(Exception $e)
    {
        die("ERROR !  \n" . "Controller 'read_labs' dropped:\n  " . $e->getMessage());
    }
}

?>
