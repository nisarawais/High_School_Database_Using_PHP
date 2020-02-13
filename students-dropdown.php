<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students Dropdown List</title>
</head>
<body>
<form method = "post" action = "student-list.php">
    <fieldset>
        <label for = "student_id">Select student</label>
        <select name = "student_id" id = "student_id">
            <?php
            //connect
            $db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

            $sql = "SELECT name FROM students";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $courses = $cmd->fetchAll();
// selecting one to see in details
            foreach ($students as $data)
            {
                echo "<option>".$data['student_id']."</option>";
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