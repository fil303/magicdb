<?php
namespace Magicdb\Magicdb;

use Illuminate\Support\Facades\Facade;

class Magic extends Facade
{
	public static function getFacadeAccessor()
    {
        return "MagicDB";
    } 
}