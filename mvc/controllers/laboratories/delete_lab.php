<?php

try
{
    require ("../../models/laboratory_model.php");

    $lab_id = $_GET['lab_id'];

    deleteLab($lab_id);

    echo('<script type="text/javascript">alert("Lab eliminado");window.location.href="index.php";</script>');

    header("Location: /SIVAL/mvc/views/laboratories/labs_list.php");
}
catch(Exception $e)
{
    die("ERROR !   \n" . "Controller 'delete_lab' dropped:   \n  " . $e->getMessage());
}

?>