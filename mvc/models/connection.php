<?php

try
{
    //Create the PDO instance that connects to DB:
    $cnxn = new PDO("mysql:host=sql106.epizy.com; port=3306; dbname=epiz_33888518_sival;", "epiz_33888518", "ow2ZN1u3bNTM");
    $cnxn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnxn -> exec("SET CHARACTER SET UTF8");

    // Declare cursor variable, for future queries
    $cursor = null;
}
catch(Exception $e)
{
    die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception:" . $e -> getMessage());
}

?>
