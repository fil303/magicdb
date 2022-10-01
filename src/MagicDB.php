<?php

namespace Magicdb\Magicdb;

use Magicdb\Magicdb\DB\MQuery;

class MagicDB extends MQuery
{
	/**
     * Database Table Get Stored Here.
     *
     * @var $tableName 
     * @type string
     */
	protected static $tableName;
	
	/**
     * Database Table Set From Here.
     *
     * @var table
     * @type string
     * Database table 
     */
	public static function setTable($table)
	{
		static::$tableName = $table;
	}
	
}

