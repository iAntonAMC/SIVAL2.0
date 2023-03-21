<?php

function readAll()
{
    try
    {
        require ("../../models/visitor_model.php");

        $visitors_log = readVisitors();

        return $visitors_log;
    }
    catch(Exception $e)
    {
        die("ERROR !  \n" . "Controller 'read_labs' dropped:\n  " . $e->getMessage());
    }
}

?>
