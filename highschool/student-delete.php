<?php
    //setting up a title for this page
    $title = "Delete Student";
    require_once('header.php');
?>
<?php

// get the student ID from the url 

$student_id = $_GET['student_id'];

try {
    // connect to the sevrer
    require_once 'db.php';

    $sql = "DELETE FROM students WHERE student_id = :student_id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':student_id', $student_id, PDO::PARAM_STR, 50);

    //delete
    $cmd->execute();

    // disconnect from the server
    $db = null;

    // return back to the student list
    header('location:student-list.php');
}
catch (Exception $e) {
    header('location:error.php');
    exit();
}
?>
</body>
</html>
