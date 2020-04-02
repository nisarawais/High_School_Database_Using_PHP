<?php
    //setting up a title for this page
    $title = "Student Detail";
    require_once('header.php');

    // //make this only available to the log-in user
    // require_once 'auth.php';
?>
    <?php

    $student_id = null;
    $first_name = null;
    $last_name = null;
    $gender = null;
    $grade = null;
    $photo = null;
    
    // edit if its not empty
    if (!empty($_GET['student_id'])) {

        // store the students id number in the variable
        $student_id = $_GET['student_id'];

    
            // connect
            require_once 'db.php';
            // set up the query and fetch the chosen student
            $sql = "SELECT * FROM students WHERE student_id = :student_id";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':student_id', $student_id, PDO::PARAM_INT);
            $cmd->execute();
            $students = $cmd->fetch();
            $first_name = $students['first_name'];
            $last_name = $students['last_name'];
            $gender = $students['gender'];
            $grade = $students['grade'];
            $photo = $students['photo'];

            //disconnect
            $db = null;
    }
    ?>
    <!--this code below this line will directed to the another site where the user will be informed that the data is been stored into the database-->
<form action = "students-saved.php" method="post" enctype = "multipart/form-data">
    <fieldset>
        <label for = "student_id">Student ID:  </label>
        <?php
         if(empty($_GET['student_id'])){
        echo '<input name = "student_id" id = "student_id" required value="'.$student_id.'"/>';
        }
        else{
            echo '<input name = "student_id" id = "student_id" required value="'.$student_id.'" readonly />';
  
        }
        ?>
    </fieldset>
    <fieldset>
        <label for = "first_name">First Name: </label>
        <input name = "first_name" id = "first_name" required value="<?php echo $first_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for = "last_name">Last Name:  </label>
        <input name = "last_name" id = "last_name" required value="<?php echo $last_name; ?>"/>
    </fieldset>
    <fieldset>
        <label for = "gender">Gender: </label>
        <select name = "gender" id = "gender" required value="<?php echo $gender; ?>">
        <option>M</option>
        <option>F</option>
        </select>
    </fieldset>
    <fieldset>
        <label for = "grade">Grade: </label>
        <select name = "grade" id = "grade" required value="<?php echo $grade; ?>">
        <option>Freshman</option>
        <option>Sophomore</option>
        <option>Junior</option>
        <option>Senior</option>
        </select>
    </fieldset>
    <fieldset>
    <label for = "photo">Photo: </label>
    <input name = "photo" id = "photo" type="file">
    </fieldset>
    <?php
    //display the student picture 
    if(!empty($photo))
    {
        echo '<img src= "image/students/' .  $photo. '" alt= "Student Picture"/>';
    }
    ?>
    <!-- send it off to the database-->
    <button>Save</button>
</form>


</body>
</html>