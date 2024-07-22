<?php

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

  // check for errors
  if (empty($loginErr) && empty($emailErr) && empty($passwordErr)) {
    // getting the user info to store it in the session
    $user = getUserByEmail($database, $email);
    $_SESSION['USER'] = [
      'id' => $user['id'],
      'username' => $user['username'],
      'email' => $user['email']
    ];

    require 'views/home.php';
  } else {
    // show form with errors
    require 'views/login.php';
  }
} else {
  require 'views/login.php';
}