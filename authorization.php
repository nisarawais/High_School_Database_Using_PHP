<?php
// exit if user is not been logged in
if (empty($_SESSION['userId'])) {
    header('location:log-in.php');
    exit();
}
?>