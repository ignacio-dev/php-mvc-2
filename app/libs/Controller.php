<?php

namespace app\libs;

class Controller {
	
	private $models_path = '../app/models';
	private $helpers_path = '../app/helpers';
	private $views_path = '../app/views';

	public function __construct() {	
		$this->session = new \app\libs\Session();
		$this->user = new \app\libs\User();
		$this->template_engine = new \app\libs\Template_Engine($this->views_path);
	}

	protected function model($model) {
		$file_path = "{$this->models_path}/{$model}";
		if (file_exists($file_path)) {
			require_once $file_path;
			return new $model;
		}
		else {
			$this->fatal_error('Model not found.');
		}
	}

	protected function helper($helper, $data=[]) {
		$file_path = "{$this->helpers_path}/{$helper}.php";
		
		if (file_exists($file_path)) {
			require_once $file_path;
			return new $helper($data);
		}
		else {
			$this->fatal_error('Helper not found.');
		}
	}

	protected function view($view, $data=[]) {
		$view .= '.html';
		$file_path = "{$this->views_path}/{$view}";

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