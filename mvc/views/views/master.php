<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Principal" />

    <title> SIVAL | MAIN </title>

    <?php include "../../static/include/head.html"; ?>

</head>

<body>
    <header>
        <div class="navbar-fixed ">
            <nav>
                <!-- nav general -->
                <?php include "../../static/include/general/nav.html"; ?>
            </nav>
        </div>

        <!-- menu side movil -->
        <?php include "../../static/include/general/menu-side-movil.html"; ?>

        <!-- menu side pc -->
        <?php include "../../static/include/general/menu-side-pc.html"; ?>
    </header>

    <main>
        <div class="container1">
            <div class="row">
                <!-- barra de navegación -->
                <?php include "../../static/include/general/navigator.html"; ?>

                <div class="col l10 center">
                    <div class="column">
                        <div class="col s12 l12" style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    ">
                            <h5>HOME</h5>
                        </div>
                    </div>
                    .
                    <div class="divider green"></div>
                    <?php echo "<h2>Welcome back " . $_COOKIE['fname'] . "</h2>"; ?>
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

</body>

</html>