<?php
//make this only available to the log-in user
require_once 'auth.php';
?>
<?php
    //setting up a title for this page
    $title = "Add Course";
    require_once('header.php');
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
    <!--saving the data-->
    <button>Save</button>
</form>
</body>
</html>
