<?php

namespace app\controllers;

class Home extends \app\libs\Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->view('home/index', [
			'message' => 'Welcome to my website!'
		]);
	}

}