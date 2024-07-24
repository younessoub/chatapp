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
  $authorized = false;

  foreach ($userRooms as $room) {

    if ($room['created_by'] === $_SESSION['USER']['id'] && $room['id'] == $roomToDelete) {
      $authorized = true;
    }
  }

  if ($authorized) {
    deleteRoom($database, $roomToDelete);
  }

  header('Location: /profile');

}