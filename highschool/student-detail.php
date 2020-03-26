<?php
    //setting up a title for this page
    $title = "Student Detail";
    require_once('header.php');
?>
    <?php
        // store the students id number in the variable
        $student_id = $_POST['student_id'];

        try{
            // connect
            require_once 'db.php';
            // set up the query and fetch the chosen student
            $sql = "SELECT * FROM students WHERE student_id = :student_id";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':student_id', $student_id, PDO::PARAM_STR, 50);
            $cmd->execute();
            $student = $cmd->fetch();

            // display the chosen student's detail
            echo 'First Name: '.$students['first_name'].'<br/>';
            echo 'Last Name: '.$students['last_name'].'<br/>';
            echo 'Gender: '.$students['gender'].'<br/>';
            echo 'Grade: '.$students['grade'].'<br/>';

            //disconnect
            $db = null;
        }
        catch(Exception $e){
            header('location:error.php'); // will direct to the error site
            exit();
        }
    ?>
</body>
</html>