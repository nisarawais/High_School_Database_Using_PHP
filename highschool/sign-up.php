<?php
    //setting up a title for this page
    $title = "Sign-Up";
    require_once('header.php');
?>

<!--Form Setup-->
<form method = "post" action = "sign-up-saved.php">
    <fieldset>
        <label for="name">Name: </label>
        <input name = "name" id = "name" required type= "text" placeholder = "User"/>
    </feildset>
    <fieldset>
        <label for="email">Email: </label>
        <input name = "email" id = "email" required type= "email" placeholder = "user@email.com"/>
    </feildset>
    <fieldset>
        <label for="password">Password: </label>
        <input name = "password" id = "password" required type= "password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
                   <button id = "showhidebtn" title = "Show/Hide Password" onclick="showHidePassword();">Show</button>
    </feildset>
    <fieldset>
        <label for="confirm_password">Confirm Password: </label>
        <input name = "confirm_password" id = "confirm_password" required type= "password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup ="return matchPassowrdChecker();"/>
                   <p id = messagePW></p>                  
     </feildset>
        <div>
            <input type="submit" value="Sign-Up" onclick="return matchPassowrdChecker();" /> 
        </div>
    </form>
