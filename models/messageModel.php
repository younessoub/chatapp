<?php

function getMessages($database, $roomId = 1)
{
  $sql = "SELECT * FROM messages WHERE room_id;";
  $statement = $database->prepare($sql);
  $statement->execute();
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}