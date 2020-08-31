<?php

namespace app\controllers;

class Not_Found extends \app\libs\Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->view('/errors/404', [
			'subtitle' => 'Page not found'
		]);
	}

}