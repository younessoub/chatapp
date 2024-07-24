<?php
if (!isset($_SESSION['USER'])) {
  // redirect user to login page if not loged in
  header('Location: /login');
} else {
  if (isset($_GET['id'])) {
    $roomId = $_GET['id'];
    require 'models/roomModel.php';
    require 'models/messageModel.php';

    // get room info
    $room = getRoominfo($database, $roomId);
    // get messages and their senders info
    $messages = getMessages($database, $roomId);
    $messages = array_reverse($messages);

    if (isset($_GET['action']) && $_GET['action'] === 'add-message') {
      $message = $_POST['message'] ?? '';
      $message = trim(htmlspecialchars($message));

      if (!empty($message)) {
        addMessage($database, $roomId, $_SESSION['USER']['id'], $message);
        header("Location: /room?id=$roomId");
        die();
      }
    }

    require 'views/room.php';

  } else {
    header('Location: /');
  }
}