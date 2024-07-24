<?php

function getMessages($database, $roomId = 1)
{
  $sql = "SELECT * FROM users JOIN messages ON users.id = messages.sender_id AND room_id = ?;";
  $statement = $database->prepare($sql);
  $statement->execute([$roomId]);
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}

function addMessage($database, $roomId, $userId, $message)
{
  $sql = "INSERT INTO messages (room_id, sender_id, content) VALUES(?, ?, ?);";
  $statement = $database->prepare($sql);
  $statement->execute([$roomId, $userId, $message]);
  $rowCount = $statement->rowCount();
  return $rowCount > 0 ? true : false;
}