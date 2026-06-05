<?php
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use App\Repositories\TravelRepository;
use App\Models\Travel;


$test = new TravelRepository();

$test->deleteTravel(7);
echo "<br><br>";




