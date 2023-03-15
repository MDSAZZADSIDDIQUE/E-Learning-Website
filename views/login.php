<?php
session_start();
?>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
</head>
<body>
<?php
include "header.php";
?>
<fieldset style="height: auto; width: auto;  text-align: center;">
    <form method="POST" action="../controllers/login_validation.php" style="display: inline-block;">
        <fieldset style="text-align: left; width: 100%;">
            <h1 style=" font-family: 'Rampart One', cursive; text-align: center;">Log in</h1>
            <hr>
            <label for="email_address">Email Address:</label>
            <input style="margin: 5%;" type="email" id="email_address" name="emailAddress" value="<?php if(isset($_SESSION['emailAddress'])) { echo $_SESSION['emailAddress']; } elseif(isset($_COOKIE['emailAddress'])) { echo $_COOKIE['emailAddress']; } ?>">
            <?php if(isset($_SESSION['emptyEmailAddress'])) { echo "<br><small style='color: red;''>Empty Email Address.</small>";  unset($_SESSION['emptyEmailAddress']);} ?>
            <?php if(isset($_SESSION['invalidEmailAddress'])) { echo "<br><small style='color: red;'>Invalid Email Address.</small>"; unset($_SESSION['invalidEmailAddress']); } ?>
            <br>
            <label for="password">Password:</label>
            <input style="margin: 5%;" type="password" id="password" name="password" value="<?php if(isset($_SESSION['password'])) { echo $_SESSION['password']; } elseif(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
            <?php if(isset($_SESSION['emptyPassword'])) { echo "<br><small style='color: red;''>Empty Password.</small>";  unset($_SESSION['emptyPassword']);} ?>
            <?php if(isset($_SESSION['invalidPassword'])) { echo "<br><small style='color: red;'>Invalid Password.</small>"; unset($_SESSION['invalidPassword']); } ?>
            <?php if(isset($_SESSION['passwordDoesNotMatch'])) { echo "<br><small style='color: red;'>Password does not match.</small>"; unset($_SESSION['passwordDoesNotMatch']); } ?>
            <br>
            <input style="margin: 5%; margin-left: 0;" type="checkbox" name="rememberMe" value="remember_me"> Remember me
            <br>
            <a style="margin: 5%;  margin-left: 0; text-decoration: none;" href="registration.php">Don't have an account? Register.</a>
            <br>
            <input style="margin: 5%; width: 90%;" type="submit" value="Submit">
        </fieldset>
    </form>
</fieldset>
<?php
include "footer.php";
?>
</body>
</html>