<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Resultado del envio del formulario" />
    <link href="/SIVAL/static/styles.css" rel="stylesheet" />
    <title> SIVAL | QR RESULT</title>

    <?php include "../../../static/include/head.html"; ?>
<body>
<header>
    <div class="navbar-fixed center">
        <nav>
          <div class="nav-wrapper white s3">

    <img class="responsive-img hide-on-small-only" style="height: 70px"
        src="/SIVAL/static/images/logo2.png" />
    <a href="/SIVAL/mvc/views/master.php" class="brand-logo grey-text s4 l6">SIVAL
    </a>
          </div>
        </nav>
    </div>
</header>
<main>
    <div class="container center">
        <h2 class="green-text">¡REQUEST SENT!</h2>
    </div>
    <table class="container">
        <thead>
            <th colspan = '2'>Name:</th>
            <th>Area: </th>
            <th> QR </th>
            <?php
            require ("../../controllers/visitors/read_visitors.php");
            $qr_data = $_GET['qr_data'];
            // Gets the visitor data within the controller
            $results = readAll($qr_data);
            if (isset($results)) {
                $printed = false;
                foreach ($results as $key => $value) {
                    if ($results[$key]['qr_data'] == $qr_data) {
                    echo "<tr>";
                        echo "<td>".$results[$key]['visitor_fname']."</td>";
                        echo "<td>".$results[$key]['last_name']."</td>";
                        echo "<td>".$results[$key]['visit_area']."</td>";
                        echo "<td><img src='".$results[$key]['qr_pic']."'></td>";
                    echo "</tr>";
                    $printed = true;
                    }
                }
                if ($printed != true) {
                    echo "<tr><td colspan=6>There´s no qr_data matched in DB</td><tr>";
                    $printed = true;
                }
            }
            ?>         
            </thead>
    </table>
    <div class="container center">
        <h5 class="red-text">NOTICE: Your QR code is unique and it's used to identify you inside the installations. So we do recommend that you keep it safe and on hand</h5>

    </div>
</main>

</body>
</html>
