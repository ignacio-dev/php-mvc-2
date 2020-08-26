<?php

switch (APP_MODE) {
	case 'dev':
		$db_host = '';
		$db_user = '';
		$db_pass = '';
		$db_name = '';
		$db_port = '3306';
		break;

	case 'stage':
		$db_host = '';
		$db_user = '';
		$db_pass = '';
		$db_name = '3306';
		break;
	
	default:
		$db_host = '';
		$db_user = '';
		$db_pass = '';
		$db_name = '3306';
		break;
}

define('DB_HOST', $db_host);
define('DB_USER', $db_user);
define('DB_PASS', $db_pass);
define('DB_NAME', $db_name);
define('DB_PORT', $db_port);