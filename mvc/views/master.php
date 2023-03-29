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
            if (isset($_COOKIE["charge"]))
            {
                if ($_COOKIE["charge"] != 'C')
                {
                    echo "<a href='/SIVAL/mvc/views/visitors/visitors_list.php'>View Pendients Visitors</a>";
                    echo "<a href='/SIVAL/mvc/views/laboratories/labs_list.php'>View all laboratories</a>";
                    echo "<a href='/SIVAL/mvc/views/users/users_list.php'>View all users</a>";
                }
            }
        ?>
        <a href="/SIVAL/mvc/views/consult/consult_filter.html">Consults</a>
    </nav>

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
