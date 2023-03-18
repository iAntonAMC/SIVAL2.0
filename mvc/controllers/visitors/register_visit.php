<?php

try
{
    require ("../../models/visitor_model.php");

    $visitor_fname = $_POST["visitor_fname"];
    $last_name = $_POST["last_name"];
    $ocupation = $_POST["ocupation"];
    $reason = $_POST["reason"];

    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234";
    $limit = strlen($chars);
    $qr_data = '';

    for ( $x = 0; $x < 6; $x++ )
    {
        $qr_data .= $chars[ rand( 0, $limit - 1 ) ];
    }

    $qr_pic = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $qr_data;

    createVisitor($visitor_fname, $last_name, $ocupation, $reason, $qr_data, $qr_pic);

    header('Location: https://'.$_SERVER['HTTP_HOST'].'/SIVAL/mvc/views/visitors/visitors_list.php');
}
catch(Exception $e)
{
    die("ERROR !   \n" . "Controller 'create_lab' dropped:   \n" . $e->getMessage());
}

?>
