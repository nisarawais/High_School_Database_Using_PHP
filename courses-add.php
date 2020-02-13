
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Course</title>
</head>
<body>
<?php

$code = null;
$name = null;
$teacher = null;
$time = null;
// connect

$db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

$courses = $cmd->fetch();
$code = $courses['code'];
$name= $courses['name'];
$teacher = $courses['teacher'];
$time = $courses['time'];

// disconnect
$db = null;
}
?>
<!--this code below this line will directed to the another site where the user will be informed that the data is been stored into the database-->
<form action = "courses-saved.php" method="post">
    <fieldset>
        <label for = "code">Course Code:  </label>
        <input name = "code" id = "code"/>
    </fieldset>
    <fieldset>
        <label for = "name">Course Name: </label>
        <input name = "name" id = "name"/>
    </fieldset>
    <fieldset>
        <label for = "teacher">Teacher Name:  </label>
        <input name = "teacher" id = "teacher"/>
    </fieldset>
    <fieldset>
        <label for = "time">Time:  </label>
        <input name = "time" id = "time"/>
    </fieldset>
    <button>Save</button>
</form>
</body>
</html>