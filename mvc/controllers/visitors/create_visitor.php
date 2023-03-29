<?php

try
{
    require ("../../models/visitor_model.php");

    // The form data came from 'views/visitors/visitor_insert.html'
    $visitor_fname = $_POST["visitor_fname"];
    $last_name = $_POST["last_name"];
    $ocupation = $_POST["ocupation"];
    $visit_area = $_POST["visit_area"];
    $reason = $_POST["reason"];

    // Create a random QR code to assign it to the visitor request:
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456";
    $chars_len = strlen($chars);
    $qr_data = '';
    for ( $i = 0; $i < 7; $i++ )
    {
        $qr_data .= $chars[ rand( 0, $chars_len - 1 ) ];  // Concatenate a random char picked from the chars bank
    }

    // Request to qrserver API qr code image
    $qr_pic = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $qr_data;

    // Calls the model to do the visitor insertion
    createVisitor($visitor_fname, $last_name, $ocupation, $visit_area, $reason, $qr_data, $qr_pic);

    header('Location: /SIVAL/mvc/views/visitors/visitor_info.php?qr_data=' . $qr_data);
}
catch(Exception $e)
{
    die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
}
finally
{
    $cnxn = null;
}

?>
