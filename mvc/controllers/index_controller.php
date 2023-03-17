<?php

    session_start();
    if ($_SESSION["DATA"][3] == 'A')
    {
        header('Location: https://'.$_SERVER['HTTP_HOST'].'/SIVAL/mvc/views/index.html');
    }
    elseif ($_SESSION["DATA"][3] == 'C')
    {
        echo "Esta página es para coordinadores, con algunas opciones extra comparado a Profes";
    }
    else 
    {
        echo "Esta página es para profesores, tendrán más que nada lo de pase de lista";
    }

?>
