<?php
    //setting up a title for this page
    $title = "Student Dropdown";
    require_once('header.php');
?>
<form method = "post" action = "student-detail.php">
    <fieldset>
        <label for = "student_id">Select Student</label>
        <select name = "student_id" id = "student_id">
            <?php
            //connect
            require_once 'db.php';
            
            $sql = "SELECT student_id FROM students";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $students = $cmd->fetchAll();
            
            // selecting one to see in details
            foreach ($students as $data)
            {
                echo '<option>'.$data['student_id'].'</option>';
            }
            //disconnect
            $db = null;
            ?>
        </select>
    </fieldset>
    <button>View Details</button>
</form>
</body>
</html>