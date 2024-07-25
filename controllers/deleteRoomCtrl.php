<?php

if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');

} elseif (!isset($_GET['id'])) {
  header('Location: /');
} else {

  require 'models/roomModel.php';
  $userRooms = getUserRooms($database, $_SESSION['USER']['id']);
  $roomToDelete = $_GET['id'];

  // check if user is authorized to delete the room

  foreach ($userRooms as $room) {

    if ($room['created_by'] === $_SESSION['USER']['id'] && $room['id'] == $roomToDelete) {
      deleteRoom($database, $roomToDelete); //delete path from database
      if (file_exists($room['image'])) { //delete the image from the uploads folder
        unlink($room['image']);
      }
    }
  }

  header('Location: /profile');

}