<?php
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use App\Controllers\TravelController;


$test = new TravelController();
$test->showAvailableTravels();
