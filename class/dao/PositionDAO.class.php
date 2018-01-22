<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface PositionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Position 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param position primary key
 	 */
	public function delete($position_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Position position
 	 */
	public function insert($position);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Position position
 	 */
	public function update($position);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPositionName($value);

	public function queryByStatus($value);


	public function deleteByPositionName($value);

	public function deleteByStatus($value);


}
?>