<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina Principal" />

    <title> SIVAL | MAIN </title>

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
                            <h5>ADD LABORATORIE</h5>
                        </div>
                    </div>
                    Add new Laboratory
                    <div class="divider green"></div>
                    <div class="row">
                        <form class="col s12" action="/SIVAL/mvc/controllers/laboratories/create_lab.php" method="POST">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" id="lab_name" name="lab_name" required minlength="3"
                                        maxlength="20">
                                    <label for="lab_name">Laboratorie Name</label>
                                </div>

                                <div class="input-field col s6">
                                    <select type="text" id="building" name="building" placeholder="Lab Ubication"
                                        required>
                                        <option for="floor" disabled selected>Building</option>
                                        <option value="A">A</option>
                                        <option value="C">C</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                    </select>
                                </div>

                                <div class="input-field col s6">
                                    <select type="text" id="floor" name="floor" placeholder="Lab Floor" required>
                                        <option for="floor" disabled selected>Floor</option>
                                        <option value="H">Upper Floor</option>
                                        <option value="G">Fist Floor</option>
                                    </select>
                                </div>

                                <div class="input-field col s6">
                                    <input type="number" id="capacity" name="capacity" min="0" max="50" value="20">
                                    <label for="capacity">Capacity</label>
                                </div>


                            </div>
                            <div class="row center">
                                <div class="col s12">
                                    <a class="btn  waves-effect waves-light red"
                                        href="/SIVAL/mvc/views/laboratories/labs_list.php">
                                        <i class="material-icons right">delete</i>
                                        Cancel
                                    </a>

                                    <button class="btn waves-effect waves-light" type="submit" title="Save Lab">POST NEW
                                        LABORATORIE
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
</body>

</html>