<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface CustomerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Customer 
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
 	 * @param customer primary key
 	 */
	public function delete($customer_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Customer customer
 	 */
	public function insert($customer);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Customer customer
 	 */
	public function update($customer);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByCustType($value);

	public function queryByCompName($value);

	public function queryByPhoneNum($value);

	public function queryByFax($value);

	public function queryByEmail($value);

	public function queryByFirstname($value);

	public function queryByMiddlename($value);

	public function queryByLastname($value);

	public function queryByContact($value);

	public function queryByStreet($value);

	public function queryByCity($value);

	public function queryByStatus($value);


	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByCustType($value);

	public function deleteByCompName($value);

	public function deleteByPhoneNum($value);

	public function deleteByFax($value);

	public function deleteByEmail($value);

	public function deleteByFirstname($value);

	public function deleteByMiddlename($value);

	public function deleteByLastname($value);

	public function deleteByContact($value);

	public function deleteByStreet($value);

	public function deleteByCity($value);

	public function deleteByStatus($value);


}
?>