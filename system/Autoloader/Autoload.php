<?php 

class Autoload {
	
	protected $prefixes = [];

	public function register() {
		spl_autoload_extensions('.php,.inc');

		spl_autoload_register([$this, 'loadClass'], true, true);

		spl_autoload_register(function ($class) {
			/*if ( ! array_key_exists($class, $config)) {
				return false;
			}*/
			
			// echo $class;

			// include_once BASEPATH . DIRECTORY_SEPARATOR . $class;
		},true, true);
	}

	public function loadClass($class) {
		$class = trim($class, '\\');
		$class = str_ireplace('.php', '', $class);
		$mapped_file = $this->loadInNamespace($class);
		if ( ! $mapped_file) {
			$mapped_file = $this->loadLegacy($class);
		}
		return $mapped_file;
	}

	protected function loadInNamespace($class) {
		if (strpos($class, '\\') === false) {
			return false;
		}
		$this->prefixes[$class] = array(BASEPATH . DIRECTORY_SEPARATOR . $class);
		foreach ($this->prefixes as $namespace => $directories) {
			if (is_string($directories)) {
				$directories = [$directories];
			}
			foreach ($directories as $directory) {
				if (strpos($class, $namespace) === 0) {
					$filePath = $directory . str_replace('\\', '/', substr($class, strlen($namespace))) . '.php';
					$filename = $this->requireFile($filePath);
					if ($filename) {
						return $filename;
					}
				}
			}
		}
		return false;
	}

	protected function loadLegacy($class) {
		if (strpos('\\', $class) !== false) {
			return false;
		}
		$paths = [
			APPPATH.'Controllers/',
			APPPATH.'Libraries/',
			APPPATH.'Models/',
		];
		$class = str_replace('\\', '/', $class).'.php';
		foreach ($paths as $path) {
			if ($file = $this->requireFile($path.$class)) {
				return $file;
			}
		}
		return false;
	}

	protected function requireFile($file) {
		 // echo $file." > ".(file_exists($file) ? "true" : "false") . "<br>";
		if (file_exists($file)) {
			require_once $file;
			return $file;
		} else {
			throw new \Exception("Error 404", 1);			
		}
		return false;
	}
}