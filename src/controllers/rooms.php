<?php
if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');
} else {
  $rooms = getRooms($database);
  require '../src/views/rooms.view.php';
}
