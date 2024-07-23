<?php
if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');
} else {

  require 'models/roomModel.php';

  // check if user submitted the form otherwise render the form
  if (!empty($_POST)) {

    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_FILES['image'] ?? '';
    $userId = $_SESSION['USER']['id'];

    $nameErr = $descriptionErr = $imageErr = $Err = "";

    // validate name
    if (empty($name)) {
      $nameErr = 'Please provide a name for the room';
    } elseif (roomNameTaken($database, $name)) {
      $nameErr = 'The room name is already taken';
    }

    // validate description
    if (empty($description)) {
      $descriptionErr = "Please provide a description for the room";
    }

    // validate image
    if (empty($image['tmp_name'])) {
      $imageErr = "Please provide an image for the room";
    } elseif (!getimagesize($image['tmp_name'])) {
      $imageErr = "Please provide a valid image";
    }

    // validate user id
    if ($userId === '') {
      $Err = "Error while getting user id";
    }

    // checking for errors
    if (empty($nameErr) && empty($descriptionErr) && empty($imageErr) && empty($userIdErr)) {

      // upload user image
      $imgPath = 'uploads/' . time() . $image['name'];
      move_uploaded_file($image['tmp_name'], $imgPath);

      // save it to database
      $roomCreated = createRoom($database, $name, $description, $imgPath, $userId);
      if (!$roomCreated) {
        $Err = 'An error has occured please try again later';
        require 'views/create-room.php';
      } else {
        require 'views/create-room.php';
      }
    } else {
      // render the form with errors
      require 'views/create-room.php';
    }

  } else {

    require 'views/create-room.php';
  }

}