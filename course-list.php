<?php
    //setting up a title for this page
    $title = "Course List";
    require_once 'header.php';
?>

<?php
// connecting to the database
    require_once 'db.php';

// selecting all from course table
$query = "select * from courses;";
$cmd = $db->prepare($query);
$cmd->execute();
$courses = $cmd->fetchAll();
//making a table
echo "<table border='1'><thead><th>Course Code</th><th>Course Name</th><th>Teacher</th><th>Time</th></thead>";
foreach ($courses as $data) 
{

    echo "<tr>";

    //hide the edit option since the user is not logged in
    if (!empty($_SESSION['userId'])) {
    echo "<td> <a href='course-edit.php?code='" . $data['code'] . ">" . $data['code'] . "</a></td><td>" . $data['name'] . "</td><td>" . $data['teacher']."</td><td>" .$data['time'] . "</td>";
     }
     else{
              echo "<td>" . $data['code']."</td><td>" . $data['name'] . "</td><td>" . $data['teacher']."</td><td>" .$data['time'] . "</td>";
     }
    //hide the delete option if the user is not logged in
    if (!empty($_SESSION['userId'])) {
    echo '<td><a href="course-delete.php?code=' . $data['code'] . '"onclick="return deleteConfirmation();">Delete</a></td>';
    }
    echo "</tr>";
}
echo "</table>";
//disconnected
$db = null;
?>
</body>
</html>