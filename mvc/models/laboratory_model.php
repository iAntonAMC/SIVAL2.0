<?php

function insertLab($lab_name, $building, $floor, $capacity) {
    try
    {
        require ("connection.php");

        $query = $cnxn->prepare("INSERT INTO laboratories (lab_name, building, floor, capacity) VALUES (?, ?, ?, ?);");

        $query->execute([$lab_name, $building, $floor, $capacity]);
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


function readLabs() {
    try
    {
        require "connection.php";

        $query = $cnxn->prepare("SELECT * FROM laboratories;");

        $query->execute();

        $labs_cantity = $query->rowCount();
        $laboratories = $query->fetchAll();
    
        return $laboratories;
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "Laboratory model.readLabs SAYS:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}


function searchID($lab_id) {
    try
    {
        require "connection.php";

        $query = $cnxn -> prepare("SELECT * FROM laboratories WHERE lab_id = ?;");

        $query -> execute([$lab_id]);

        $lab = $query -> fetch();
    
        return $lab;
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "Laboratory model.readLabs SAYS:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}


function updateLab($lab_name, $building, $floor, $capacity, $lab_id) {
    try
    {
        require ("connection.php");

        $query = $cnxn->prepare("UPDATE laboratories SET lab_name = ?, building = ?, floor = ?, capacity = ? WHERE lab_id = ?;");

        $query -> execute([$lab_name, $building, $floor, $capacity, $lab_id]);
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


function deleteLab($lab_id) {
    try
    {
        require ("connection.php");

        $query = $cnxn->prepare("DELETE FROM laboratories WHERE lab_id = ?;");

        $query->execute([$lab_id]);

    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "'laboratory_model.deleteLab' dropped:\n" . $e->getMessage());
    }
    finally
    {
        $cnxn = null;
    }
}














function countAll() {
    try
    {
        require "connection.php";

        $query = "SELECT * FROM laboratories;";

        $setup_query = $cnxn->prepare($query);

        $setup_query->execute();

        $labs_cantity = $setup_query->rowCount();
    
        return $labs_cantity;
    }
    catch(Exception $e)
    {
        die("--- ERROR ---\n" . "Laboratory model.countAll SAYS:\n" . $e->getMessage());
    }
    finally{$cnxn = null;}
}
?>
