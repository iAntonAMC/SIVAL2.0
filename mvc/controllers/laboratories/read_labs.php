<?php

/* Calls the model to get all labs registered in DB and returns the results to 'labs_list.php':
    @return $results : array of arrays
*/
function readLabs()
{
    try
    {
        require ("../../models/laboratory_model.php");

        $results = readLaboratories();

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


/* Looks for the lab_id into DB & returns the results to 'lab_update.php':
    @param $lab_id : int 
    @return $results : array
*/
function readLab($lab_id)
{
    try
    {
        require ("../../models/laboratory_model.php");

        // Consult within the model to get the laboratory data
        $results = readID($lab_id);

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
