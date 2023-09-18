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
                <p>Username: <input type="text" name="uid" value="" /></p>
                <p>Password: <input type="password" name="pwd" value="" /></p>
                <p>repeat password: <input type="password" name="pwdrpt" value="" /></p>
                <p>E-mail: <input type="email" name="email" value="" /></p>
                <input type="submit" value="sign up" /></p>
            </fieldset>
        </form>
    </div>

    <div id="login-form">
        <form action="includes/login.inc.php" method="post">
            <fieldset>
                <legend>Log in</legend>
                <hr>
                <p>Username: <input type="text" name="uid" value="" /></p>
                <p>Password: <input type="password" name="pwd" value="" /></p>
                <input type="submit" name="submit" value="log in" /></p>
            </fieldset>
        </form>
    </div>
    <?php
    
    ?>
</body>

</html>