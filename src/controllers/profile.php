<?php

if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');
} else {

  $userRooms = getUserRooms($database, $_SESSION['USER']['id']);

  // check for form submition
  if (isset($_GET['action']) && $_GET['action'] === 'update-image') {
    $imageErr = '';

    // check if a file was uploaded
    if (isset($_FILES['profile-image'])) {

      // check if the file is an image
      if (getimagesize($_FILES['profile-image']['tmp_name'])) {

        // delete image if user has an image
        if ($_SESSION['USER']['image']) {
          if (file_exists($_SESSION['USER']['image'])) {
            unlink($_SESSION['USER']['image']);
          }
        }
        // upload user image
        $imgPath = 'uploads/' . time() . $_FILES['profile-image']['name'];
        move_uploaded_file($_FILES['profile-image']['tmp_name'], $imgPath);

        // save the path in database
        $imageUpdated = updateImage($database, $imgPath, $_SESSION['USER']['id']);
        if ($imageUpdated) {
          $_SESSION['USER']['image'] = $imgPath;
        }

        // render the profile view
        header('Location: /profile');

      } else {
        $imageErr = 'The uploaded file is not an image';
        require '../src/views/profile.view.php';
      }

    } else {
      $imageErr = 'Please provide a valid image';
      require '../src/views/profile.view.php';
    }

  } elseif (isset($_GET['action']) && $_GET['action'] === 'delete-image') {
    $imageDeleted = updateImage($database, NULL, $_SESSION['USER']['id']);
    if ($imageDeleted) {
      if (file_exists($_SESSION['USER']['image'])) {
        unlink($_SESSION['USER']['image']);
      }
      $_SESSION['USER']['image'] = NULL;
      // render the profile view
      header('Location: /profile');

    }
  } else {
    // show profile page
    require '../src/views/profile.view.php';
  }
}