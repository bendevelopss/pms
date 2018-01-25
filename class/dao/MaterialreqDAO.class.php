<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface MaterialreqDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Materialreq 
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
 	 * @param materialreq primary key
 	 */
	public function delete($req_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Materialreq materialreq
 	 */
	public function insert($materialreq);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Materialreq materialreq
 	 */
	public function update($materialreq);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCustomer($value);

	public function queryByProject($value);

	public function queryByDate($value);

	public function queryByRequestedBy($value);

	public function queryByStatus($value);


	public function deleteByCustomer($value);

	public function deleteByProject($value);

	public function deleteByDate($value);

	public function deleteByRequestedBy($value);

	public function deleteByStatus($value);


}
?>