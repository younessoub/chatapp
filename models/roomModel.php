<?php

function roomNameTaken($database, $name)
{
  $sql = "SELECT * FROM rooms WHERE name = ?;";
  $statement = $database->prepare($sql);
  $statement->execute([$name]);
  $row = $statement->fetch(PDO::FETCH_ASSOC);
  return empty($row) ? false : true;
}

function createRoom($database, $name, $description, $imgPath, $userId)
{
  $sql = "INSERT INTO rooms (name, description, image, created_by) VALUES (?, ?, ?,?);";
  $statement = $database->prepare($sql);
  $statement->execute([$name, $description, $imgPath, $userId]);
  $roomId = $database->lastInsertId();
  return $roomId;
}
function deleteRoom($database, $roomToDelete)
{
  $sql = "DELETE FROM rooms WHERE id = ?";
  $statement = $database->prepare($sql);
  $statement->execute([$roomToDelete]);
  $rowCount = $statement->rowCount();
  return $rowCount > 0 ? true : false;
}

function getRooms($database, $limit = 12, $offset = 12)
{
  $sql = "select rooms.* , COUNT(room_id) as messages_num from rooms JOIN messages on rooms.id=messages.room_id GROUP BY room_id ORDER BY messages_num DESC LIMIT $limit";
  $statement = $database->prepare($sql);
  $statement->execute();
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}
function getUserRooms($database, $createdBy)
{
  $sql = "select * from rooms WHERE created_by = ?";
  $statement = $database->prepare($sql);
  $statement->execute([$createdBy]);
  $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}

function getRoomInfo($database, $roomId)
{
  $sql = "SELECT * FROM rooms WHERE id = ?;";
  $statement = $database->prepare($sql);
  $statement->execute([$roomId]);
  $row = $statement->fetch(PDO::FETCH_ASSOC);
  return $row;
}