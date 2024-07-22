<?php

if (isset($_SESSION['USER'])) {
  require 'views/home.php';
} else {
  header('Location: ?page=login');
}