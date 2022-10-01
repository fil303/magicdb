<?php
namespace Magicdb\Magicdb;

use Illuminate\Support\Facades\Facade;

class Magic extends Facade
{
     /**
     * The Object Name Of Service Container.
     *
     * @return Object Name Of Service Container
     */
     
	public static function getFacadeAccessor()
    {
        return "MagicDB";
    } 
}