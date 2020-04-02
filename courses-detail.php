<?php
    //setting up a title for this page
    $title = "Course Detail";
    require_once('header.php');
?>
    <?php

        //make this only available to the log-in user
        require_once 'auth.php';
        
        $code = $_POST['code'];

        try {
            // connect
              require_once('db.php');
            // setting up the query to get the selected course code from the dropdown
            $sql = "SELECT * FROM courses WHERE code = :code";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':code', $code, PDO::PARAM_STR, 50);
            $cmd->execute(); 
            $courses = $cmd->fetch();  

            // display the other column datas for the chosen course codes
            echo 'Name: ' . $courses['name'] . '<br/>';
            echo 'Teacher: ' . $courses['teacher'] . '<br/>';
            echo 'Time: ' . $courses['time'] . '<br/>';
            // disconnect
            $db = null;
        }
        catch (Exception $e) {
            header('location:error.php');
            exit();
        }
    ?>
</body>
</html>