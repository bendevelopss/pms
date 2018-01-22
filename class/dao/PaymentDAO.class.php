<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface PaymentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Payment 
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
 	 * @param payment primary key
 	 */
	public function delete($payment_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Payment payment
 	 */
	public function insert($payment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Payment payment
 	 */
	public function update($payment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCustomer($value);

	public function queryByProject($value);

	public function queryByTopay($value);

	public function queryByAmount($value);

	public function queryByBankname($value);

	public function queryByChequeno($value);

	public function queryByChequedate($value);

	public function queryByType($value);

	public function queryByStatus($value);


	public function deleteByCustomer($value);

	public function deleteByProject($value);

	public function deleteByTopay($value);

	public function deleteByAmount($value);

	public function deleteByBankname($value);

	public function deleteByChequeno($value);

	public function deleteByChequedate($value);

	public function deleteByType($value);

	public function deleteByStatus($value);


}
?>