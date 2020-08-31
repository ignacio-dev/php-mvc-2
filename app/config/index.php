<?php

// .env
\Dotenv\Dotenv::createImmutable(__DIR__.'/../../')->load();

// SEO
define('SITE_NAME', 'My website');
define('SITE_URL', 'https://php-mvc');
define('SITE_DESCRIPTION', 'My description.');
define('SITE_TWITTER', '@mywebsite');

// Paths
define('APP_ROOT', dirname(__DIR__));
define('PUBLIC_ROOT', dirname(dirname(__DIR__)).'/public');