<?php
    //setting up a title for this page
    $title = "Saving";
    require_once('header.php');
?>

<?php

    // store the variables that was been posted from the sign-up page
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $ok = true;

    //validates the following inputs from the sign up
    if (empty($name)) {
        echo "You need to type your name<br />";
        $ok = false;
    }

    if (empty($email)) {
        echo "You need to type your email<br />";
        $ok = false;
    }
    
    if (empty($password)) {
        echo "You need to type your password<br />";
        $ok = false;
    }
    
    if ($password != $confirm_password) {
        echo "Passwords must be same<br />";
        $ok = false;
    }

    // if everything looks go, it will hash the passwrd
    if ($ok) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // connect to the database
            require_once("db.php");
    
            // check to make sure that there is no more than one same email
            $sql = "SELECT * FROM users WHERE email = :email";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $cmd->execute();
            $user = $cmd->fetch();
    
            // let the user know that the email is already been exist
            if (!empty($user)) {
                echo 'Email is already exists<br />';
            } else {
                // if the email is not exist, it will then insert an email and info
                $sql = "INSERT INTO users (name,email, password) VALUES (:name, :email, :password)";
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
                $cmd->bindParam(':email', $email, PDO::PARAM_STR, 50);
                $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
                $cmd->execute();
            }
    
            // disconnect from the database
            $db = null;
    
            // go to login screen
            header('location:log-in.php');
        }
        //if this page is broken, it will go to error page
        catch (Exception $e) {
            header('location:error.php');
            exit();
        }
    }
?>