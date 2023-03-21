<?php
    try
    {
        $cnxn = new PDO("mysql:host=localhost; port=3306; dbname=sival;", "root", "");
        $cnxn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnxn -> exec("SET CHARACTER SET UTF8");
    }
    catch(Exception $E)
    {
        $cnxn = null;
        die("ERROR setting PDO parameters: " . $E -> getMessage());
    }
?>
