<?php

function createUser($database, $username, $email, $password)
{
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?);";
  $statement = $database->prepare($sql);
  $statement->execute([$username, $email, $password]);
  $rowCount = $statement->rowCount();
  return $rowCount > 0 ? true : false;
}

function updateImage($database, $imgPath, $userId)
{
  $sql = "UPDATE users SET image = ? WHERE id = ?";
  $statement = $database->prepare($sql);
  $statement->execute([$imgPath, $userId]);
  $rowCount = $statement->rowCount();
  return $rowCount > 0 ? true : false;
}

function getUserByEmail($database, $email)
{
  $sql = "SELECT * FROM users WHERE email = ?;";
  $statement = $database->prepare($sql);
  $statement->execute([$email]);
  $row = $statement->fetch(PDO::FETCH_ASSOC);
  return $row;
}

function usernameExists($database, $username)
{
  $sql = "SELECT * FROM users WHERE username = ?;";
  $statement = $database->prepare($sql);
  $statement->execute([$username]);
  $row = $statement->fetch(PDO::FETCH_ASSOC);

  return empty($row) ? false : true;
}

function emailExists($database, $email)
{
  $sql = "SELECT * FROM users WHERE email = ?;";
  $statement = $database->prepare($sql);
  $statement->execute([$email]);
  $row = $statement->fetch(PDO::FETCH_ASSOC);

  return empty($row) ? false : true;
}

function userExists($database, $email, $password)
{
  $sql = "SELECT * FROM users WHERE email = ?;";
  $statement = $database->prepare($sql);
  $statement->execute([$email]);
  $row = $statement->fetch(PDO::FETCH_ASSOC);
  return $row['password'] === $password ? true : false;

}