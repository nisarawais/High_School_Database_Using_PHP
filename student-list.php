<?php
    //setting up a title for this page
    $title = "Student List";
    require_once('header.php');
?>
<?php
//connected
require_once 'db.php';
$query = "select * from students;";
$cmd = $db->prepare($query);
$cmd->execute();
$students = $cmd->fetchAll();
// creating a design for the table
echo "<table border='1'><thead><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Grade</th></thead>";
foreach ($students as $data) {
    //hide the edit option since the user is not logged in
    if (!empty($_SESSION['userId'])) {
    echo "<tr><td><a href='student-edit.php?student_id='" . $data['student_id'] . ">" . $data['student_id'] . "</a></td><td>" . $data['first_name'] . "</td><td>" . $data['last_name']. "</td><td>".$data['gender'] . "</td><td>" . $data['grade'] . "</td></tr>"; 
    }
    else{
        echo "<tr><td>" . $data['student_id'] ."</td><td>" . $data['first_name'] . "</td><td>" . $data['last_name']. "</td><td>".$data['gender'] . "</td><td>" . $data['grade'] . "</td></tr>";
    }
    //hide the delete option if the user is not logged in
   if (!empty($_SESSION['userId'])) {
    echo "<td><a href='student-delete.php?student_id='" . $data['student_id'] . '"onclick="return deleteConfirmation();">Delete</a></td></tr>';
   }
}
echo "</table>";
/// disconnected
$db = null;
?>
</body>
</html>