<?php

if (isset($_POST["submit"])) {
    // grab data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrpt = $_POST["pwdrpt"];
    $email = $_POST["email"];
    // Instantiate signupcontr class
    include "../classess/signup.classes.php";
    include "../classess/signup-contr.classes.php";

    $signup = new SignupContr($uid, $pwd, $pwdrpt, $email);
    //Running error handlers and user signup

    //Going back to front page


}