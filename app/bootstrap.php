<?php

// Config
require_once __DIR__.'/config/index.php';

// Third Party
require_once '../vendor/autoload.php';

// Libs
spl_autoload_register(function($class) {
	$class = end(explode('\\', $class));
    require __DIR__."/libs/{$class}.php";
});