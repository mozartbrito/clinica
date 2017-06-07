<?php 

class ConfigPath {
	
	public static $preg = array("\\","/");

	public static $constantes = "App/Config/ConfigPath";

	public static $system = "System";

	public static $application = "App";

	public static $namespace = [
		"aplication" => "App"
	];

	public static function define($key, $value) {
		define($key,self::barderInDirectories($value));
	}

	public static function barderInDirectories($value) {
		return str_replace(self::$preg,DIRECTORY_SEPARATOR,$value);
	}
}