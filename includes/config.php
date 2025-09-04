<?php
// Configuration settings for the application

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', ''); // Update this with your MySQL password
define('DB_NAME', 'quiz_app');

// Path to the root directory of your project
define('BASE_URL', 'http://localhost/quiz-app'); // Update this if deployed in a subfolder

// Session settings
session_start();

// Display errors for development (should be disabled in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Timezone setting
date_default_timezone_set('Asia/Dhaka'); // Change if necessary for your timezone

?>
