<?php

function createUser($database, $username, $email, $password)
{
  $statement = $database->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?);");
  $result = $statement->execute([$username, $email, $password]);
  return $result;
}