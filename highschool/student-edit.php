<?php
    //setting up a title for this page
    $title = "Edit Student";
    require_once('header.php');
?>

<?php
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
    $cmd->bindParam(':student_id', $student_id, PDO::PARAM_STR, 50);
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
<!--this code below this line will directed to the another site where the user will be informed that the data is been stored into the database-->
<form action = "students-saved.php" method="post">
    <fieldset>
        <label for = "student_id">Student ID:  </label>
        <input name = "student_id" id = "student_id" required value="<?php echo $student_id; ?>"/>
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
    <!-- send it off to the database-->
    <button>Save</button>
</form>

