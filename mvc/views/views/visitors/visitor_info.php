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
            <th>Registry number</th>
            <th colspan = '2'>Name:</th>
            <th>Area: </th>
            <th> QR </th>
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
            </thead>
    </table>
    <div class="container center">
        <h5 class="red-text">NOTICE: Your QR code is unique, we recommend that you save it!</h5>
        <a class=" s6 btn-large  waves-effect waves-light blue" href="/SIVAL/mvc/views/index.html">
                  <i class="material-icons right">arrow_back
</i>Back to top
                </a>
    </div>
</main>

</body>
</html>