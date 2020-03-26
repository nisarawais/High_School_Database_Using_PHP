<?php
    //setting up a title for this page
    $title = "Course Dropdown";
    require_once('header.php');
?>
<form method = "post" action = "courses-detail.php">
    <fieldset>
        <label for = "code">Select Course</label>
        <select name = "code" id = "code">
            <?php
            //connect
            require_once 'db.php';
            
            $sql = "SELECT code FROM courses";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $courses = $cmd->fetchAll();
            //choosing the the name of the course from option lists
            foreach ($courses as $data)
            {
                echo "<option>".$data['code']."</option>";
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