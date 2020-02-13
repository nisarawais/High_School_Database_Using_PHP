<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Course</title>
    <h1>Add New Course</h1>
</head>
<body>
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