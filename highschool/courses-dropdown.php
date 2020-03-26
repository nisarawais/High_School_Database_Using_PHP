<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses Dropdown List</title>
</head>
<body>
<form method = "post" action = "courses-detail.php">
    <fieldset>
        <label for = "code">Select Course</label>
        <select name = "code" id = "code">
            <?php
            //connect
            $db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

            $sql = "SELECT code FROM courses";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $courses = $cmd->fetchAll();
            //choosing the the name of the course from option lists
            foreach ($courses as $data)
            {
                echo "<option>".$data['code']."</option>";
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