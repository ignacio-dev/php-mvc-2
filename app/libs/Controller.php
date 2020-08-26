<?php

namespace app\libs;

class Controller {
	protected $session;
	protected $user;

	public function __construct() {
		$this->session = new \app\libs\Session();
		$this->user = new \app\libs\User();
	}

	protected function model($model) {
		$path = "../app/models/{$model}.php";

		if (file_exists($path)) {
			require_once $path;
			return new $model;
		}
		else {
			$this->fatal_error('Model not found.');
		}
	}

	protected function view($view, $data=[]) {
		$path = "../app/views/{$view}.php";

		if (file_exists($path)) {
			require_once $path;
		}
		else {
			$this->fatal_error('View not found.');
		}
	}

	protected function helper($helper, $data=[]) {
		$path = "../app/helpers/{$helper}.php";
		
		if (file_exists($path)) {
			require_once $path;
			return new $helper($data);
		}
		else {
			$this->fatal_error('Helper not found.');
		}
	}

	protected function fatal_error($msg) {
		die($msg);
	}
}