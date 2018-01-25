<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface SubcategoryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Subcategory 
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
 	 * @param subcategory primary key
 	 */
	public function delete($scategory_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Subcategory subcategory
 	 */
	public function insert($subcategory);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Subcategory subcategory
 	 */
	public function update($subcategory);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCategoryName($value);

	public function queryByScategoryName($value);

	public function queryByStatus($value);


	public function deleteByCategoryName($value);

	public function deleteByScategoryName($value);

	public function deleteByStatus($value);


}
?>