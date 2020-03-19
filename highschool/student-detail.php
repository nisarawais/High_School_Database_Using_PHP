<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail</title>
</head>
<body>
    <header>
        <h1>Student Detail </h1>
    </header>
    <?php
        // store the students id number in the variable
        $student_id = $_POST['student_id'];

        try{
            // connect
            $db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');

            // set up the query and fetch the chosen student
            $sql = "SELECT * FROM students WHERE student_id = :student_id";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $student = $cmd->fetch();

            // display the chosen student's detail
            echo 'First Name: '.$students['first_name'].'<br/>';
            echo 'Last Name: '.$students['last_name'].'<br/>';
            echo 'Gender: '.$students['gender'].'<br/>';
            echo 'Grade: '.$students['grade'].'<br/>';

            //disconnect
            $db = null;
        }
        catch(Exception $e){
            header('location:error.php'); // will direct to the error site
            exit();
        }
    ?>
</body>
</html>