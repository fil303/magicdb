<?php
namespace Magicdb\Magicdb;

include_once (__DIR__.'/helper/magicdb.php');

use Magicdb\Magicdb\MagicDB;
use Illuminate\Support\ServiceProvider;

class MagicdbServiceProvider extends ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register()
	{
		$this->app->singleton('MagicDB',function(){
			return new MagicDB();
		});
	}
}