<?php

/* Get all visitor registers that are 'pendient' for access
    @return $results : array of arrays
*/
function readAll()
{
    try
    {
        require ("../../models/visitor_model.php");

        $results = readVisitors();

        return $results;
    }
    catch(Exception $e)
    {
        die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
    }
}


function readLogged()
{
    try
    {
        require ("../../models/visitor_model.php");

        $results = readLogs();

        return $results;
    }
    catch(Exception $e)
    {
        die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
    }
}

?>
