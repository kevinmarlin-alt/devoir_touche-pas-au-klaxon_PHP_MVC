<?php

if (
    php_sapi_name() === 'cli-server'
    &&
    is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'])['path'])
) {
    return false;
}

require __DIR__ . '/index.php';