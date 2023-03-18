<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABS | SIVAL</title>
</head>
<body>
    <main>
        <?php
            require ("../../models/laboratory_model.php");
            $lab_id = $_GET["lab_id"];
            $lab_data = searchID($lab_id);
        ?>
        <form action="../../controllers/laboratories/update_lab.php" method="POST">
            <input type="hidden" id="lab_id" name="lab_id" value="<?php echo $lab_data['lab_id'] ?>">
            <label for="lab_name">Name:</label>
            <input type="text" id="lab_name" name="lab_name" value="<?php echo $lab_data['lab_name'] ?>" required>
            <br>
            <label for="building">Building:</label>
            <select id="building" name="building" required>
                <option value="H">High Floor</option>
                <option value="G">Ground Floor</option>
            </select>            <br>
            <label for="floor">Floor:</label>
            <select type="text" id="floor" name="floor" required>
                <option value="H">High Floor</option>
                <option value="G">Ground Floor</option>
            </select>
            <br>
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" min="0" max="50" value="<?php echo $lab_data['capacity'] ?>">

            <input type="submit" title="Save Changes">
        </form>
    </main>

</body>
</html>
