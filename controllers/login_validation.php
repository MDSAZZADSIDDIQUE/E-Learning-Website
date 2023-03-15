<?php
session_start();

include "validation_functions.php";

$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];

$_SESSION['emailAddress'] = $emailAddress;
$_SESSION['password'] = $password;

$invalidLogin = false;

//Email Address Validation
if (empty($emailAddress) || $emailAddress == "") {
    $_SESSION['emptyEmailAddress'] = true;
    $invalidLogin = true;
}

//Password Validation
if (empty($password) || $password == "") {
    $_SESSION['emptyPassword'] = true;
    $invalidLogin = true;
} elseif (!validatePassword($password)) {
    $_SESSION['invalidPassword'] = true;
    $invalidLogin = true;
}

if ($invalidLogin) {
    header('location: ../views/login.php');
} else {
    $file_path = '../models/user_information.json';
    $json_data = file_get_contents($file_path);
    $user_data = json_decode($json_data, true);
    foreach ($user_data as $user) {
        if ($user['emailAddress'] === $emailAddress && $user['password'] === $password) {
            if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == "remember_me") {
                setcookie('emailAddress', $user['emailAddress'], time() + 3600, '/');
                setcookie('password', $user['password'], time() + 3600, '/');
            } else {
                setcookie('emailAddress', $user['emailAddress'], time() - 3600, '/');
                setcookie('password', $user['password'], time() - 3600, '/');
            }
            header('location: ../views/dashboard.php');
            $invalidLogin = false;
            $_SESSION['authorized'] = true;
            break;
        }
        $invalidLogin = true;
    }
    if($invalidLogin) {
        header('location: ../views/login.php');
        $_SESSION['passwordDoesNotMatch'] = true;
    }
}
