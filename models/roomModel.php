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
  $rowCount = $statement->rowCount();
  return $rowCount > 0 ? true : false;
}

function getRooms($database)
{
  $sql = "SELECT * FROM rooms;";
  $statement = $database->prepare($sql);
  $statement->execute();
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