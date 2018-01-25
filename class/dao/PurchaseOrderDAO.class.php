<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
interface PurchaseOrderDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PurchaseOrder 
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
 	 * @param purchaseOrder primary key
 	 */
	public function delete($po_no);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PurchaseOrder purchaseOrder
 	 */
	public function insert($purchaseOrder);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PurchaseOrder purchaseOrder
 	 */
	public function update($purchaseOrder);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySupplier($value);

	public function queryByDate($value);

	public function queryByOrderedBy($value);

	public function queryByStatus($value);


	public function deleteBySupplier($value);

	public function deleteByDate($value);

	public function deleteByOrderedBy($value);

	public function deleteByStatus($value);


}
?>