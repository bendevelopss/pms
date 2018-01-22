<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface SampleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Sample 
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
 	 * @param sample primary key
 	 */
	public function delete($no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Sample sample
 	 */
	public function insert($sample);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Sample sample
 	 */
	public function update($sample);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUser($value);

	public function queryByPass($value);

	public function queryByPosition($value);

	public function queryByStatus($value);

	public function queryByAccountStatus($value);


	public function deleteByUser($value);

	public function deleteByPass($value);

	public function deleteByPosition($value);

	public function deleteByStatus($value);

	public function deleteByAccountStatus($value);


}
?>