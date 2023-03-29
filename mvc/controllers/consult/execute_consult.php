<?php

/* Get the results of the filtered query, that was prepared at 'prepare_consult.php':
    @param $query : str
    @return $results : array of arrays
*/
function executeQuery($query)
{
    try
    {
        require ("../../models/consult_model.php");

        // Makes the filtered query within the model
        $results = getResults($query);

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
