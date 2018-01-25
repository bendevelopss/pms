<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface QuotationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Quotation 
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
 	 * @param quotation primary key
 	 */
	public function delete($quote_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Quotation quotation
 	 */
	public function insert($quotation);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Quotation quotation
 	 */
	public function update($quotation);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByCustomer($value);

	public function queryByProject($value);

	public function queryByDate($value);

	public function queryByDueDate($value);

	public function queryByAddress($value);

	public function queryByPhone($value);

	public function queryByEmail($value);

	public function queryBySalesPerson($value);

	public function queryByPreparedBy($value);

	public function queryByStatus($value);

	public function queryByTotalAmount($value);

	public function queryByBalance($value);


	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByCustomer($value);

	public function deleteByProject($value);

	public function deleteByDate($value);

	public function deleteByDueDate($value);

	public function deleteByAddress($value);

	public function deleteByPhone($value);

	public function deleteByEmail($value);

	public function deleteBySalesPerson($value);

	public function deleteByPreparedBy($value);

	public function deleteByStatus($value);

	public function deleteByTotalAmount($value);

	public function deleteByBalance($value);


}
?>