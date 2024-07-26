<?php
if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');
} else {


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
      $createdRoomId = createRoom($database, $name, $description, $imgPath, $userId);

      if (!$createdRoomId) {
        $Err = 'An error has occured please try again later';
        require '../src/views/create-room.view.php';
      } else {

        header('Location: /room?id=' . $createdRoomId);
      }
    } else {
      // render the form with errors
      require '../src/views/create_room.view.php';
    }

  } else {

    require '../src/views/create_room.view.php';
  }

}