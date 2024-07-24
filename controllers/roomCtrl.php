<?php
if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');
} else {
  if (isset($_GET['id'])) {
    $roomId = $_GET['id'];
  } else {
    header('Location: /');
  }

  require 'models/roomModel.php';
  // get room info
  $room = getRoominfo($database, $roomId);
  require 'views/room.php';
}