<?php
/**
 * Class that operate on table 'pullout'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class PulloutMySqlDAO implements PulloutDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PulloutMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pullout WHERE pullout_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pullout';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pullout ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pullout primary key
 	 */
	public function delete($pullout_no){
		$sql = 'DELETE FROM pullout WHERE pullout_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($pullout_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PulloutMySql pullout
 	 */
	public function insert($pullout){
		$sql = 'INSERT INTO pullout (customer, project, date, accepted_by, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pullout->customer);
		$sqlQuery->set($pullout->project);
		$sqlQuery->set($pullout->date);
		$sqlQuery->set($pullout->acceptedBy);
		$sqlQuery->set($pullout->status);

		$id = $this->executeInsert($sqlQuery);	
		$pullout->pulloutNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PulloutMySql pullout
 	 */
	public function update($pullout){
		$sql = 'UPDATE pullout SET customer = ?, project = ?, date = ?, accepted_by = ?, status = ? WHERE pullout_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pullout->customer);
		$sqlQuery->set($pullout->project);
		$sqlQuery->set($pullout->date);
		$sqlQuery->set($pullout->acceptedBy);
		$sqlQuery->set($pullout->status);

		$sqlQuery->setNumber($pullout->pulloutNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pullout';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCustomer($value){
		$sql = 'SELECT * FROM pullout WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM pullout WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM pullout WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAcceptedBy($value){
		$sql = 'SELECT * FROM pullout WHERE accepted_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM pullout WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCustomer($value){
		$sql = 'DELETE FROM pullout WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM pullout WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM pullout WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAcceptedBy($value){
		$sql = 'DELETE FROM pullout WHERE accepted_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM pullout WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PulloutMySql 
	 */
	protected function readRow($row){
		$pullout = new Pullout();
		
		$pullout->pulloutNo = $row['pullout_no'];
		$pullout->customer = $row['customer'];
		$pullout->project = $row['project'];
		$pullout->date = $row['date'];
		$pullout->acceptedBy = $row['accepted_by'];
		$pullout->status = $row['status'];

		return $pullout;
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
	 * @return PulloutMySql 
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