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
            <th>Reg ID</th>
            <th colspan = '2'>Name:</th>
            <th>Main Activity:</th>
            <th>Reasons of the visit:</th>
            <?php
                require "../../controllers/visitors/read_visitors.php";
                $visitors = readAll();
                if (isset($visitors)){
                    foreach ($visitors as $visitor){
                        echo "<tr>";
                            echo "<td>".$visitor['visitor_id']."</td>";
                            echo "<td>".$visitor['visitor_fname']."</td>";
                            echo "<td>".$visitor['last_name']."</td>";
                            echo "<td>".$visitor['ocupation']."</td>";
                            echo "<td>".$visitor['reason']."</td>";
                            echo "<td>".$visitor['qr_data']."</td>";
                            echo "<td>".$visitor['qr_data']."</td>";
                        echo "</tr>";
                    }
                }
                else {echo "<tr><td>No registros encontrados</td><tr>";}
            ?>
        </thead>
    </table>
</body>
</html>
