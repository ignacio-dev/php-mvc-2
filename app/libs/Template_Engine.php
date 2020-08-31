<?php

namespace app\libs;

class Template_Engine {
	
	const TEMPLATE_EXTENSION = '.html.twig';
	const MINIFY = TRUE;
	const GZIP = TRUE;

	private $output;

	public function __construct($views_path) {
		$this->loader = new \Twig\Loader\FilesystemLoader($views_path);
		$this->environment = new \Twig\Environment($this->loader);

		$this->file_timestamper = new \Twig\TwigFilter('file_timestamp', function($file) {
			$last_modified = @filemtime(PUBLIC_ROOT."/{$file}");
			if (empty($last_modified)) $last_modified = time();
			return "{$file}?v={$last_modified}";
		});

		$this->environment->addFilter($this->file_timestamper);
	}

	public function render($view, $data) {
		$this->output = $this->environment->load($view)->render($data);
		if (self::MINIFY) $this->minify();
		if (self::GZIP) ob_start("ob_gzhandler");
		echo $this->output;
	}

	private function minify() {
		$this->output = str_replace(
			["\n", "\t"],
			'',
			$this->output
		);
	}

}