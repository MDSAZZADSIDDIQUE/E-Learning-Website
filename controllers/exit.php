<?php
session_start();
unset($_SESSION['emailAddress']);
unset($_SESSION['password']);
header('location: ../views/login.php');
?>