<?php
    //setting up a title for this page
    $title = "Student List";
    require_once('header.php');
?>
<?php
//connected
$db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');
$query = "select * from students;";
$cmd = $db->prepare($query);
$cmd->execute();
$students = $cmd->fetchAll();
// creating a design for the table
echo "<table border='1'><thead><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Grade</th></thead>";
foreach ($students as $data) {
    echo "<tr><td>" . $data['student_id'] . "</td><td>" . $data['first_name'] . "</td><td>" . $data['last_name']. "</td><td>".$data['gender'] . "</td><td>" . $data['grade'] . "</td></tr>";
}
echo "</table>";
/// disconnected
$db = null;
?>
</body>
</html>