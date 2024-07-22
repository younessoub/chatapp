<?php
session_start();

require 'models/userModel.php';

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
  } elseif (usernameExists($database, $username)) {
    $usernameErr = "This username is taken";
  }

  // email validation
  if (empty($email)) {
    $emailErr = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "The email is not valid";
    echo $emailErr;
  } elseif (emailExists($database, $email)) {
    $emailErr = "This Email is already used";
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

    $affectedRows = createUser($database, $username, $email, $password);

    if ($affectedRows > 0) {
      $_SESSION['SIGNUP_SUCCESS'] = 'Your account has been created successfully, please Sign in';
      header('Location: ?page=login');
    } else {
      $signUpErr = 'An error has occured, Please try again later.';
      require 'views/signup.php';
    }

  } else {
    // show the form with errors
    require 'views/signup.php';
  }

} else {

  require 'views/signup.php';
}