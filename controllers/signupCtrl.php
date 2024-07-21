<?php

if (isset($_GET['action']) && $_GET['action'] === 'create-user') {

  $username = htmlspecialchars($_POST['username']) ?? '';
  $email = htmlspecialchars($_POST['email']) ?? '';
  $password = htmlspecialchars($_POST['password']) ?? '';
  $passwordRepeat = htmlspecialchars($_POST['passwordRepeat']) ?? '';


  $usernameErr = $emailErr = $passwordErr = $PasswordRepeatErr = "";

  // username validation
  if (empty($username)) {
    $usernameErr = "Username is required";
  } elseif (!preg_match('/^[a-zA-Z]+$/', $username)) {
    $usernameErr = "Username should contain only letters";
  }

  // email validation
  if (empty($email)) {
    $emailErr = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "The email is not valid";
    echo $emailErr;
  }

  // password Validation
  if (empty($password)) {
    $passwordErr = "Password is required";
  } elseif (strlen($password) < 8) {
    $passwordErr = "The password should be atleast 8 characters long";
  } elseif ($password !== $passwordRepeat) {
    $PasswordRepeatErr = "Passwords do not match";
  }

  // check for errors
  if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($PasswordRepeatErr)) {
    // Create user in database
    require 'models/userModel.php';
    $affectedRows = createUser($database, $username, $email, $password);
    if ($affectedRows > 0) {
      require 'views/login.php';
    } else {
      $signUpErr = 'An error has occured while creating the account, Please try again later';
      require 'views/signup.php';
    }

  } else {
    require 'views/signup.php';
  }


} else {
  require 'views/signup.php';
}