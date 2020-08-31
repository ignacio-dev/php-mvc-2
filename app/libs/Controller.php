<?php

namespace app\libs;

class Controller {
	
	const MODELS_PATH = '../app/models';
	const HELPERS_PATH = '../app/helpers';
	const VIEWS_PATH = '../app/views';

	protected $session;
	protected $user;
	private $template_engine;

	public function __construct() {	
		$this->session = new \app\libs\Session();
		$this->user = new \app\libs\User();
		$this->template_engine = new \app\libs\Template_Engine(self::VIEWS_PATH);
	}

	protected function model($model) {
		$file_path = self::MODELS_PATH."/{$model}.php";
		
		if (file_exists($file_path)) {
			require_once $file_path;
			$model = "\\app\\models\\{$model}";
			return new $model;
		}
		else {
			$this->fatal_error('Model not found.');
		}
	}

	protected function helper($helper, $data=[]) {
		$file_path = self::HELPERS_PATH."/{$helper}.php";
		
		if (file_exists($file_path)) {
			require_once $file_path;
			$helper = "\\app\\helpers\\{$helper}";
			return new $helper($data);
		}
		else {
			$this->fatal_error('Helper not found.');
		}
	}

	protected function view($view, $data=[]) {
		$view .= Template_Engine::TEMPLATE_EXTENSION;
		$file_path = self::VIEWS_PATH."/{$view}";

		if (file_exists($file_path)) {
			$this->template_engine->render($view, $data);
			exit();
		}
		else {
			$this->fatal_error('View not found.');
		}
	}

	protected function fatal_error($msg) {
		die($msg);
	}

}