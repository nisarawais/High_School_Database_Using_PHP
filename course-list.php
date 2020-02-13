<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course List</title>
</head>
<body>
<?php
$db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');
$query = "select * from courses;";
$cmd = $db->prepare($query);
$cmd->execute();
$courses = $cmd->fetchAll();
echo "<table border='1'><thead><th>Course Code</th><th>Course Name</th><th>Teacher</th><th>Time</th></thead>";
foreach ($courses as $data) {
    echo "<tr><td>" . $data['code'] . "</td><td>" . $data['name'] . "</td><td>" . $data['teacher']."</td><td>" .$data['time'] . "</td><td>";
}
echo "</table>";
$db = null;
?>
</body>
</html>