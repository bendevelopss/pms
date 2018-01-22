<?php
/**
 * Class that operate on table 'purchase_order'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class PurchaseOrderMySqlDAO implements PurchaseOrderDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PurchaseOrderMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM purchase_order WHERE po_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM purchase_order';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM purchase_order ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param purchaseOrder primary key
 	 */
	public function delete($po_no){
		$sql = 'DELETE FROM purchase_order WHERE po_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($po_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PurchaseOrderMySql purchaseOrder
 	 */
	public function insert($purchaseOrder){
		$sql = 'INSERT INTO purchase_order (supplier, date, ordered_by, status) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($purchaseOrder->supplier);
		$sqlQuery->set($purchaseOrder->date);
		$sqlQuery->set($purchaseOrder->orderedBy);
		$sqlQuery->set($purchaseOrder->status);

		$id = $this->executeInsert($sqlQuery);	
		$purchaseOrder->poNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PurchaseOrderMySql purchaseOrder
 	 */
	public function update($purchaseOrder){
		$sql = 'UPDATE purchase_order SET supplier = ?, date = ?, ordered_by = ?, status = ? WHERE po_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($purchaseOrder->supplier);
		$sqlQuery->set($purchaseOrder->date);
		$sqlQuery->set($purchaseOrder->orderedBy);
		$sqlQuery->set($purchaseOrder->status);

		$sqlQuery->setNumber($purchaseOrder->poNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM purchase_order';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySupplier($value){
		$sql = 'SELECT * FROM purchase_order WHERE supplier = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM purchase_order WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrderedBy($value){
		$sql = 'SELECT * FROM purchase_order WHERE ordered_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM purchase_order WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySupplier($value){
		$sql = 'DELETE FROM purchase_order WHERE supplier = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM purchase_order WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrderedBy($value){
		$sql = 'DELETE FROM purchase_order WHERE ordered_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM purchase_order WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PurchaseOrderMySql 
	 */
	protected function readRow($row){
		$purchaseOrder = new PurchaseOrder();
		
		$purchaseOrder->poNo = $row['po_no'];
		$purchaseOrder->supplier = $row['supplier'];
		$purchaseOrder->date = $row['date'];
		$purchaseOrder->orderedBy = $row['ordered_by'];
		$purchaseOrder->status = $row['status'];

		return $purchaseOrder;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return PurchaseOrderMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>