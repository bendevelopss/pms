<?php
/**
 * Class that operate on table 'delivery'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class DeliveryMySqlDAO implements DeliveryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DeliveryMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM delivery WHERE delivery_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM delivery';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM delivery ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param delivery primary key
 	 */
	public function delete($delivery_no){
		$sql = 'DELETE FROM delivery WHERE delivery_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($delivery_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DeliveryMySql delivery
 	 */
	public function insert($delivery){
		$sql = 'INSERT INTO delivery (supplier, date, verified_by, status) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($delivery->supplier);
		$sqlQuery->set($delivery->date);
		$sqlQuery->set($delivery->verifiedBy);
		$sqlQuery->set($delivery->status);

		$id = $this->executeInsert($sqlQuery);	
		$delivery->deliveryNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DeliveryMySql delivery
 	 */
	public function update($delivery){
		$sql = 'UPDATE delivery SET supplier = ?, date = ?, verified_by = ?, status = ? WHERE delivery_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($delivery->supplier);
		$sqlQuery->set($delivery->date);
		$sqlQuery->set($delivery->verifiedBy);
		$sqlQuery->set($delivery->status);

		$sqlQuery->setNumber($delivery->deliveryNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM delivery';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySupplier($value){
		$sql = 'SELECT * FROM delivery WHERE supplier = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM delivery WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVerifiedBy($value){
		$sql = 'SELECT * FROM delivery WHERE verified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM delivery WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySupplier($value){
		$sql = 'DELETE FROM delivery WHERE supplier = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM delivery WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVerifiedBy($value){
		$sql = 'DELETE FROM delivery WHERE verified_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM delivery WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DeliveryMySql 
	 */
	protected function readRow($row){
		$delivery = new Delivery();
		
		$delivery->deliveryNo = $row['delivery_no'];
		$delivery->supplier = $row['supplier'];
		$delivery->date = $row['date'];
		$delivery->verifiedBy = $row['verified_by'];
		$delivery->status = $row['status'];

		return $delivery;
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
	 * @return DeliveryMySql 
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