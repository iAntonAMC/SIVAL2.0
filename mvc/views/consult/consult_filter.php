<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina de Consultas" />

    <title> SIVAL | CONSULTAS </title>

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
    <main>
        <div class="container1">
            <div class="row">

                <!-- barra de navegación -->
                <?php include "../../../static/include/general/navigator.html"; ?>

                <div class="col l10">
                    <div class="column">
                        <div class="col s12 l12" style="display: flex;align-items: center;justify-content: center;">
                            <h5>QUERIES</h5>
                        </div>
                    </div>
                    Make a query
                    <div class="divider green"></div>
                    <div class="container1">
                        <div class="row">
                            <form action="/SIVAL/mvc/controllers/consult/prepare_consult.php" method="POST">
                                <div class="input-field col s12 m6 l2">
                                    <select name="career" id="career">
                                        <option value="all" selected> All careers </option>
                                        <option value="TI"> Software </option>
                                        <option value="NURSE"> Nursery </option>
                                        <option value="NANO"> Nanotechnology </option>
                                        <option value="BUSSINESS"> Business Development </option>
                                    </select>
                                    <label>Career</label>

                                </div>

                                <div class="input-field col s12 m6 l2">
                                    <select name="grade" id="grade">
                                        <option value="all"> All Periods </option>
                                        <option value="1"> 1 Period </option>
                                        <option value="2"> 2 Period </option>
                                        <option value="3"> 3 Period </option>
                                        <option value="4"> 4 Period </option>
                                        <option value="5"> 5 Period </option>
                                        <option value="6"> 6 Period </option>
                                        <option value="7"> 7 Period </option>
                                        <option value="8"> 8 Period </option>
                                        <option value="9"> 9 Period </option>
                                        <option value="10"> 10 Period </option>
                                        <option value="11"> 11 Period </option>
                                    </select>
                                    <label>Period</label>
                                </div>

                                <div class="input-field col s12 m6 l2">
                                    <select name="area" id="area">
                                        <option value="general"> General Entrances </option>
                                        <option value="A"> A Building </option>
                                        <option value="B"> B Building </option>
                                        <option value="C"> C Building </option>
                                        <option value="G"> G Building </option>
                                        <option value="H"> H Building </option>
                                        <option value="I"> I Building </option>
                                        <option value="K"> K Building </option>
                                    </select>
                                    <label>Group</label>
                                </div>

                                <div class="input-field col s12 m6 l2">

                                    <input type="date" name="idate" id="idate" class="datepicker" required>
                                    <label>Initial Date </label>
                                </div>

                                <div class="input-field col s12 m6 l2">
                                    <input type="date" name="edate" id="edate" class="datepicker" required>
                                    <label for="date">Final Date</label>
                                </div>
                                <div class="row">
                                    <div class="col s12 center">
                                        <button class="btn waves-effect waves-light green" type="submit"
                                            name="action">Search
                                            <i class="material-icons right">equalizer</i>
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

        var sel = document.querySelectorAll('select');
        var instances = M.FormSelect.init(sel);

        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);

        $(function() {
            $('#date').datepicker();
        });
    });
    </script>

</body>

</html>
