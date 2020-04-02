<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src = "js/js.js" assync></script>
    <!--This echo title in php will be inidviudal title for the specific page-->
    <title>Awais High School for the Deaf ~ <?php echo $title; ?></title>
    
</head>
<body>
<header>
    <nav>
        <a class = "brand" href="index.php">Awais High School for the Deaf</a>
        <a href="course-list.php" >Courses</a>
        <a href="student-list.php">Students</a>
        <?php
        // access current session to check if user is authenticated
        session_start();
        
        //hide New,Log out, and User name if the user is not log in
        if (!empty($_SESSION['userId'])) {
        echo "<a href = 'new.php'>New</a>";
        echo "<a href='#'>" . $_SESSION['name'] ."</a>";         
        echo "<a href ='log-out.php'>Log-Out</a>";
        }

        //hide Sign-up and Sign-in when the user is logged in
        if(empty($_SESSION['userId']))
        {
        echo "<a href='sign-up.php'>Sign-Up</a>";
        echo "<a href='log-in.php'>Log-In</a>";
        }
        ?>
    </nav>
</header>
    <h1><?php echo $title;?></h1>
</body>
</html>