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
            <th> Number: </th>
            <th colspan = '2'> Name: </th>
            <th> Ocupation </th>
            <th> Area: </th>
            <th> QR: </th>
        </thead>
        <tbody>
            <?php
            require ("../../controllers/visitors/read_visitors.php");
            $qr_data = $_GET['qr_data'];
            // Gets the visitor data within the controller
            $results = readQR($qr_data);
            if (isset($results['visitor_id'])){
                echo "<tr>";
                    echo "<td>".$results['visitor_id']."</td>";
                    echo "<td>".$results['visitor_fname']."</td>";
                    echo "<td>".$results['last_name']."</td>";
                    echo "<td>".$results['ocupation']."</td>";
                    echo "<td>".$results['visit_area']."</td>";
                    echo "<td><img src='".$results['qr_pic']."'></td>";
                echo "</tr>";
            }
            else {  echo "<tr><td colspan=6>There´s no qr_data matched in DB</td><tr>"; }
            ?>
        </tbody>
    </table>
</body>

</html>
