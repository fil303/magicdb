<?php

namespace Magicdb\Magicdb;

use Magicdb\Magicdb\DB\MQuery;

class MagicDB extends MQuery
{
	protected static $tableName;

	public static function setTable($table)
	{
		static::$tableName = $table;
	}
	
}

