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
        <td style="border-right: 1px solid black; width: 25%; height: 100%; text-align: center;  font-family: 'Rampart One', cursive;"">
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
                <tr><th><h1>View Courses</h1></th></tr>
            </table>
            <table style="border: 1px solid black;  border-collapse: collapse; width: 100%;">
                <tr style="border: 1px solid black;">
                    <th style='border: 1px solid black;'>Title</th>
                    <th style='border: 1px solid black;'>Instructor</th>
                    <th style='border: 1px solid black;'>Time</th>
                    <th style='border: 1px solid black;'>Location</th>
                    <th style='border: 1px solid black;'>Price</th>
                </tr>
                <?php
                $file_path = '../models/course_information.json';
                $json_data = file_get_contents($file_path);
                $course_data = json_decode($json_data, true);

                foreach ($course_data as $course) {
                        echo "<tr>";
                        echo "<td style='border: 1px solid black;'>{$course['title']}</td>";
                        echo "<td style='border: 1px solid black;'>{$course['instructor']}</td>";
                        echo "<td style='border: 1px solid black;'>{$course['time']}</td>";
                        echo "<td style='border: 1px solid black;'>{$course['location']}</td>";
                        echo "<td style='border: 1px solid black;'>{$course['price']}</td>";
                        echo "</tr>";
                }
                ?>
            </table>
        </td>
    </tr>
</table>
<?php
include "footer.php";
?>
</body>
</html>