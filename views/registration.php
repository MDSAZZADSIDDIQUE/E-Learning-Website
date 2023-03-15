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
        <fieldset style="text-align: center;">
            <form method="POST" action="../controllers/registration_validation.php" style="display: inline-block; text-align: left;">
                <fieldset style="width: 100%;">
                    <h1 style="font-family: 'Rampart One', cursive; text-align: center;">Registration</h1>
                    <hr>
                    <label for="first_name">First Name:</label>
                    <input style="margin: 5%;" type="text" id="first_name" name="firstName" value="<?php if(isset($_SESSION['firstName'])) { echo $_SESSION['firstName']; } ?>">
                    <?php if(isset($_SESSION['emptyFirstName'])) { echo "<br><small style='color: red;'>Empty First Name.</small>"; unset($_SESSION['emptyFirstName']); } ?>
                    <?php if(isset($_SESSION['invalidFirstName'])) { echo "<br><small style='color: red;'>Invalid First Name.</small>"; unset($_SESSION['invalidFirstName']); } ?>
                    <br>
                    <br>
                    <label for="last_name">Last Name:</label>
                    <input style="margin: 5%;" type="text" id="last_name" name="lastName" value="<?php if(isset($_SESSION['lastName'])) { echo $_SESSION['lastName']; } ?>">
                    <?php if(isset($_SESSION['emptyLastName'])) { echo "<br><small style='color: red;''>Empty Last Name.</small>";  unset($_SESSION['emptyLastName']);} ?>
                    <?php if(isset($_SESSION['invalidLastName'])) { echo "<br><small style='color: red;'>Invalid Last Name.</small>"; unset($_SESSION['invalidLastName']); } ?>
                    <br>
                    <br>
                    <label for="email_address">Email Address:</label>
                    <input style="margin: 5%;" type="email" id="email_address" name="emailAddress" value="<?php if(isset($_SESSION['emailAddress'])) { echo $_SESSION['emailAddress']; } ?>">
                    <?php if(isset($_SESSION['emptyEmailAddress'])) { echo "<br><small style='color: red;''>Empty Email Address.</small>";  unset($_SESSION['emptyEmailAddress']);} ?>
                    <?php if(isset($_SESSION['invalidEmailAddress'])) { echo "<br><small style='color: red;'>Invalid Email Address.</small>"; unset($_SESSION['invalidEmailAddress']); } ?>
                    <br>
                    <br>
                    <label for="gender">Gender:</label>
                    <input type="radio" id="male" name="gender" value="male" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male') { echo "checked"; } ?>>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female') { echo "checked"; } ?>>
                    <label for="female">Female</label>
                    <?php if(isset($_SESSION['emptyGender'])) { echo "<br><small style='color: red;''>Empty Gender.</small>";  unset($_SESSION['emptyGender']);} ?>
                    <br>
                    <br>
                    <label for="dob">Date of Birth:</label>
                    <input  style="margin: 5%;" type="date" id="dob" name="dob" value="<?php if(isset($_SESSION['dob'])) { echo $_SESSION['dob']; } ?>">
                    <?php if(isset($_SESSION['emptyDOB'])) { echo "<br><small style='color: red;''>Empty Date of Birth.</small>";  unset($_SESSION['emptyDOB']);} ?>
                    <br>
                    <br>
                    <label for="role">Select your Role:</label>
                    <select style="margin: 5%;" id="role" name="role">
                        <option value="admin" <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { echo "selected"; } ?>>Admin</option>
                        <option value="teacher" <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') { echo "selected"; } ?>>Teacher</option>
                        <option value="student" <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'student') { echo "selected"; } ?>>Student</option>
                    </select>
                    <br>
                    <br>
                    <label for="password">Password:</label>
                    <input style="margin: 5%;" type="password" id="password" name="password" value="<?php if(isset($_SESSION['password'])) { echo $_SESSION['password']; } ?>">
                    <?php if(isset($_SESSION['emptyPassword'])) { echo "<br><small style='color: red;''>Empty Password.</small>";  unset($_SESSION['emptyPassword']);} ?>
                    <?php if(isset($_SESSION['invalidPassword'])) { echo "<br><small style='color: red;'>Invalid Password.</small>"; unset($_SESSION['invalidPassword']); } ?>
                    <br>
                    <br>
                    <label for="confirm_password">Confirm Password:</label>
                    <input style="margin: 5%; margin-right: 0" type="password" id="confirm_password" name="confirmPassword" value="<?php if(isset($_SESSION['confirmPassword'])) { echo $_SESSION['confirmPassword']; } ?>">
                    <?php if(isset($_SESSION['emptyConfirmPassword'])) { echo "<br><small style='color: red;''>Empty Confirm Password.</small>";  unset($_SESSION['emptyConfirmPassword']);} ?>
                    <?php if(isset($_SESSION['invalidConfirmPassword'])) { echo "<br><small style='color: red;'>Invalid Confirm Password.</small>"; unset($_SESSION['invalidConfirmPassword']); } ?>
                    <?php if(isset($_SESSION['passwordMismatched'])) { echo "<br><small style='color: red;'>Password does not match.</small>"; unset($_SESSION['passwordMismatched']); } ?>
                    <br>
                    <br>
                    <a style="margin: 5%;  margin-left: 0; text-decoration: none;" href="login.php">Already have an account? Log in.</a>
                    <br>
                    <br>
                    <input style="margin: 5%; width: 90%" type="submit" value="Submit">
                </fieldset>
            </form>
        </fieldset>
    <?php
    include "footer.php";
    ?>
    </body>
</html>