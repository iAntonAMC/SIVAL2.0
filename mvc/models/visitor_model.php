<?php

function qr_generator()
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $limit = strlen($chars);
    for ( $x = 0; $x < 6; $x++ )
    {
        $qr_data = $chars[ rand( 0, $limit - 1 ) ];
    }

    $qr_pic = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $qr_data;
    header("Location:" . $qr_pic);
}

qr_generator();


?>