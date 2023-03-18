<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | SIVAL</title>
</head>

<body>

    <nav>

    <?php
        if (!isset($_SESSION["USER"]))
        {
            echo ("<a href='/SIVAL/mvc/views/login.html'>Log in</a>");
            echo ("<a href='/SIVAL/mvc/views/visitors/register_visitor.html'>Vistor Registration</a>");
        }

    ?>

    </nav>

    <header>
        <h1>SIVAL</h1>
    </header>

    <main>
        <section>
            <div>

            </div>
        </section>
        <aside>

        </aside>
    </main>
    <footer>
    </footer>
</body>

</html>
