<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface PurchaseCartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PurchaseCart 
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
 	 * @param purchaseCart primary key
 	 */
	public function delete($code);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PurchaseCart purchaseCart
 	 */
	public function insert($purchaseCart);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PurchaseCart purchaseCart
 	 */
	public function update($purchaseCart);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPoNo($value);

	public function queryBySupplier($value);

	public function queryByMaterialNo($value);

	public function queryByBrandName($value);

	public function queryByCategory($value);

	public function queryByScategoryName($value);

	public function queryByDescription($value);

	public function queryByColor($value);

	public function queryByPackage($value);

	public function queryByUnitMeasurement($value);

	public function queryByAbbre($value);

	public function queryByQuantity($value);

	public function queryByStatus($value);


	public function deleteByPoNo($value);

	public function deleteBySupplier($value);

	public function deleteByMaterialNo($value);

	public function deleteByBrandName($value);

	public function deleteByCategory($value);

	public function deleteByScategoryName($value);

	public function deleteByDescription($value);

	public function deleteByColor($value);

	public function deleteByPackage($value);

	public function deleteByUnitMeasurement($value);

	public function deleteByAbbre($value);

	public function deleteByQuantity($value);

	public function deleteByStatus($value);


}
?>