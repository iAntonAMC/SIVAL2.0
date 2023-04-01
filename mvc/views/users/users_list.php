<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="autor" content="@GRJR1325" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Interfaz de Laboratorios Principal" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/SIVAL/static/styles.css" rel="stylesheet" />

    <title>UI-Usuarios</title>

    <?php include "../../../static/include/head.html"; ?></head>


  </head>

<body>


    <header>
        <div class="navbar-fixed ">
            <nav>
                <!-- nav laboratorie -->
                <?php include "../../../static/include/users/nav-users.html"; ?>            
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
                            <h5>USERS</h5>
                        </div>
                    </div>
                    Users List
                    <div class="divider green"></div>              
            <table class="striped s12">
                <thead>
                    <tr>
                        <th colspan="2"> Name </th>
                        <th>Rol</th>
                        <th>Area</th>
                        <th>Username</th>
                        <th colspan="2">Options</th>                    
                  </tr>
                </thead>
                <?php
                require ("../../controllers/users/read_users.php");
                $results = readUsers();
                if (isset($results)){
                    foreach ($results as $row){
                        echo "<tr>";
                            echo "<td>".$row['first_name']."</td>";
                            echo "<td>".$row['last_name']."</td>";
                            if ($row['charge'] == 'A')
                            {
                                echo "<td> Admin </td>";
                            }
                            elseif ($row['charge'] == 'C')
                            {
                                echo "<td> Coordinator </td>";
                            }
                            elseif ($row['charge'] == 'P')
                            {
                                echo "<td> Professor </td>";
                            }
                            echo "<td>".$row['area']."</td>";
                            echo "<td>".$row['username']."</td>";
                            echo "<td><a href='/SIVAL/mvc/controllers/users/deactivate_user.php?uid=" . $row['uid'] . "'>Deactivate</a></td>";
                        echo "</tr>";
                    }
                }
                else {echo "<tr><td>No user were found in db</td><tr>";}
            ?>
        </thead>
    </table>
    <br>

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
