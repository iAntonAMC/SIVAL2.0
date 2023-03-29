<?php

/* Get all visitor registers that are 'pendient' for access
    @return $results : array of arrays
*/
function readPendient()
{
    try
    {
        require ("../../models/visitor_model.php");

        $results = readPendients();

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


/* Get all visitor registers that are 'active' for access
    @return $results : array of arrays
*/
function readActive()
{
    try
    {
        require ("../../models/visitor_model.php");

        $results = readActives();

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


/* Get all visitor registers that are 'expired' for access
    @return $results : array of arrays
*/
function readExpired()
{
    try
    {
        require ("../../models/visitor_model.php");

        $results = readExpireds();

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


/* Get all visitors that registered for access, no matter the status
    @return $results : array of arrays
*/
function readVisitors()
{
    try
    {
        require ("../../models/visitor_model.php");

        $results = readAllVisitors();

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


/* Get visitor information, this is used in 'views/visitor_info.php
    @return $results : array of arrays
*/
function readQR($qr_data)
{
    try
    {
        require ("../../models/visitor_model.php");

        $results = readVisitor($qr_data);

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
