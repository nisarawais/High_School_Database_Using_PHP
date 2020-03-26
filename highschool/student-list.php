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
    echo "<tr><td><a href='student-edit.php?student_id='" . $data['student_id'] . ">" . $data['student_id'] . "</a></td><td>" . $data['first_name'] . "</td><td>" . $data['last_name']. "</td><td>".$data['gender'] . "</td><td>" . $data['grade'] . "</td>" .'<td><a href="student-delete.php?student_id=' . $data['student_id'] . '"onclick="return deleteConfirmation();">Delete</a></td></tr>';
}
echo "</table>";
/// disconnected
$db = null;
?>
</body>
</html>