<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface UnitmeasurementDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Unitmeasurement 
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
 	 * @param unitmeasurement primary key
 	 */
	public function delete($unit_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Unitmeasurement unitmeasurement
 	 */
	public function insert($unitmeasurement);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Unitmeasurement unitmeasurement
 	 */
	public function update($unitmeasurement);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCategory($value);

	public function queryByType($value);

	public function queryByUnitMeasurment($value);

	public function queryByAbbreviation($value);

	public function queryByStatus($value);


	public function deleteByCategory($value);

	public function deleteByType($value);

	public function deleteByUnitMeasurment($value);

	public function deleteByAbbreviation($value);

	public function deleteByStatus($value);


}
?>