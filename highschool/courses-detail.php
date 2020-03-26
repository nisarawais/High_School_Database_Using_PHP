<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Detail</title>
</head>
<body>
<header>
    <h1>Course Detail</h1>
</header>
    <?php
        
        $code = $_POST['code'];

        try {
            // connect
             $db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

            // setting up the query to get the selected course code from the dropdown
            $sql = "SELECT * FROM courses WHERE code = :code";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':code', $code, PDO::PARAM_STR, 50);
            $cmd->execute(); 
            $courses = $cmd->fetch();  

            // display the other column datas for the chosen course codes
            echo 'Name: ' . $courses['name'] . '<br/>';
            echo 'Teacher: ' . $courses['teacher'] . '<br/>';
            echo 'Time: ' . $courses['time'] . '<br/>';
            // disconnect
            $db = null;
        }
        catch (Exception $e) {
            header('location:error.php');
            exit();
        }
    ?>
</body>
</html>