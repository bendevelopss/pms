<?php
/**
 * Class that operate on table 'billing'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class BillingMySqlDAO implements BillingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BillingMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM billing WHERE billing_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM billing';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM billing ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param billing primary key
 	 */
	public function delete($billing_no){
		$sql = 'DELETE FROM billing WHERE billing_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($billing_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BillingMySql billing
 	 */
	public function insert($billing){
		$sql = 'INSERT INTO billing (customer, project, totalcost, balance, topay, datee, enddate, prepared, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($billing->customer);
		$sqlQuery->set($billing->project);
		$sqlQuery->set($billing->totalcost);
		$sqlQuery->set($billing->balance);
		$sqlQuery->set($billing->topay);
		$sqlQuery->set($billing->datee);
		$sqlQuery->set($billing->enddate);
		$sqlQuery->set($billing->prepared);
		$sqlQuery->set($billing->status);

		$id = $this->executeInsert($sqlQuery);	
		$billing->billingNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BillingMySql billing
 	 */
	public function update($billing){
		$sql = 'UPDATE billing SET customer = ?, project = ?, totalcost = ?, balance = ?, topay = ?, datee = ?, enddate = ?, prepared = ?, status = ? WHERE billing_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($billing->customer);
		$sqlQuery->set($billing->project);
		$sqlQuery->set($billing->totalcost);
		$sqlQuery->set($billing->balance);
		$sqlQuery->set($billing->topay);
		$sqlQuery->set($billing->datee);
		$sqlQuery->set($billing->enddate);
		$sqlQuery->set($billing->prepared);
		$sqlQuery->set($billing->status);

		$sqlQuery->setNumber($billing->billingNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM billing';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCustomer($value){
		$sql = 'SELECT * FROM billing WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM billing WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotalcost($value){
		$sql = 'SELECT * FROM billing WHERE totalcost = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBalance($value){
		$sql = 'SELECT * FROM billing WHERE balance = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTopay($value){
		$sql = 'SELECT * FROM billing WHERE topay = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatee($value){
		$sql = 'SELECT * FROM billing WHERE datee = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnddate($value){
		$sql = 'SELECT * FROM billing WHERE enddate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrepared($value){
		$sql = 'SELECT * FROM billing WHERE prepared = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM billing WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCustomer($value){
		$sql = 'DELETE FROM billing WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM billing WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotalcost($value){
		$sql = 'DELETE FROM billing WHERE totalcost = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBalance($value){
		$sql = 'DELETE FROM billing WHERE balance = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTopay($value){
		$sql = 'DELETE FROM billing WHERE topay = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatee($value){
		$sql = 'DELETE FROM billing WHERE datee = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnddate($value){
		$sql = 'DELETE FROM billing WHERE enddate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrepared($value){
		$sql = 'DELETE FROM billing WHERE prepared = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM billing WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BillingMySql 
	 */
	protected function readRow($row){
		$billing = new Billing();
		
		$billing->billingNo = $row['billing_no'];
		$billing->customer = $row['customer'];
		$billing->project = $row['project'];
		$billing->totalcost = $row['totalcost'];
		$billing->balance = $row['balance'];
		$billing->topay = $row['topay'];
		$billing->datee = $row['datee'];
		$billing->enddate = $row['enddate'];
		$billing->prepared = $row['prepared'];
		$billing->status = $row['status'];

		return $billing;
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
	 * @return BillingMySql 
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