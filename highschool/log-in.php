<?php
    //setting up a title for this page
    $title = "Log-In";
    require_once('header.php');
?>
<?php
if (!empty($_GET['invalid'])) {
    if ($_GET['invalid'] == "true") {
        echo "<p>Invalid Login</p>";
    }
    else {
        echo "<p>Please enter your email and the password</p>";
    }
}
else {
    echo "<p>Please enter your email and the password</p>";
}
?>

<form method="post" action="validation.php">
        <fieldset>
            <label for="email">Email: </label>
            <input name="email" id="email" required type="email" placeholder="email@email.com"/>
        </fieldset>
        <fieldset>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required />
        </fieldset>
            <input type="submit" value="Log-In"/>
    </form>
</main>
