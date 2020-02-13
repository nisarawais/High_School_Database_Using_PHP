<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses Dropdown List</title>
</head>
<body>
<form method = "post" action = "course-list.php">
    <fieldset>
        <label for = "name">Select Course</label>
        <select name = "name" id = "name">
            <?php
            //connect
            $db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

            $sql = "SELECT name FROM courses";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $courses = $cmd->fetchAll();

            foreach ($courses as $data)
            {
                echo "<option>".$data['name']."</option>";
            }
            //disconnect
            $db = null;
            ?>
        </select>
    </fieldset>
    <button>View Details</button>
</form>
</body>
</html>