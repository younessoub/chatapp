<?php
if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');
} else {
  require 'models/roomModel.php';
  $rooms = getRooms($database);
  require 'views/rooms.php';
}
