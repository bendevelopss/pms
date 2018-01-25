<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface CategoryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Category 
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
 	 * @param category primary key
 	 */
	public function delete($category_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Category category
 	 */
	public function insert($category);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Category category
 	 */
	public function update($category);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCategoryName($value);

	public function queryByStatus($value);


	public function deleteByCategoryName($value);

	public function deleteByStatus($value);


}
?>