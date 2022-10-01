<?php
namespace Magicdb\Magicdb\DB;

use Magicdb\Magicdb\MagicDB;
use Magicdb\Magicdb\Repository\Repository;

class MQuery
{
	/**
     * The Object Of Repository.
     *
     * @var Magicdb\Magicdb\Repository\Repository
     */
	private $repository; 

	/**
     * The Construct .
     *
     * @stored Object Of Repository
     */
	public function __construct(){
		$this->repository = new Repository(static::$tableName);
	}


	/**
     * Insert In Database Table.
     *
     * @var data "Array"
     * @return Object
     */
	
	public function insert($data)
	{
		return $this->repository->insert($data);
	}

	/**
     * Update Row Of Database Table.
     *
     * @var id "integer|string"
     * @return Object
     */

	public function update($id, $data)
	{
		return $this->repository->update($id, $data);
	}
	
	/**
     * Delete In Database Table.
     *
     * @var id "integer|string"
     * @return boolean
     */

	public function delete($id)
	{
		return $this->repository->delete($id);
	}
	
	/**
     * Object Of Database Table.
     *
     * @return Object
     */
	
	public function get()
	{
		return $this->repository->get();
	}
	
	/**
     * Get Of Database Table.
     *
     * @var value "integer|string"
     * @return Object
     */

	public function getBy($value, $column = "id")
	{
		return $this->repository->getBy($value, $column);
	}



	/**
     * Undefined Method Handler.
     *
     * @var method "String"
     * @var parameters "Array"
     */

    public function __call($method, $parameters)
    {
		static::setTable($parameters['table']);
		unset($parameters['table']);
		$this->repository = new Repository(static::$tableName);
		$method = substr($method , 2);
		$this->$method(...$parameters);	
    }

	/**
     * For Get This Class Object.
     *
     * @var table "String"
     * @return Magicdb\Magicdb\MagicDB 
     */

	public function magic($table)
	{
		static::setTable($table);
		return new MagicDB;
	}

}
