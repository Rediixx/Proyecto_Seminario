<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $username, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    
    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=pwdDontMatch");
        exit();
    }

    if (usernameExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

}

else {
    header("location: ../signup.php");
}