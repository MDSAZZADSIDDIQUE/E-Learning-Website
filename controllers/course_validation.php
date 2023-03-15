<?php
$title = $_POST['title'];
$instructor = $_POST['instructor'];
$time = $_POST['time'];
$price = $_POST['price'];
$target_file = "";
if(isset($_POST['submit'])) {
    $video_name = $_FILES['video']['name'];
    $video_tmp_name = $_FILES['video']['tmp_name'];
    $video_size = $_FILES['video']['size'];
    $video_type = $_FILES['video']['type'];

        $target_dir = "../assets/videos/";
        $target_file = $target_dir . basename($video_name);
        move_uploaded_file($video_tmp_name, $target_file);
}

$course_information = [
    "title" => $title,
    "instructor" => $instructor,
    "time" => $time,
    "location" => $target_file,
    'price' => $price
];

$file_path = '../models/course_information.json';
$json_data = file_get_contents($file_path);
$course_data = json_decode($json_data, true);
$course_data[] = $course_information;
$json_data = json_encode($course_data);
file_put_contents($file_path, $json_data);
header('location: ../views/view_courses.php');