<?php
session_start();

try {
  require '../src/models/room_model.php';
  require '../src/models/message_model.php';
  require '../src/models/user_model.php';
  require '../src/functions.php';
  // Connecting to database
  require '../config/constants.php';
  require '../config/dbConnect.php';

  $path = parse_url($_SERVER['REQUEST_URI'])['path'];

  // Router
  $routes = [
    '/' => '../src/controllers/home.php',
    '/login' => '../src/controllers/login.php',
    '/signup' => '../src/controllers/signup.php',
    '/profile' => '../src/controllers/profile.php',
    '/room' => '../src/controllers/room.php',
    '/rooms' => '../src/controllers/rooms.php',
    '/create-room' => '../src/controllers/create_room.php',
    '/delete-room' => '../src/controllers/delete_room.php'
  ];

  if (array_key_exists($path, $routes)) {
    require $routes[$path];
  } else {
    http_response_code(404);
    require '../src/views/404.view.php';
  }
} catch (Exception $ex) {
  http_response_code(500);
  require '../src/views/500.view.php';
}