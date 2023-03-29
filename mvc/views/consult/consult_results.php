<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULTS | SIVAL</title>
</head>
<body>
    <table>
        <thead>
            <th> Entry No. </th>
            <th> Enrollment </th>
            <th colspan=2> Student Name: </th>
            <th> Group </th>
            <th colspan=2> Area: </th>
            <th> Entry date: </th>
            <th> Entry time: </th>
            <?php
            require ("../../controllers/consult/execute_consult.php");
            $query = $_GET['q'];  //This value comes from 'prepare_consult.php', in function of the filters selected
            $results = executeQuery($query);
            if (isset($results))
            {
                foreach ($results as $row)
                {
                    echo "<tr>";
                        echo "<td>".$row['entry_num']."</td>";
                        echo "<td>".$row['enrollment']."</td>";
                        echo "<td>".$row['first_name']."</td>";
                        echo "<td>".$row['last_name']."</td>";
                        echo "<td>".$row['class']."</td>";
                        if (isset($row['lab_name']))
                        {
                            echo "<td>".$row['lab_name']."</td>";
                            echo "<td>".$row['building']."</td>";
                        }
                        else {echo "<td colspan=2> General </td>";}
                        echo "<td>".$row['entry_date']."</td>";
                        echo "<td>".$row['entry_time']."</td>";
                    echo "</tr>";
                }
            };
            ?>
            <a href="/SIVAL/mvc/views/consult/consult_filter.html">Volver</a>
        </thead>
    </table>
</body>
</html>
