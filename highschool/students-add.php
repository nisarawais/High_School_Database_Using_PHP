<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Course</title>
    <h1>Add New Course</h1>
</head>
<body>
<!--this code below this line will directed to the another site where the user will be informed that the data is been stored into the database-->
<form action = "students-saved.php" method="post">
    <fieldset>
        <label for = "student_id">Student ID:  </label>
        <input name = "student_id" id = "student_id"/>
    </fieldset>
    <fieldset>
        <label for = "first_name">First Name: </label>
        <input name = "first_name" id = "first_name"/>
    </fieldset>
    <fieldset>
        <label for = "last_name">Last Name:  </label>
        <input name = "last_name" id = "last_name"/>
    </fieldset>
    <fieldset>
        <label for = "gender">Gender: </label>
        <select name = "gender" id = "gender"/>
        <option>M</option>
        <option>F</option>
    </fieldset>
    <fieldset>
        <label for = "grade">Grade: </label>
        <select name = "grade" id = "grade"/>
        <option>Freshman</option>
        <option>Sophomore</option>
        <option>Junior</option>
        <option>Senior</option>
    </fieldset>
    // send it off to the database
    <button>Save</button>
</form>
</body>
</html>
