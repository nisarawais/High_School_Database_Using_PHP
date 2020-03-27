<?php
    //setting up a title for this page
    $title = "Delete Course";
    require_once('header.php');
?>
<?php

// authiencation check
session_start();

//make this only available to the log-in user
require_once 'auth.php';

// get the course code from the url 
$code = $_GET['code'];

try {
    // connect to the sevrer
    require_once 'db.php';

    $sql = "DELETE FROM courses WHERE code = :code";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':code', $code, PDO::PARAM_STR, 50);

    //delete
    $cmd->execute();

    // disconnect from the server
    $db = null;

    // return back to the course list
    header('location:course-list.php');
}
catch (Exception $e) {
    header('location:error.php');
    exit();
}
?>
</body>
</html>
