<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS | SIVAL</title>
</head>
<body>
    <table>
        <thead>
            <th colspan="2">NAME</th>
            <th>OCUPATION</th>
            <th>FLOOR</th>
            <th>CAPACITY</th>
            <th colspan="2">OPTIONS</th>
            <?php
                require "../../controllers/users/read_users.php";
                $users = readAll();
                if (isset($users)){
                    foreach ($users as $user){
                        echo "<tr>";
                            echo "<td>".$user['first_name']."</td>";
                            echo "<td>".$user['last_name']."</td>";
                            if ($user['charge'] == 'A')
                            {
                                echo "<td> Admin </td>";
                            }
                            elseif ($user['charge'] == 'C')
                            {
                                echo "<td> Coordinator </td>";
                            }
                            elseif ($user['charge'] == 'P')
                            {
                                echo "<td> Professor </td>";
                            }
                            echo "<td>".$user['area']."</td>";
                            echo "<td>".$user['username']."</td>";
                            echo "<td><a href='/SIVAL/mvc/views/useroratories/user_update.php?uid=" . $user['uid'] . "'>Editar</a></td>";
                            echo "<td><a href='/SIVAL/mvc/controllers/useroratories/delete_user.php?uid=" . $user['uid'] . "'>Borrar</a></td>";
                        echo "</tr>";
                    }
                }
                else {echo "<tr><td>No user were found in db</td><tr>";}
            ?>
        </thead>
    </table>
    <br>
    <a href="/SIVAL/mvc/views/users/user_insert.html">New user</a>
</body>
</html>
