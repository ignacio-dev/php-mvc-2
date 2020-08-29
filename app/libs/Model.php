<?php

namespace app\libs;

class Model {
	
	protected $db;

	public function __construct() {
		$this->db = new app\libs\Database();
	}
}