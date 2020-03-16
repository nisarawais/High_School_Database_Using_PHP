<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Saved</title>
</head>
<body>

<?php

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
    $db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

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

// show message to user
    echo '<h2 class="alert alert-success">Course Saved</h2>';
    header('location:courses-list.php');
}

?>
</body>
</html>