<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface BillingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Billing 
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
 	 * @param billing primary key
 	 */
	public function delete($billing_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Billing billing
 	 */
	public function insert($billing);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Billing billing
 	 */
	public function update($billing);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCustomer($value);

	public function queryByProject($value);

	public function queryByTotalcost($value);

	public function queryByBalance($value);

	public function queryByTopay($value);

	public function queryByDatee($value);

	public function queryByEnddate($value);

	public function queryByPrepared($value);

	public function queryByStatus($value);


	public function deleteByCustomer($value);

	public function deleteByProject($value);

	public function deleteByTotalcost($value);

	public function deleteByBalance($value);

	public function deleteByTopay($value);

	public function deleteByDatee($value);

	public function deleteByEnddate($value);

	public function deleteByPrepared($value);

	public function deleteByStatus($value);


}
?>