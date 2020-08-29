<?php

namespace app\libs;

class Template_Engine {
	
	public function __construct($views_path) {
		$this->loader = new \Twig\Loader\FilesystemLoader($views_path);
		$this->environment = new \Twig\Environment($this->loader);
	}

	public function render($view, $data) {
		echo $this->environment->load($view)->render($data);
	}

}