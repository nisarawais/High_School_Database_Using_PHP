<?php
//get the email and the password from the log-in.php
$email = $_POST['email'];
$password = $_POST['password'];

//set the variable of the name to null
$name = null;

//if this page is not broken
try {
    require_once('db.php');
    //get the email that is been submitted
    $sql = "SELECT userId, password FROM users WHERE email = :email";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
    $cmd->bindParam(':name',$name, PDO::PARAM_STR,45);
    $cmd->execute();
    $user = $cmd->fetch();

    // if the password does not match to the email, it will rediredit to log in page informing that the passowrd is wrong.
    if (!password_verify($password, $user['password'])) {
        header('location:log-in.php?invalid=true');
        exit();
    } else {

        // the user is logged in
        session_start();

        //store the userID into the login query
        $_SESSION['userId'] = $user['userId'];

        // the user name will apppear on the nav bar since the user is logged in
        $_SESSION['name'] = $name;

        // go back to home page with logged in
        header('location:index.php');
    }

    //disconnect from the database
    $db = null;
}
// will redirectto the error page if this page is broken
catch (Exception $e) {
    header('location:error.php');
    exit();
}
?>