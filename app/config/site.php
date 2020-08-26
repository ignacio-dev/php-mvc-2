<?php

switch (APP_MODE) {
	case 'dev':
		$site_name = '';
		$site_url = '';
		break;

	case 'stage':
		$site_name = '';
		$site_url = '';
		break;
	
	default:
		$site_name = '';
		$site_url = '';
		break;
}

define('SITE_NAME', $site_name);
define('SITE_URL', $site_url);