<?php
    //setting up a title for this page
    $title = "Course Saved";
    require_once('header.php');
?>
<?php

// authiencation check
session_start();

//make this only available to the log-in user
require_once 'auth.php';

//storing new data into the variables
$code = ($_POST['code']);
$name = $_POST['name'];
$teacher = ($_POST['teacher']);
$time = $_POST['time'];

//  validating to make sure that the user dont send the inappropriate info
if (empty($code)) {
    $ok = true;
}
else {
    echo 'You need to type the course code<br />';
    $ok = false;
}
if (!empty($name)) {
    $ok = true;
}
else{
    echo 'you need to type the name<br />';
    $ok = false;
}

if (!empty($teacher)) {
    $ok = true;
}
else{
    echo 'you need to type the teacher name <br />';
    $ok = false;
}
if (!empty($time)) {
    if(preg_match("/^(?:1[012]|0[0-9]):[0-5][0-9][AM]||[PM]$/", $time))
    {
        $ok = true;
    }
    else{
        echo 'you need to type the time in the appropriate format (00:00AM/PM) <br />';
        $ok = false;
    }

}

if ($ok) {
    // connect to db
    require_once 'db.php';

    $sql = "INSERT INTO courses (code, name, teacher, time) VALUES (:code, :name, :teacher, :time);";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':code',$code, PDO::PARAM_STR,10);
    $cmd->bindParam(':name',$name, PDO::PARAM_STR,45);
    $cmd->bindParam(':teacher',$teacher, PDO::PARAM_STR,45);
    $cmd->bindParam(':time',$time, PDO::PARAM_STR);

    // try to send / save the data
    $cmd->execute();

// disconnect
    $db = null;

    header('location:course-list.php');
}

?>
</body>
</html>