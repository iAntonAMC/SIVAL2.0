<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISITORS | SIVAL</title>
</head>
<body>
    <table>
        <thead>
            <th>Register Number</th>
            <th colspan = '2'>Name:</th>
            <th>Main Activity: </th>
            <th>Visit Area: </th>
            <th>Reasons of the visit:</th>
            <th>Status</th>
            <?php
                require "../../controllers/visitors/read_visitors.php";
                $visitors = readPendient();
                if (isset($visitors)){
                    if ($visitors != []){
                        foreach ($visitors as $visitor){
                            echo "<tr>";
                                echo "<td>".$visitor['visitor_id']."</td>";
                                echo "<td>".$visitor['visitor_fname']."</td>";
                                echo "<td>".$visitor['last_name']."</td>";
                                echo "<td>".$visitor['ocupation']."</td>";
                                echo "<td>".$visitor['visit_area']."</td>";
                                echo "<td>".$visitor['reason']."</td>";
                                echo "<td> Pendient </td>";
                                echo "<td><a href='/SIVAL/mvc/controllers/visitors/accept_visitor.php?visitor_id=" . $visitor['visitor_id'] . "'>Accept</a></td>";

                            echo "</tr>";
                        }
                    }
                    else {echo "<tr><td colspan=6>No hay registros de Visitantes pendientes</td><tr>";}
                }
            ?>
        </thead>
    </table>
    <a href="">View Older Registers</a>
</body>
</html>
