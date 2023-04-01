<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Insertar nuevo Usuario" />

  <title> USERS | SIVAL</title>

  <?php include "../../../static/include/head.html"; ?></head>
  
<body>
    <header>
        <div class="navbar-fixed ">
            <nav>
                <!-- nav general -->
                <?php include "../../../static/include/general/nav.html"; ?>            
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
                            <h5>NEW USER</h5>
                        </div>
                    </div>
                    Add new user
                    <div class="divider green"></div>
              <div class="row">
                <form action="../../controllers/users/create_user.php" method="POST">
                    <div class="row">

                        <div class="input-field col s6">
                            <input type="text" id="first_name" name="first_name" required>
                            <label for="first_name">Name</label>

                        </div>

                        <div class="input-field col s6">
                            <input type="text" id="last_name" name="last_name" required>
                            <label for="last_name">Last name</label>

                        </div>
  
                        <div class="input-field col s6">
                            <select type="text" id="charge" name="charge"  required>
                                <option value="A" selected>ADMIN</option>
                                <option value="C">COORDINATOR</option>
                                <option value="P">TEACHER</option>
                            </select>
                        </div>

                        <div class="input-field col s6">
                            <select type="text" id="area" name="area"  required>
                                <option value="TICS" selected>Diseño digital</option>
                                <option value="EM">Electro Mecánica</option>
                                <option value="TF">Terapia Física</option>
                            </select>
                        </div>
  
                      <div class="input-field col s6">
                        <input type="text" id="username" name="username" required>
                        <label for="username">username:</label>
                      </div>
  
                      <div class="input-field col s6">
                        <input type="password" id="passwd" name="passwd" required>
                        <label for="passwd">passwd:</label>
                      </div>
  
                    </div>
                    <div class="row">
                      <div class="col s12 center">
                        <a class="btn  waves-effect waves-light red"  href="/SIVAL/mvc/views/users/users_list.php">
                            <i class="material-icons right">delete</i>
                            Cancel
                          </a>
    
        
                          <button class="btn waves-effect waves-light" type="submit" title="Save Lab">ADD NEW USER
                            <i class="material-icons right">system_update_alt</i>
                          </button>
  
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </main>
           
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
