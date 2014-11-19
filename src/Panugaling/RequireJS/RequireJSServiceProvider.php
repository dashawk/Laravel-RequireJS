<?php namespace Panugaling\RequireJS;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class RequireJSServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	public function boot() {
		$this->package('panugaling/require-js');
		
		AliasLoader::getInstance()->alias('Require', 'Panugaling\RequireJS\RequireJS');
	}
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
