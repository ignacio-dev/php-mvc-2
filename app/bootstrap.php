<?php

// Composer
require_once '../vendor/autoload.php';

// Config
require_once __DIR__.'/config/index.php';

// Libs
spl_autoload_register(function($class) {
	$class = explode('\\', $class);
	$class = end($class);
    require __DIR__."/libs/{$class}.php";
});