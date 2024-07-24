<?php
session_start();

try {
  // Connecting to database
  require 'config/constants.php';
  require 'config/dbConnect.php';

  // Router
  if (isset($_SERVER['PATH_INFO'])) {
    $sitePage = explode('/', $_SERVER['PATH_INFO'])[1];
    if ($sitePage === 'signup') {
      require 'controllers/signupCtrl.php';
    } elseif ($sitePage === 'login') {
      require 'controllers/loginCtrl.php';
    } elseif ($sitePage === 'profile') {
      require 'controllers/profileCtrl.php';
    } elseif ($sitePage === 'create-room') {
      require 'controllers/createRoomCtrl.php';
    } elseif ($sitePage === 'room') {
      require 'controllers/roomCtrl.php';
    } elseif ($sitePage === 'rooms') {
      require 'controllers/roomsCtrl.php';
    } elseif ($sitePage === 'delete-room') {
      require 'controllers/deleteRoomCtrl.php';
    } else {
      echo 'Page Not Found';
    }
  } else {
    require 'controllers/homeCtrl.php';
  }
} catch (Exception $ex) {
  die('Error : ' . $ex->getMessage());
}