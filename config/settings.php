<?php
// General Settings
define('APP_NAME', 'Online Quiz App');
define('APP_VERSION', '1.0');
define('APP_ENV', 'development'); // 'production' for live environment, 'development' for local

// Paths for assets
define('CSS_PATH', BASE_URL . '/assets/css/');
define('JS_PATH', BASE_URL . '/assets/js/');
define('IMAGES_PATH', BASE_URL . '/assets/images/');

// Email Settings (Example)
define('ADMIN_EMAIL', 'admin@quizapp.com');
define('SUPPORT_EMAIL', 'support@quizapp.com');
define('CONTACT_PHONE', '+1 (123) 456-7890');

// Enable or Disable Features
define('ENABLE_USER_REGISTRATION', true); // Set to false to disable user registration
define('ENABLE_QUIZ_TIMERS', true); // Set to false to disable timer in quizzes

// Session Timeout (in seconds)
define('SESSION_TIMEOUT', 3600); // 1 hour
define('SESSION_COOKIE_LIFETIME', 3600); // Cookie expires in 1 hour

// Security Settings
define('ENABLE_HTTPS', true); // Set to false if not using HTTPS
define('CROSS_SITE_REQUESTS', false); // Enable CSRF token for additional security

// Timezone settings
define('TIMEZONE', 'Asia/Dhaka'); // Adjust the timezone accordingly

// File Upload Settings
define('MAX_UPLOAD_SIZE', 10 * 1024 * 1024); // Max upload size: 10MB
define('UPLOAD_DIR', __DIR__ . '/../uploads/'); // Directory for storing file uploads

// Google Analytics Tracking ID (Optional)
define('GA_TRACKING_ID', 'UA-XXXXXX-X');



?>
