<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="autor" content="@GRJR1325" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Interfaz de Laboratorios Principal" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/SIVAL/static/styles.css" rel="stylesheet" />

    <title>LABS | SIVAL</title>
    
    <?php include "../../../static/include/head.html"; ?></head>
  
</head>
<body>
<header>
        <div class="navbar-fixed ">
            <nav>
                <!-- nav visitors -->
                <?php include "../../../static/include/general/nav.html"; ?>
            </nav>
        </div>

        <!-- menu side movil -->
        <?php include "../../../static/include/general/menu-side-movil.html"; ?>

        <!-- menu side pc -->
        <?php include "../../../static/include/general/menu-side-pc.html"; ?>
    </header>

    <main>
        <?php
            require ("../../controllers/laboratories/read_labs.php");
            $lab_id = $_GET["lab_id"];
            $results = readLab($lab_id);
        ?>

        <div class="container">
            <form action="/SIVAL/mvc/controllers/laboratories/update_lab.php" method="POST">

                <input type="hidden" id="lab_id" name="lab_id" value="<?php echo $results['lab_id'] ?>">
                <label for="lab_name">Name:</label>

                <input type="text" id="lab_name" name="lab_name" value="<?php echo $results['lab_name'] ?>" required>
                <br>

                
                <label for="building">Building:</label>
                <select type="text" id="building" name="building" placeholder="Lab building" required>
                    <option value="A" selected>A</option>
                    <option value="C">C</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                </select>
                <br>
                <label for="floor">Floor:</label>
                <select type="text" id="floor" name="floor" required>
                    <option value="H">High Floor</option>
                    <option value="G">Ground Floor</option>
                </select>
                <br>
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" min="0" max="50" value="<?php echo $results['capacity'] ?>" required>
                <div class="row">
              <div class="col s12 center">


              <a class="btn  waves-effect waves-light red"  href="/SIVAL/mvc/views/laboratories/labs_list.php">
                        <i class="material-icons right">delete</i>
                        Cancel
                      </a>
                <button class="btn waves-effect waves-light" type="submit" value="Update Lab" name="action">UPDATE LAB
                  <i class="material-icons right">system_update_alt</i>
                </button>

              </div>
            </div>
            </form>        
        </div> 

    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
         


    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

        var sel = document.querySelectorAll('select');
        var instances = M.FormSelect.init(sel);

        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    </script>
    <script>
        (function($){
        $(function(){
            // Plugin initialization
            $('select').not('.disabled').formSelect();
        }); 
        })(jQuery); // end of jQuery name space
    </script>
</body>
</html>
