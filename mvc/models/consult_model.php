<?php

/* Consults the IDs in students table that match the filter:
    @param $query : str
    @param $filter : str
    @return $ids : array
*/
function getIds($query, $filter)
{
    try
    {
        require ("connection.php");

        $cursor = $cnxn -> prepare(strval($query));
        $cursor -> execute([$filter]);
        $ids = $cursor -> fetchAll();

        return $ids;
    }
    catch(Exception $e)
    {
        die ("--- ERROR! ---\n" . __FILE__ . " Dropped an exception:\n" . $e -> getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}


/* Executes the filtered query to the DB:
    @param $query : str
    @return $results : array
*/
function getResults($query)
{
    try
    {
        require ("connection.php");

        $cursor = $cnxn -> prepare(strval($query));
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

?>
