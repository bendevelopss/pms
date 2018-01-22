<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface PulloutDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pullout 
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
 	 * @param pullout primary key
 	 */
	public function delete($pullout_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pullout pullout
 	 */
	public function insert($pullout);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pullout pullout
 	 */
	public function update($pullout);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCustomer($value);

	public function queryByProject($value);

	public function queryByDate($value);

	public function queryByAcceptedBy($value);

	public function queryByStatus($value);


	public function deleteByCustomer($value);

	public function deleteByProject($value);

	public function deleteByDate($value);

	public function deleteByAcceptedBy($value);

	public function deleteByStatus($value);


}
?>