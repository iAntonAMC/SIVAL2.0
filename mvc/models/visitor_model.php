<?php

function createVisitor($visitor_fname, $last_name, $ocupation, $reason, $qr_data, $qr_pic)
{
    try
    {
        require ("connection.php");

        $query = $cnxn->prepare("INSERT INTO visitors (visitor_fname, last_name, ocupation, reason, qr_data, qr_status, qr_pic) VALUES (?, ?, ?, ?, ?, 'pendient', ?);");
        $query -> execute([$visitor_fname, $last_name, $ocupation, $reason, $qr_data]);
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "Visitor model.registerVisitor SAYS:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}


function readVisitors()
{
    try
    {
        require ("connection.php");

        $query = $cnxn -> prepare("SELECT visitor_id, visitor_fname, last_name, ocupation, reason, qr_data, qr_status, qr_pic FROM visitors;");
        $query -> execute();

        $visitors_log = $query -> fetchAll();

        return $visitors_log;
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "Laboratory model.insertLab SAYS:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}

?>