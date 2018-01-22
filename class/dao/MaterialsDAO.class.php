<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface MaterialsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Materials 
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
 	 * @param material primary key
 	 */
	public function delete($material_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Materials material
 	 */
	public function insert($material);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Materials material
 	 */
	public function update($material);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCode($value);

	public function queryByCategory($value);

	public function queryByScategoryName($value);

	public function queryByDescription($value);

	public function queryByBrandName($value);

	public function queryByColor($value);

	public function queryByPackage($value);

	public function queryByUnitMeasurement($value);

	public function queryByAbbre($value);

	public function queryByQuantity($value);

	public function queryByPrice($value);

	public function queryByStatus($value);


	public function deleteByCode($value);

	public function deleteByCategory($value);

	public function deleteByScategoryName($value);

	public function deleteByDescription($value);

	public function deleteByBrandName($value);

	public function deleteByColor($value);

	public function deleteByPackage($value);

	public function deleteByUnitMeasurement($value);

	public function deleteByAbbre($value);

	public function deleteByQuantity($value);

	public function deleteByPrice($value);

	public function deleteByStatus($value);


}
?>