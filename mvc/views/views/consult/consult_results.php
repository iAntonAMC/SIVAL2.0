<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Pagina de Consultas" />

  <title> SIVAL | CONSULTAS</title>

  <?php include "../../../static/include/head.html"; ?>

</head>

  <body>
  <header>
        <div class="navbar-fixed ">
            <nav>
                <!-- nav general  -->
                <?php include "../../../static/include/general/nav.html"; ?>
            </nav>
        </div>

        <!-- menu side movil -->
        <?php include "../../../static/include/general/menu-side-movil.html"; ?>

        <!-- menu side pc -->
        <?php include "../../../static/include/general/menu-side-pc.html"; ?>
    </header>

<body>
<div class="container1">
            <div class="row">

                <!-- barra de navegación -->
                <?php include "../../../static/include/general/navigator.html"; ?>

                <div class="col l10">
                    <div class="column">
                        <div class="col s12 l12" style="display: flex;align-items: center;justify-content: center;">
                            <h5>QUERY RESULTS</h5>
                        </div>
                    </div>
                    Results Found
                    <div class="divider green"></div>
    <table class="striped s12">
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
        </thead>
    </table>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
      var sel = document.querySelectorAll('select');
      var instances = M.FormSelect.init(sel); 

      var sel = document.querySelectorAll('select');
      var instances = M.FormSelect.init(sel);
  
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);

      $(function(){
            $('#date').datepicker();
        });
      });
    </script>
</body>
</html>