<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Principal" />

    <title> SIVAL | LABS </title>

    <?php include "../../../static/include/head.html"; ?></head>
    
</head>

<body>
    <header>
        <div class="navbar-fixed ">
            <nav>
                <!-- nav laboratorie -->
                <?php include "../../../static/include/laboratories/nav-laboratories.html"; ?>            
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
                            <h5>LABORATORIES</h5>
                        </div>
                    </div>
                    Add new Laboratory
                    <div class="divider green"></div>
                    <table class="striped s12">
                        <thead>
                            <tr>
                                <th>Laboratory Name</th>
                                <th>Building</th>
                                <th>Floor</th>
                                <th>Capacity</th>
                                <th colspan="2">Options</th>
                            </tr>
                        </thead>
                        <?php
                require "../../controllers/laboratories/read_labs.php";
                $results = readLabs();
                if (isset($results)){
                    foreach ($results as $row){
                        echo "<tr>";
                            echo "<td>".$row['lab_name']."</td>";
                            echo "<td>".$row['building']."</td>";
                            if ($row['floor'] == 'H')
                            {
                                echo "<td> Upper Floor </td>";
                            }
                            else
                            {
                                echo "<td> First Floor </td>";
                            }
                            echo "<td>".$row['capacity']."</td>";

                            echo "<td  class=waves-effect waves-light btn><i class=material-icons center><a href='/SIVAL/mvc/views/laboratories/lab_update.php?lab_id= " . $row['lab_id'] . "'>edit</a ></td>";
                            echo "<td class=waves-effect waves-light btn><i class=material-icons center><a  href='/SIVAL/mvc/controllers/laboratories/delete_lab.php?lab_id=" . $row['lab_id'] . "'>delete_forever</a></td>";
                        echo "</tr>";
                    }
                }
                else {echo "<tr><td>No laboratories were found in db</td><tr>";}
            ?>
                        </thead>
                    </table>
                    <br>
    </main>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

        var sel = document.querySelectorAll('select');
        var instances = M.FormSelect.init(sel);

        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    </script>
</body>

</html>