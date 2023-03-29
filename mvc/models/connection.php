<?php

try
{
    //Create the PDO instance that connects to DB:
    $cnxn = new PDO("mysql:host=localhost; port=3306; dbname=sival;", "root", "");
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
