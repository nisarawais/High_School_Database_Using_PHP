<?php
    //setting up a title for this page
    $title = "Student Detail";
    require_once('header.php');
?>

<?php

    //make this only available to the log-in user
    require_once 'auth.php';

    //declare the variables for each of the feild
    $student_id = null;
    $first_name = null;
    $last_name = null;
    $gender = null;
    $grade = null;

    //if there is info passed in the url, we are edditing
    if(!empty($_GET['student_id'])){
        $student_id= $_GET['student_id'];

     // connect to the server
    require_once 'db.php';

    //get the selected student

    $sql = "SELECT * FROM students WHERE student_id = :student_id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $cmd->execute();

    //getting all the info from the chosen student
    $students = $cmd->fetch();
    $first_name= $students['first_name'];
    $last_name = $students['last_name'];
    $gender = $students['gender'];
    $grade = $students['grade'];

    // disconnect
    $db = null;
    }
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