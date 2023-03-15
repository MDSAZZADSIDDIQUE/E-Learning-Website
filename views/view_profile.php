<?php
session_start();
if(!isset($_SESSION['authorized'])) {
    header('location: login.php?unauthorizedAccess');
}
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
<table style="border: 1px solid black; border-top: 0px; width: 100%; height: 50%;">
    <tr>
        <td style="border-right: 1px solid black; width: 25%; height: 100%; text-align: center; font-family: 'Rampart One', cursive;">
            <table>
                <tr>
                    <td>
                        <a href="view_admins.php" style="text-decoration: none;">
                            View Admins
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="view_students.php" style="text-decoration: none;">
                            View Students
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="view_teachers.php" style="text-decoration: none;">
                            View Teachers
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="view_profile.php" style="text-decoration: none;">
                            View Profile
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="add_course.php" style="text-decoration: none;">
                            Add Course
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="view_courses.php" style="text-decoration: none;">
                            View Course
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a href="../controllers/exit.php" style="text-decoration: none;">
                            Exit
                        </a>
                    </td>
                </tr>
            </table>
        </td>

        <td>
            <table style="width: 100%; height: 25%; font-size: 1em; font-family: 'Rampart One', cursive;">
                <tr><th><h1>View Profile</h1></th></tr>
            </table>
                <?php
                $file_path = '../models/user_information.json';
                $json_data = file_get_contents($file_path);
                $user_data = json_decode($json_data, true);
                foreach ($user_data as $user) {
                    if ($user['emailAddress'] === $_SESSION['emailAddress'] && $user['password'] === $_SESSION['password']) {
                        echo "<p>First Name: {$user['firstName']}</p><br>";
                        echo "<p>Last Name: {$user['lastName']}</p><br>";
                        echo "<p>Email Address: {$user['emailAddress']}</p><br>";
                        echo "<p>Gender: {$user['gender']}</p><br>";
                        echo "<p>Date of Birth: {$user['dob']}</p><br>";
                        break;
                    }
                }
                ?>
        </td>
    </tr>
</table>
<?php
include "footer.php";
?>
</body>
</html>