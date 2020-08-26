<?php

namespace app\libs;

class Session {
	public function __construct() {
		session_start();
	}

	public function destroy() {
		session_destroy();
	}

}