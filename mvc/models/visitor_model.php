<?php

/* Create the visitor register:
    @param $visitor_fname : str
    @param $last_name : str
    @param $ocupation : str
    @param $visit_area : str
    @param $reason : str
    @param $qr_data : str
    @param $qr_pic : str
*/
function createVisitor($visitor_fname, $last_name, $ocupation, $visit_area, $reason, $qr_data, $qr_pic)
{
    try
    {
        require ("connection.php");

        $query = "INSERT INTO visitors (visitor_fname, last_name, ocupation, visit_area, reason, qr_data, qr_pic) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$visitor_fname, $last_name, $ocupation, $visit_area, $reason, $qr_data, $qr_pic]);
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


/* Get all pendant visits:
    @return $results : array of arrays
*/
function readPendients()
{
    try
    {
        require ("connection.php");

        $query = "SELECT visitor_id, visitor_fname, last_name, ocupation, visit_area, reason FROM visitors WHERE qr_status = 'pendient';";
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


/* Get all active visits:
    @return $results : array of arrays
*/
function readActives()
{
    try
    {
        require ("connection.php");

        $query = "SELECT visitor_id, visitor_fname, last_name, ocupation, visit_area, reason FROM visitors WHERE qr_status = 'active';";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute();

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


/* Get all expired visits:
    @return $results : array 
*/
function readExpireds()
{
    try
    {
        require ("connection.php");

        $query = "SELECT * FROM visitors WHERE qr_status = 'expired';";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute();

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


/* Get visitor data using  the qr_data to match
    @param $qr_data : str
    @return $results : array
*/
function readVisitor($qr_data)
{
    try
    {
        require ("connection.php");

        $query = "SELECT * FROM visitors WHERE qr_data = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$qr_data]);

        $results = $cursor -> fetch();

        return $results;// The results are used in 'views/visitor/visitor_info.php
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


/* Update visitor qr_status to make it 'active':
    @param $visitor_id : int
*/
function acceptVisitor($visitor_id) 
{
    try
    {
        require ("connection.php");

        $query = "UPDATE visitors SET qr_status = 'active' WHERE visitor_id = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$visitor_id]);
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


/* Update visitor qr_status to make it 'expired':
    @param $visitor_id : int
*/
function unacceptVisitor($visitor_id)
{
    try
    {
        require ("connection.php");

        $query = "UPDATE visitors SET qr_status = 'expired' WHERE visitor_id = ?;";
        $cursor = $cnxn -> prepare($query);
        $cursor -> execute([$visitor_id]);
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
