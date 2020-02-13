<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Saved</title>
</head>
<body>

<?php

$student_id = ($_POST['student_id']);
$first_name = $_POST['first_name'];
$last_name = ($_POST['last_name']);
$gender = $_POST['gender'];
$grade = $_POST('grade');


// validating to make sure that user didnt send off the inappropriate stuff

if (empty($student_id)) {
    if($student_id >0)
    {
        echo 'You need to type the student id number<br />';
        $ok = false;
 }
}
else {
    $ok = true;
}
if (!empty($first_name)) {
    $ok = true;
}
else{
     echo 'you need to type the first name<br />';
    $ok = false;
}
if (!empty($last_name)) {
    $ok = true;
}
else{
    echo 'you need to type the teacher name <br />';
    $ok = false;
}
if (!empty($gender)) {
    $ok = true;
    }
    else{
        $ok = false;
}
if (!empty($grade)) {
    $ok = true;
}
else{
    $ok = false;
}
if ($ok) {
    // connect to db
    $db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

    $sql = "INSERT INTO students (student_id, first_name, last_name, gender,grade) VALUES (:student_id, :first_name, :tlast_name, :gender, :grade);";

    $cmd = $db->prepare($sql);

    // try to send / save the data
    $cmd->execute();

// disconnect
    $db = null;

// show message to user
    echo '<h2 class="alert alert-success">Student Saved</h2>';
    header('location:student-list.php');
}

?>
</body>
</html>