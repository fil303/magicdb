<?php
namespace Magicdb\Magicdb\Repository;

use Illuminate\Support\Facades\DB;

class Repository
{
	private static $table;

	public function __construct($table){
		static::$table = $table;		
	}

	public function insert($data)
	{
		return DB::table(static::$table)->insert($data);
	}
	public function update($id, $data)
	{
		return DB::table(static::$table)->where("id",$id)->update($data);
	}
	public function delete($id)
	{
		return DB::table(static::$table)->delete($id);
	}
	public function get()
	{
		return DB::table(static::$table)->get();
	}
	public function getBy($value, $column)
	{
		return DB::table(static::$table)->where($column,$value)->first();
	}

} 