<?php
/**
 * Class that operate on table 'materialreq'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class MaterialreqMySqlDAO implements MaterialreqDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaterialreqMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM materialreq WHERE req_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM materialreq';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM materialreq ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param materialreq primary key
 	 */
	public function delete($req_no){
		$sql = 'DELETE FROM materialreq WHERE req_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($req_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaterialreqMySql materialreq
 	 */
	public function insert($materialreq){
		$sql = 'INSERT INTO materialreq (customer, project, date, requested_by, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($materialreq->customer);
		$sqlQuery->set($materialreq->project);
		$sqlQuery->set($materialreq->date);
		$sqlQuery->set($materialreq->requestedBy);
		$sqlQuery->set($materialreq->status);

		$id = $this->executeInsert($sqlQuery);	
		$materialreq->reqNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaterialreqMySql materialreq
 	 */
	public function update($materialreq){
		$sql = 'UPDATE materialreq SET customer = ?, project = ?, date = ?, requested_by = ?, status = ? WHERE req_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($materialreq->customer);
		$sqlQuery->set($materialreq->project);
		$sqlQuery->set($materialreq->date);
		$sqlQuery->set($materialreq->requestedBy);
		$sqlQuery->set($materialreq->status);

		$sqlQuery->setNumber($materialreq->reqNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM materialreq';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCustomer($value){
		$sql = 'SELECT * FROM materialreq WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM materialreq WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM materialreq WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRequestedBy($value){
		$sql = 'SELECT * FROM materialreq WHERE requested_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM materialreq WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCustomer($value){
		$sql = 'DELETE FROM materialreq WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM materialreq WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM materialreq WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRequestedBy($value){
		$sql = 'DELETE FROM materialreq WHERE requested_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM materialreq WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaterialreqMySql 
	 */
	protected function readRow($row){
		$materialreq = new Materialreq();
		
		$materialreq->reqNo = $row['req_no'];
		$materialreq->customer = $row['customer'];
		$materialreq->project = $row['project'];
		$materialreq->date = $row['date'];
		$materialreq->requestedBy = $row['requested_by'];
		$materialreq->status = $row['status'];

		return $materialreq;
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
	 * @return MaterialreqMySql 
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