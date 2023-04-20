<?php

try
{
    require ("../../models/visitor_model.php");

    // Gets the id value that came from 'views/visitors/visitors_list.php'
    $visitor_id = $_GET['visitor_id'];

    // Calls the model to make the qr_status update to 'active'
    expireVisitor($visitor_id);

    header("Location: /SIVAL/mvc/views/visitors/visitors_list.php");
}
catch(Exception $e)
{
    die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
}

?>
