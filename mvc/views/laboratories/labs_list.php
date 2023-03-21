<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABS | SIVAL</title>
</head>
<body>
    <table>
        <thead>
            <th>Lab Name</th>
            <th>Building</th>
            <th>Floor</th>
            <th>Capacity</th>
            <th colspan="2">Opciones</th>
            <?php
                require "../../controllers/laboratories/read_labs.php";
                $laboratories = readAll();
                if (isset($laboratories)){
                    foreach ($laboratories as $lab){
                        echo "<tr>";
                            echo "<td>".$lab['lab_name']."</td>";
                            echo "<td>".$lab['building']."</td>";
                            if ($lab['floor'] == 'H')
                            {
                                echo "<td> Upper Floor </td>";
                            }
                            else
                            {
                                echo "<td> First Floor </td>";
                            }
                            echo "<td>".$lab['capacity']."</td>";
                            echo "<td><a href='/SIVAL/mvc/views/laboratories/lab_update.php?lab_id=" . $lab['lab_id'] . "'>Editar</a></td>";
                            echo "<td><a href='/SIVAL/mvc/controllers/laboratories/delete_lab.php?lab_id=" . $lab['lab_id'] . "'>Borrar</a></td>";
                        echo "</tr>";
                    }
                }
                else {echo "<tr><td>No laboratories were found in db</td><tr>";}
            ?>
        </thead>
    </table>
    <br>
    <a href="/SIVAL/mvc/views/laboratories/lab_insert.html">New Lab</a>
</body>
</html>
