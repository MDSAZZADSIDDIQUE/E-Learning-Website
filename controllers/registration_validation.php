<?php
session_start();

//functions
include "validation_functions.php";

$gender = "";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}
$dob = $_POST['dob'];
$role = $_POST['role'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['emailAddress'] = $emailAddress;
$_SESSION['gender'] = $gender;
$_SESSION['dob'] = $dob;
$_SESSION['role'] = $role;
$_SESSION['password'] = $password;
$_SESSION['confirmPassword'] = $confirmPassword;

$invalidRegistration = false;

$userInformation = [
    "firstName" => $firstName,
    "lastName" => $lastName,
    "emailAddress" => $emailAddress,
    "gender" => $gender,
    "dob" => $dob,
    "role" => $role,
    "password" => $password,
    "confirmPassword" => $confirmPassword
];


//First Name Validation
if (empty($firstName) || $firstName == "") {
    $_SESSION['emptyFirstName'] = true;
    $invalidRegistration = true;
} else if (validateName($firstName)) {
    $_SESSION['invalidFirstName'] = true;
    $invalidRegistration = true;
}

//Last Name Validation
if (empty($lastName) || $lastName == "") {
    $_SESSION['emptyLastName'] = true;
    $invalidRegistration = true;
} elseif (validateName($lastName)) {
    $_SESSION['invalidLastName'] = true;
    $invalidRegistration = true;
}

//Email Address Validation
if (empty($emailAddress) || $emailAddress == "") {
    $_SESSION['emptyEmailAddress'] = true;
    $invalidRegistration = true;
}

//Gender Validation
if (empty($gender) || $gender == "") {
    $_SESSION['emptyGender'] = true;
    $invalidRegistration = true;
}

//DOB Validation
if (empty($dob) || $dob == "") {
    $_SESSION['emptyDOB'] = true;
    $invalidRegistration = true;
}

//Password Validation
if (empty($password) || $password == "") {
    $_SESSION['emptyPassword'] = true;
    $invalidRegistration = true;
} elseif (!validatePassword($password)) {
    $_SESSION['invalidPassword'] = true;
    $invalidRegistration = true;
} else {
    $password = $_POST['password'];
}

//Confirm Password Validation
if (empty($confirmPassword) || $confirmPassword == "") {
    $_SESSION['emptyConfirmPassword'] = true;
    $invalidRegistration = true;
} elseif (!validatePassword($confirmPassword)) {
    $_SESSION['invalidConfirmPassword'] = true;
    $invalidRegistration = true;
} else if($password != $confirmPassword) {
    $_SESSION['passwordMismatched'] = true;
    $invalidRegistration = true;
} else {
    $confirmPassword = $_POST['confirmPassword'];
}

if ($invalidRegistration) {
    header('location: ../views/registration.php');
} else {
    $file_path = '../models/user_information.json';
    $json_data = file_get_contents($file_path);
    $user_data = json_decode($json_data, true);
    $user_data[] = $userInformation;
    $json_data = json_encode($user_data);
    file_put_contents($file_path, $json_data);
    setcookie('emailAddress', $userInformation['emailAddress'], time() + 3600, '/');
    setcookie('password', $userInformation['password'], time() + 3600, '/');
    $_SESSION['authorized'] = true;
    header('location: ../views/dashboard.php');
}
