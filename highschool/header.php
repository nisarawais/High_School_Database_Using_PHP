<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src = "js.js" assync></script>
    <!--This echo title in php will be inidviudal title for the specific page-->
    <title>Awais High School for the Deaf ~ <?php echo $title; ?></title>
    
</head>
<body>
<header>
    <nav>
        <a class = "brand" href="index.php">Awais High School for the Deaf</a>
        <a href="course-list.php" >Courses</a>
        <a href="student-list.php">Students</a>
        <a href = "new.php">New</a>
        <a href="sign-up.php">Sign-Up</a>
        <a href="log-in.php">Log-In</a>
    </nav>
</header>
    <h1><?php echo $title;?></h1>
</body>
</html>