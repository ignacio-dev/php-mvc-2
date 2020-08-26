<?php

require_once __DIR__.'/config/index.php';

spl_autoload_register(function($class) {
	$class = end(explode('\\', $class));
    require __DIR__."/libs/{$class}.php";
});