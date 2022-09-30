<?php
namespace Magicdb\Magicdb\DB;

use Magicdb\Magicdb\MagicDB;
use Magicdb\Magicdb\Repository\Repository;

class MQuery
{
	private $repository; 
	public function __construct(){
		$this->repository = new Repository(static::$tableName);
	}



	public function insert($data)
	{
		return $this->repository->insert($data);
	}
	public function update($id, $data)
	{
		return $this->repository->update($id, $data);
	}
	public function delete($id)
	{
		return $this->repository->delete($id);
	}
	public function get()
	{
		return $this->repository->get();
	}
	public function getBy($value, $column = "id")
	{
		return $this->repository->getBy($value, $column);
	}





    public function __call($methid, $parameters)
    {
		static::setTable($parameters['table']);
		unset($parameters['table']);
		$this->repository = new Repository(static::$tableName);
		$method = substr($methid , 2);
		$this->$method(...$parameters);	
    }

	public function magic($table)
	{
		static::setTable($table);
		return new MagicDB;
	}

}
