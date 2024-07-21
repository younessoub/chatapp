<?php

try {
  if (isset($_GET['page'])) {
    if ($_GET['page'] === 'signup') {
      require 'controllers/signupCtrl.php';
    } elseif ($_GET['page'] === 'login') {
      require 'controllers/loginCtrl.php';
    } else {
      echo 'Page Not Found';
    }
  } else {
    require 'controllers/homeCtrl.php';
  }
} catch (Exception $ex) {
  die('Error : ' . $ex->getMessage());
}