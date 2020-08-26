<?php

namespace app\libs;

class Core {
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct() {
		$url = $this->get_url_params();

		// CONTROLLER
		$controller_name = $this->parse_url_value($url[0]);

		if (file_exists("../app/controllers/{$controller_name}.php")) {
			$this->controller = $controller_name;
			unset($url[0]);
		}

		require_once "../app/controllers/{$this->controller}.php";

		$controller_class = "\app\controllers\\{$this->controller}";
		$this->controller = new $controller_class;

		// METHOD
		if (isset($url[1])) {
			$method_name = $this->parse_url_value($url[1]);
			if (method_exists($this->controller, $method_name)) {
				$this->method = $method_name;
				unset($url[1]);
			}
		}

		// PARAMS
		if ($url) {
			$this->params = array_values($url);
		}

		// CALL CONTROLLER'S METHOD SENDING PARAMS ARRAY
		call_user_func_array(
			[
				$this->controller,
				$this->method
			],
			$this->params
		);
	}

	private function get_url_params() {
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}

	private function parse_url_value($value) {
		$value = str_replace('-', ' ', $value);
		$value = ucwords($value);
		$value = str_replace(' ', '', $value);
		return $value;
	}
}