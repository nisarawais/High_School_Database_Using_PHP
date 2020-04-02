<?php
    //setting up a title for this page
    $title = "Student Saved";
    require_once('header.php');
?>
<?php

//make this only available to the log-in user
require_once 'authorization.php';

//storing new data into the variables
$student_id = ($_POST['student_id']);
$first_name = $_POST['first_name'];
$last_name = ($_POST['last_name']);
$gender = $_POST['gender'];
$grade = $_POST('grade');


// validating to make sure that user didnt send off the inappropriate stuff
//if there is no existing data 
if(empty($_GET['student_id'])){
if (!empty($student_id)) {
    if($student_id >0)
    {
        $ok = true;
 }
}
else {
    echo 'You need to type the student id number<br />';
    $ok = false;    
}
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
if ($ok == true) {
    // connect to db
    require_once 'db.php';
    if(empty($_GET['student_id'])){
        $sql = "INSERT INTO students (student_id, first_name, last_name, gender,grade) VALUES (:student_id, :first_name, :last_name, :gender, :grade);";
    }
    else{
        $sql = "UPDATE students SET `first_name` = ':first_name', `last_name` = ':last_name', `gender` = ':gender', `grade` = ':grade' WHERE (`student_id` = ':student_id');";

    }
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':student_id',$student_id, PDO::PARAM_INT);
    $cmd->bindParam(':first_name',$first_name, PDO::PARAM_STR,45);
    $cmd->bindParam(':last_name',$last_name, PDO::PARAM_STR,45);
    $cmd->bindParam(':gender',$gender, PDO::PARAM_STR,1);
    $cmd->bindParam(':grade',$grade, PDO::PARAM_STR);

    // try to send / save the data
    $cmd->execute();

// disconnect
    $db = null;

    header('location:student-list.php');
}

?>
</body>
</html>