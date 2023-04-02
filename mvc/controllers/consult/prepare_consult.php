<?php

try
{
    require ("../../models/consult_model.php");

    //Read filters from consult_filter.html form
    $career = ($_POST["career"]);
    $grade = ($_POST["grade"]);
    $area = ($_POST["area"]);
    $date_1 = ($_POST["idate"]);
    $date_2 = ($_POST["edate"]);

    //$Filter will store a value in function of the filter selected
    if ($career == "all" and $grade == "all")
    {
        $query = "SELECT * FROM students WHERE ?;";
        $filter = 1;
        $title = "Alumnos de TODAS las carreras y de TODOS los cuatrimestres que accedieron";
    }

    if ($career == "all" and $grade != "all")
    {
        $query = "SELECT * FROM students WHERE grade = ?;";
        $filter = strval($grade);
        $title = "Alumnos de" . $grade . "Cuatrimestre que accedieron";
    }

    if ($grade == "all" and $career != "all")
    {
        $query  = "SELECT * FROM students WHERE career = ?;";
        $filter = strval($career);
        $title = "Alumnos de la carrera" . $career . "de TODOS los cuatrimestres que accedieron ";
    }

    if ($grade != "all" and $career != "all")
    {
        $query  = "SELECT * FROM students WHERE grade = ? AND career = '$career';";
        $filter = strval($grade);
        $title = "Alumnos de la carrera" . $career . "de" . $grade . "Cuatrimestre que accedieron ";
    }

    // Make the id query to the model
    $results = getIds($query, $filter);

    // Prepare a string with the consulted ids
    $student_ids = "";
    foreach ($results as $row)
    {
        $student_ids .= $row["student_id"];
        $student_ids .= ",";
    }
    $student_ids = substr($student_ids, 0, -1);  //Creates an substring popping out the lastone comma


    // Prepare the full filtered query:
    if ($area == "general")
    {
        $query = "SELECT A1.entry_num, A1.entry_date, A1.entry_time, A2.enrollment, A2.first_name, A2.last_name, A2.class FROM entrances A1, students A2 WHERE A1.student_id = A2.student_id AND A1.student_id IN ($student_ids) AND A1.entry_date BETWEEN '$date_1' AND '$date_2' ORDER BY A1.entry_date;";
        $title .= "al Plantel entre " . $date_1 . " y " . $date_2;
    }
    else
    {
        $query = "SELECT A1.entry_num, A1.entry_date, A1.entry_time, A2.enrollment, A2.first_name, A2.last_name, A2.class, A3.lab_name, A3.building FROM labs_entrances A1, students A2, laboratories A3 WHERE (A1.student_id = A2.student_id) AND (A1.lab_id = A3.lab_id) AND (A1.student_id IN ($student_ids)) AND (A3.building = '$area') AND (A1.entry_date BETWEEN '$date_1' AND '$date_2') ORDER BY A1.entry_date;";
        $title .= "al Laboratorio " . $area . "entre " . $date_1 . " y " . $date_2;
    }

    header("Location: /SIVAL/mvc/views/consult/consult_results.php?q=" . $query . "&t=" . $title);
}
catch(Exception $e)
{
    die ("--- ERROR! --- '" . __FILE__ . "' Dropped an exception: " . $e -> getMessage());
}
finally
{
    $cnxn = null;
}

?>
