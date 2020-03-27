<?php
    //setting up a title for this page
    $title = "Edit Course";
    require_once('header.php');
?>

<?php

    // authiencation check
    session_start();

    //make this only available to the log-in user
    require_once 'auth.php';
    
    //declare the variables for each of the feild
    $code = null;
    $name = null;
    $teacher = null;
    $time = null;

    //if there is info passed in the url, we are edditing
    if(!empty($_GET['code'])){
        $code= $_GET['code'];

     // connect to the server
    require_once 'db.php';

    //get the selected course

    $sql = "SELECT * FROM courses WHERE code = :code";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':code', $code, PDO::PARAM_STR, 50);
    $cmd->execute();

    //getting all the info from the chosen course
    $courses = $cmd->fetch();
    $name = $courses['name'];
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
        <input name = "code" id = "code" required value="<?php echo $code; ?>"/>
    </fieldset>
    <fieldset>
        <label for = "name">Course Name: </label>
        <input name = "name" id = "name" required value="<?php echo $name; ?>"/>
    </fieldset>
    <fieldset>
        <label for = "teacher">Teacher Name:  </label>
        <input name = "teacher" id = "teacher" required value="<?php echo $teacher; ?>"/>
    </fieldset>
    <fieldset>
        <label for = "time">Time:  </label>
        <input name = "time" id = "time" required value="<?php echo $time; ?>"/>
    </fieldset>
    <!--saving the data-->
    <button>Save</button>
</form>