<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface DeliveryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Delivery 
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
 	 * @param delivery primary key
 	 */
	public function delete($delivery_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Delivery delivery
 	 */
	public function insert($delivery);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Delivery delivery
 	 */
	public function update($delivery);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySupplier($value);

	public function queryByDate($value);

	public function queryByVerifiedBy($value);

	public function queryByStatus($value);


	public function deleteBySupplier($value);

	public function deleteByDate($value);

	public function deleteByVerifiedBy($value);

	public function deleteByStatus($value);


}
?>