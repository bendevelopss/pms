<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface EmployeeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Employee 
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
 	 * @param employee primary key
 	 */
	public function delete($emp_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Employee employee
 	 */
	public function insert($employee);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Employee employee
 	 */
	public function update($employee);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByFirstname($value);

	public function queryByMiddlename($value);

	public function queryByLastname($value);

	public function queryByPosition($value);

	public function queryByContact($value);

	public function queryByEmail($value);

	public function queryByStreet($value);

	public function queryByCity($value);

	public function queryByStatus($value);


	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByFirstname($value);

	public function deleteByMiddlename($value);

	public function deleteByLastname($value);

	public function deleteByPosition($value);

	public function deleteByContact($value);

	public function deleteByEmail($value);

	public function deleteByStreet($value);

	public function deleteByCity($value);

	public function deleteByStatus($value);


}
?>