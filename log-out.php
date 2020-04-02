<?php
    //setting up a title for this page
    $title = "Log-Out";
    require_once('header.php');
?>

<?php
//logging out
session_unset(); 
session_destroy(); 
// direct backto log in
header('location:log-in.php');
?>
