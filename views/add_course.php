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
        <td style="border-right: 1px solid black; width: 25%; height: 100%; text-align: center;  font-family: 'Rampart One', cursive;">
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

            <form method="post" enctype="multipart/form-data" action="../controllers/course_validation.php">
                <fieldset>
                    <table style="width: 100%; height: 25%; font-size: 1em; font-family: 'Rampart One', cursive;">
                        <tr><th><h1>Add Course</h1></th></tr>
                    </table>
                    <label for="title">Course Title</label>
                    <input style="margin: 5%; margin-bottom: 0;" type="text" id="title" name="title">
                    <br>
                    <label for="instructor">Instructor</label>
                    <?php
                    $file_path = '../models/user_information.json';
                    $json_data = file_get_contents($file_path);
                    $user_data = json_decode($json_data, true);
                    foreach ($user_data as $user) {
                        if ($user['emailAddress'] === $_COOKIE['emailAddress'] && $user['password'] === $_COOKIE['password']) {
                            echo "<input style='margin: 5%; margin-bottom: 0;' type='text' id='instructor' name='instructor' value='{$user['firstName']}'><br>";
                            break;
                        }
                    }
                    ?>
                    <label for="time">Time</label>
                    <?php
                    $current_time = date("h:i:s A");
                    echo "<input style='margin: 5%; margin-bottom: 0;' type='text' id='time' name='time' value='{$current_time}'><br>";
                    ?>
                    <label for="video">Upload Video:</label>
                    <input style='margin: 5%; margin-bottom: 0;' type="file" name="video" id="video">
                    <br>
                    <label for="price">Price:</label>
                    <input style='margin: 5%; margin-bottom: 0;' type="number" name="price" id="price">
                    <br>
                    <input style='margin: 5%; margin-left: 0;' type="submit" name="submit" value="Upload">
                </fieldset>
            </form>



        </td>
    </tr>
</table>
<?php
include "footer.php";
?>

</body>
</html>