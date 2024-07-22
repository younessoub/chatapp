<?php
session_start();

require 'models/userModel.php';

if (isset($_GET['action']) && $_GET['action'] === 'log-user') {

  $email = htmlspecialchars($_POST['email']) ?? '';
  $password = htmlspecialchars($_POST['password']) ?? '';

  $loginErr = $emailErr = $passwordErr = "";

  if (empty($email)) {
    $emailErr = "Email is required";
  } elseif (empty($password)) {
    $passwordErr = "Password is required";
  } elseif (!emailExists($database, $email)) {
    $loginErr = "Wrong Email or Password";
  } elseif (!userExists($database, $email, $password)) {
    $loginErr = "Wrong Email or Password";
  }

  if (empty($loginErr) && empty($emailErr) && empty($passwordErr)) {
    // login user
    $_SESSION['USER'] = [
      'user'
    ];
  } else {
    // show form with errors
    require 'views/login.php';
  }
} else {
  require 'views/login.php';
}