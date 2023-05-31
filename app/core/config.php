<?php

if($_SERVER["SERVER_NAME"] == "localhost"){
    /* Database settings (local) */
    define("DB_HOST", "localhost");
    define("DB_NAME", "test_php_mvc_framework");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");

    define("ROOT", "http://localhost/projects/test-php-mvc-framework/public");
}
else {
    /* Database settings (production) */
    define("DB_HOST", "");
    define("DB_NAME", "");
    define("DB_USER", "");
    define("DB_PASSWORD", "");

    define("ROOT", "https://yourwebsite.com");
}

/* App settings */
define("APP_NAME", "Test website");
define("APP_DESCRIPTION", "Website made to test a PHP MVC Framework");

/* Debug mode (should be set to "true" to show errors during local development,
"false" if errors should not be shown and in production) */
define("DEBUG", true);