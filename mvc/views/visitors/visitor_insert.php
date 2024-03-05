<!DOCTYPE html>
<html lang="en">

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


    <title>SIVAL | REGISTRATION</title>

    <?php include "../../../static/include/head.html"; ?>
</head>

<body ng-app="mainModule" ng-controller="mainController">
    <div class="iris">
      <div class="row">
        <div class="col s12 m4 offset-m4">
          <div class="card">
            <div class="card-action red lighten-1 white-text">
              <h3>Register as a Visitor</h3>
            </div>
            <div class="card-content">
              <div class="form field">
                <form action="/SIVAL/mvc/controllers/visitors/create_visitor.php" method="POST">

                <input type="text" id="visitor_fname" name="visitor_fname" placeholder="Insert your name, please" required>                <br>
                <br>
                <br>

                <input type="text" id="last_name" name="last_name" placeholder="Introduce your second name" required>                <br>
                <br>
                <br>
                
                <input type="text" id="ocupation" name="ocupation" placeholder="what is your occupation" required>
                <br>
                <br>

                <input type="text" id="visit_area" name="visit_area" placeholder="What place will you visit at UTEC?" required>
                <br>
                <br>

                <input type="text" id="reason" name="reason" placeholder="Why do you visit UTEC?" required>
                <br>
                <br>

                <input type="checkbox" id="terms" required>
                <label for="terms">I accept the <a href="/SIVAL/static/Terminos y Condiciones.pdf" target="_blank">terms and conditions</a></label>
                <br>
                <br>
            
                <div class="row">
                  <div class="col s6">
                  <a class=" s6 btn  waves-effect waves-light red" href="/SIVAL/mvc/views/index.html">
                  <i class="material-icons right">delete</i>
                  </a>
                  </div>
                  <div class="col s6">
                  <div class="form field">
                    <input class="s6 waves-effect waves-light btn-large green" type="submit" style="width: 100%" title="Send petition" value="Send Petition">
                  </div>
                  </div>
                </div>
            </form>
              <br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
