<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Interfaz de lista de qr´s" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>


    <title>UI-Qrs_main</title>

    <?php include "../../../static/include/head.html"; ?>
</head>

<body>

    <header>
        <div class="navbar-fixed ">
            <nav>
                <!-- nav visitors -->
                <?php include "../../../static/include/visitors/nav-visitors.html"; ?>
            </nav>
        </div>

        <!-- menu side movil -->
        <?php include "../../../static/include/general/menu-side-movil.html"; ?>

        <!-- menu side pc -->
        <?php include "../../../static/include/general/menu-side-pc.html"; ?>
    </header>

    <main>
    <div class="container1">
            <div class="row">

                <!-- barra de navegación -->
                <?php include "../../../static/include/general/navigator.html"; ?>

                <div class="col l10">
                    <div class="column">
                        <div class="col s12 l12" style="display: flex;align-items: center;justify-content: center;">
                            <h5>VISITORS EXPIRED</h5>
                        </div>
                    </div>
                    QR Expired
                    <div class="divider green"></div>

                    <table class="striped s12">
                        <thead>
                            <th>Register Number</th>
                            <th colspan='2'>Name:</th>
                            <th>Main Activity: </th>
                            <th>Visit Area: </th>
                            <th>Reasons of the visit:</th>
                            <th>Status</th>
                            <?php
                            require ("../../controllers/visitors/read_visitors.php");
                            $results = readAll();
                            if (isset($results)) {
                                    foreach ($results as $key => $value) {
                                        if ($results[$key]['qr_status'] == "expired") {
                                        echo "<tr>";
                                            echo "<td>".$results[$key]['visitor_fname']."</td>";
                                            echo "<td>".$results[$key]['last_name']."</td>";
                                            echo "<td>".$results[$key]['ocupation']."</td>";
                                            echo "<td>".$results[$key]['visit_area']."</td>";
                                            echo "<td>".$results[$key]['reason']."</td>";
                                            echo "<td> Expired </td>";
                                            echo "<td><a href='/SIVAL/mvc/controllers/visitors/accept_visitor.php?visitor_id=" . $key . "'>Reactivate</a></td>";
                                        echo "</tr>";
                                        }
                                    }
                            }
                            ?>
                    </thead>
                    </table> <br>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var sel = document.querySelectorAll('select');
            var instances = M.FormSelect.init(sel);

            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    	<!-- Compiled and minified JavaScript -->
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js">
	</script>
</body>

</html>
