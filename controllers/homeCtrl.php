<?php
require 'models/roomModel.php';
$rooms = getRooms($database);
require 'views/home.php';
