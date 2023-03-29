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

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="/SIVAL/static/stylesheets/materialize.min.css" />

    
    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="/SIVAL/static/js/materialize.min.js"></script>
  </head>

<body>


<header>
      <div class="navbar-fixed ">
          <nav>
              <div class="nav-wrapper white s12 l12 ">
                  <a href="">
                      <i class="sidenav-trigger cyan-text text-darken-4 hide-on-large-only" data-target="menu-side">
                          <i class="large material-icons cyan-text text-darken-4">dehaze</i></i>
                      </i>
                  </a>
                  <img class="responsive-img hide-on-small-only" style="height: 70px"
                      src="/SIVAL/static/images/logo2.png" />
                  <a href="/SIVAL/mvc/views/index.html" class="brand-logo grey-text s4 l6">SIVAL
                  </a>
                  <a href="">
                      <i class="sidenav-trigger cyan-text text-darken-4 show-on-large right" data-target="menu-side2">
                          <i
                              class="large material-icons cyan-text text-darken-4 hide-on-small-only">account_circlet</i></i>
                      </i>
                  </a>
                  <a href="/SIVAL/mvc/views/users/user_insert.html">
                  <i class="large material-icons cyan-text text-darken-4 right"
                    >add</i
                    >
                  </a>

              </div>
          </nav>
      </div>
      <ul class="sidenav" id="menu-side">
          <li>
              <div class="user-view">
                  <div class="background">
                      <img src="/SIVAL/static/images/fondo.jpg" alt="">
                  </div>
                  <a href="#">
                      <img src="/SIVAL/static/images/perfil" alt="" class="circle">
                      <a href="#name"><span class="white-text name ">
                              <h3>Rolax</h3>
                          </span></a>
                      <a href="#email"><span class="white-text email">1721110895@utectulancingo.edu.mx</span></a>
                      <a href="#!" class="waves-effect waves-light red btn-small"></i>Manage your account</a>
                      <br>
                      <br>
                  </a>
          <li>
              <div class="divider"></div>
          </li>

          <li>
              <a href="/SIVAL/mvc/views/master.php" class="collection-item"> <i
                      class="material-icons">home</i></span>Home</a>
          </li>
          <li>
              <div class="divider"></div>
          </li>
          <li><a class="subheader">System Administration</a></li>
          <li>
              <a href="/SIVAL/mvc/views/alumnos/alumnos.html" class="collection-item">
                  <i class="material-icons">people</i>
                  Students
              </a>
          </li>

          <li>
              <a href="/SIVAL/mvc/views/laboratories/labs_list.php" class="collection-item"> <i
                      class="material-icons">business</i></span>laboratories</a>
          </li>
          <li>
              <a href="/SIVAL/mvc/views/users/users_list.php" class="collection-item"> <i
                      class="material-icons">person_add</i></span>Users</a>
          </li>
          <li>
              <div class="divider"></div>
          </li>
          <li><a class="subheader">Logs Administration</a></li>
          <li>
              <a href="/SIVAL/mvc/views/consults/consults.html" class="collection-item"> <i
                      class="material-icons">find_in_page</i></span>Queries</a>
          </li>
          <li>
              <a href="/SIVAL/mvc/views/visitors/visitors_list.php" class="collection-item"><i
                      class="material-icons">directions_walk</i></span>QR Visitors</a>
          </li>
          <li>
              <div class="divider"></div>
          </li>
          <br>
          <li><a href="#!"><i class="material-icons ">person_add</i>Add Account</a></li>
          <li><a href="/SIVAL/mvc/views/index.html"><i class="material-icons">keyboard_return</i>Sign off</a></li>
          </div>
          </li>
      </ul>
      <ul class="sidenav" id="menu-side2">
          <li>
              <div class="user-view">
                  <div class="background right ">
                      <img src="/SIVAL/static/images/fondo.jpg" alt="">
                  </div>
                  <a href="#">
                      <img src="/SIVAL/static/images/perfil" alt="" class="circle">
                      <a href="#name"><span class="white-text name ">
                              <h3>Rolax</h3>
                          </span></a>
                      <a href="#email"><span class="white-text email">1721110895@utectulancingo.edu.mx</span></a>
                      <a href="#!" class="waves-effect waves-light red btn-small"></i>Manage your account</a>
                      <br>
                      <br>
                  </a>

                  <br>
          <li><a href="#!"><i class="material-icons">person_add</i>Add Account</a></li>
          <li><a href="#!"><i class="material-icons">keyboard_return</i>Sign off</a></li>


          </div>
          </li>
      </ul>

</header>
    <main>
    <div class="container1">
        <div class="row">
        <div class="col l2 m3 s3 block hide-on-small-only">
            <div class="collection">
              <a href="/SIVAL/mvc/views/master.php" class="collection-item">
                <span class="badge"> <i class="material-icons">home</i> </span
                >Home</a
              >
              <a
                href="/SIVAL/mvc/views/alumnos/alumnos.html"
                class="collection-item"
              >
                <span class="badge"> <i class="material-icons">people</i> </span
                >Students</a
              >
              <a
                href="/SIVAL/mvc/views/laboratories/labs_list.php"
                class="collection-item"
              >
                <span class="badge"
                  ><i class="material-icons">business</i> </span
                >Laboratories</a
              >
              <a
                href="/SIVAL/mvc/views/users/users_list.php"
                class="collection-item"
                ><span class="badge"
                  ><i class="material-icons">person_add</i> </span
                >Users</a
              >
              <a
                href="/SIVAL/mvc/views/consults/consults.html"
                class="collection-item"
                ><span class="badge"
                  ><i class="material-icons">find_in_page</i> </span
                >Queries</a
              >
              <a
                href="/SIVAL/mvc/views/visitors/visitors_list.php"
                class="collection-item"
                ><span class="badge"
                  ><i class="material-icons">directions_walk</i> </span
                >QR Visitors</a
              >
              <div class="divider green"></div>
            </div>
          </div>
          <div class="col l10">
            <div class="column">
              <div
              class="col s12 l12"
              style="
                  display: flex;
                  align-items: center;
                  justify-content: center;
                "
              >
                <h5>USERS</h5>
                
              </div>
            </div>

            Users List
            
            <div class="divider green s12"></div>
              
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
