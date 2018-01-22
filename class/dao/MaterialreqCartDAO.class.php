<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface MaterialreqCartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MaterialreqCart 
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
 	 * @param materialreqCart primary key
 	 */
	public function delete($code);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaterialreqCart materialreqCart
 	 */
	public function insert($materialreqCart);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaterialreqCart materialreqCart
 	 */
	public function update($materialreqCart);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByReqNo($value);

	public function queryByCustomer($value);

	public function queryByProject($value);

	public function queryByMaterialNo($value);

	public function queryByBrandName($value);

	public function queryByCategory($value);

	public function queryByScategoryName($value);

	public function queryByDescription($value);

	public function queryByColor($value);

	public function queryByPackage($value);

	public function queryByUnitMeasurement($value);

	public function queryByQuantity($value);

	public function queryByAbbre($value);

	public function queryByStatus($value);


	public function deleteByReqNo($value);

	public function deleteByCustomer($value);

	public function deleteByProject($value);

	public function deleteByMaterialNo($value);

	public function deleteByBrandName($value);

	public function deleteByCategory($value);

	public function deleteByScategoryName($value);

	public function deleteByDescription($value);

	public function deleteByColor($value);

	public function deleteByPackage($value);

	public function deleteByUnitMeasurement($value);

	public function deleteByQuantity($value);

	public function deleteByAbbre($value);

	public function deleteByStatus($value);


}
?>