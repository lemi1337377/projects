<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UserAuth</title>
</head>

<body>
    <div id="signup-form">
        <form action="includes/signup.inc.php" method="post"> 
            <fieldset>
                <legend>Sign Up</legend>
                <hr>
                <p>Username: <input type="text" name="uid" placeholder="Username" /></p>
                <p>Password: <input type="password" name="pwd" placeholder="Password" /></p>
                <p>Repeat password: <input type="password" name="pwdrpt" placeholder="Rrepeat password" /></p>
                <p>E-mail: <input type="email" name="email" placeholder="E-mail" /></p>
                <input type="submit" value="Sign up"/>
            </fieldset>
        </form>
    </div>

    <div id="login-form">
        <form action="includes/login.inc.php" method="post">
            <fieldset>
                <legend>Log in</legend>
                <hr>
                <p>Username: <input type="text" name="uid" placeholder="Username" /></p>
                <p>Password: <input type="password" name="pwd" placeholder="Password" /></p>
                <input type="submit" name="submit" value="Log in" /></p>
            </fieldset>
        </form>
    </div>
    <?php
    echo var_dump($_POST);
    ?>
</body>

</html>