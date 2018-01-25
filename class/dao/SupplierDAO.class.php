<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface SupplierDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Supplier 
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
 	 * @param supplier primary key
 	 */
	public function delete($supplier_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Supplier supplier
 	 */
	public function insert($supplier);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Supplier supplier
 	 */
	public function update($supplier);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySuppName($value);

	public function queryByPhone($value);

	public function queryByFax($value);

	public function queryByEmail($value);

	public function queryByFirstname($value);

	public function queryByMiddlename($value);

	public function queryByLastname($value);

	public function queryByContact($value);

	public function queryByStreet($value);

	public function queryByCity($value);

	public function queryByStatus($value);


	public function deleteBySuppName($value);

	public function deleteByPhone($value);

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