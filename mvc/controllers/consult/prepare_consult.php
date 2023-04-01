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
    }

    if ($career == "all" and $grade != "all")
    {
        $query = "SELECT * FROM students WHERE grade = ?;";
        $filter = strval($grade);
    }

    if ($grade == "all" and $career != "all")
    {
        $query  = "SELECT * FROM students WHERE career = ?;";
        $filter = strval($career);
    }

    if ($grade != "all" and $career != "all")
    {
        $query  = "SELECT * FROM students WHERE grade = ? AND career = '$career';";
        $filter = strval($grade);
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
        $query = "SELECT A1.entry_num, A1.entry_date, A1.entry_time, A2.enrollment, A2.first_name, A2.last_name, A2.class FROM entrances A1, students A2 WHERE A1.student_id = A2.student_id AND A1.student_id IN ($student_ids) AND A1.entry_date BETWEEN '$date_1' AND '$date_2';";
    }
    else
    {
        $query = "SELECT A1.entry_num, A1.entry_date, A1.entry_time, A2.enrollment, A2.first_name, A2.last_name, A2.class, A3.lab_name, A3.building FROM labs_entrances A1, students A2, laboratories A3 WHERE (A1.student_id = A2.student_id) AND (A1.lab_id = A3.lab_id) AND (A1.student_id IN ($student_ids)) AND (A3.building = '$area') AND (A1.entry_date BETWEEN '$date_1' AND '$date_2');";
    }

    header("Location: /SIVAL/mvc/views/consult/consult_results.php?q=" . $query);
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
