<?php

namespace app\libs;

class User {
	
	public $logged_in;

	public function __construct() {
		// ...
	}

	public function login() {
		$this->logged_in = TRUE;
	}

	public function logout() {
		$this->logged_in = FALSE;
	}
}