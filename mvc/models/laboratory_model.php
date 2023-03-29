<?php

/* Inserts a new lab into DB:
    @param $lab_name : str
    @param $building : str
    @param $floor : str ('H'|'G')
    @param $capacity : int
*/
function createLab($lab_name, $building, $floor, $capacity)
{
    try
    {
        require ("connection.php");

        $query = "INSERT INTO laboratories (lab_name, building, floor, capacity) VALUES (?, ?, ?, ?);";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$lab_name, $building, $floor, $capacity]);
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


/* Query all the labs registered into DB:
    @return $results : array of arrays
*/
function readLaboratories()
{
    try
    {
        require ("connection.php");

        $query = "SELECT * FROM laboratories;";
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


/* Verifies if the lab_id is existing in DB & returns data to 'read_labs.php':
    @param $lab_id : int
    @return $results : array
*/
function readID($lab_id)
{
    try
    {
        require ("connection.php");

        $query = "SELECT * FROM laboratories WHERE lab_id = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$lab_id]);

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


/* Updates lab data that match de lab_id:
    @param $lab_name : str
    @param $building : str
    @param $floor : str ('H'|'G')
    @param $capacity : int
    @param $lab_id : int
*/
function updateLab($lab_name, $building, $floor, $capacity, $lab_id)
{
    try
    {
        require ("connection.php");

        $query = "UPDATE laboratories SET lab_name = ?, building = ?, floor = ?, capacity = ? WHERE lab_id = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$lab_name, $building, $floor, $capacity, $lab_id]);
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


/* Deletes a lab register in DB that match the id:
    @param $lab_id : int
*/
function deleteLab($lab_id)
{
    try
    {
        require ("connection.php");

        $query = "DELETE FROM laboratories WHERE lab_id = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$lab_id]);
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
