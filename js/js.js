function deleteConfirmation() {
    return confirm('Are you sure you want to delete this course?');
}

function matchPassowrdChecker(){
    //omit 2 passwords from the form in sign up page
    let passsword1 = document.getElementById('password').nodeValue;
    let password2 = document.getElementById('confirm_password').nodeValue;

    //check to see if two passwords are identical
    //when the passwords are same
    if (passsword1 == password2){
        document.getElementById('messagePW').innerHTML = "";
    }
    // when the password are not same
    else{
        document.getElementById('messagePW').innerHTML = "Passwords are not the same";
    }
}

function showHidePassword() {
    //declare the variables and get the elemenet
    let password = document.getElementById("password");
    let btn = document.getElementById("showhidebtn");

    //if the the password is not been shown, the password will be visible
    if(password.nodeType == 'password')
    {
        password.nodeType = "text";
        btn.textContent = "Hide";
    }
    //if the password is been visible, it will hide when the button is clicked
    else{
        password.nodeType = "password";
        btn.textContent = "Show";
    }
}