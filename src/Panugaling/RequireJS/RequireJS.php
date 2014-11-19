<?php namespace Panugaling\RequireJS;

use HTML;
use URL;
use Config;
use File;

abstract class RequireJS {
	
	public static function load($main = null, $attributes = array()) {
		if(!is_null($main)) {
			$attributes['data-main'] = URL::asset(Config::get('require-js::main') . $main);
		}

		self::createConfig();
		self::createMain($main);
		return HTML::script(self::getPath(), $attributes);
	}

	protected static function createMain($main) {
		$path = public_path(Config::get('require-js::main') . $main . '.js');
		
		if(!File::exists($path)) {
			$content = "(function (root) {\r\n\t'use strict';\r\n\r\n\trequire(['config'], function (Config) {\r\n\r\n\t\t//Load Main Configuration file\r\n\t\trequire.config(Config);\r\n\r\n\t\trequire(['" . Config::get('require-js::mainModule') . "'], function (" . Config::get('require-js::mainModule') . ") {\r\n\t\t\t" . Config::get('require-js::mainModule') . ".boot();\r\n\t\t});\r\n\r\n\t});\r\n}(this));";

			File::put($path, $content);
		}
	}

	protected static function createConfig() {
		$path = public_path(Config::get('require-js::main') . 'config.js');
		
		if(!File::exists($path)) {
			$content = "(function () {\r\n\t'use strict';\r\n\r\n\tdefine({\r\n\r\n\t\tpaths: {\r\n\t\t\tApp: ''\r\n\t\t},\r\n\r\n\t\tshim: {\r\n\r\n\t\t}\r\n\t});\r\n}(define));";
			File::put($path, $content);
		}
	}
	
	public static function boot($module = 'App', $procedure = null) {
		if (is_null($procedure)) {
			return self::module . '.start();';
		}
		
		return self::module . '.' . $procedure . '();';
	}
	
	protected static function getPath() {
		if(Config::has('require-js::useMinified') && Config::get('require-js::useMinified')) {
			$file = URL::asset(Config::get('require-js::requirejsPath') . 'require-min.js');
		} else {
			$file = URL::asset(Config::get('require-js::requirejsPath') . 'require.js');
		}

		return $file;
	}
}