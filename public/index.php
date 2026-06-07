<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

require __DIR__ ."/../app/Routes/routes.php";