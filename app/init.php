<?php
require_once '../vendor/autoload.php';

// Debug: Cek autoload
echo "<!-- Composer autoload loaded -->";

// Test: Cek apakah User class bisa di-load
if (class_exists('App\Models\User')) {
    echo "<!-- User class FOUND via Composer -->";
} else {
    echo "<!-- User class NOT found -->";
    
    // Coba load manual
    $userFile = __DIR__ . '/Models/User.php';
    if (file_exists($userFile)) {
        require_once $userFile;
        echo "<!-- User class loaded manually -->";
    }
}

require_once "Database.php";
require_once "Core/Route.php";
require_once "Core/Controller.php";

new Database();

$GLOBALS['link'] = "/Framework/public/";