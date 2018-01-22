<?php
/**
 * Class that operate on table 'sample'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class SampleMySqlDAO implements SampleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SampleMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM sample WHERE no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM sample';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM sample ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param sample primary key
 	 */
	public function delete($no){
		$sql = 'DELETE FROM sample WHERE no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SampleMySql sample
 	 */
	public function insert($sample){
		$sql = 'INSERT INTO sample (user, pass, position, status, account_status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($sample->user);
		$sqlQuery->set($sample->pass);
		$sqlQuery->set($sample->position);
		$sqlQuery->set($sample->status);
		$sqlQuery->set($sample->accountStatus);

		$id = $this->executeInsert($sqlQuery);	
		$sample->no = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SampleMySql sample
 	 */
	public function update($sample){
		$sql = 'UPDATE sample SET user = ?, pass = ?, position = ?, status = ?, account_status = ? WHERE no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($sample->user);
		$sqlQuery->set($sample->pass);
		$sqlQuery->set($sample->position);
		$sqlQuery->set($sample->status);
		$sqlQuery->set($sample->accountStatus);

		$sqlQuery->setNumber($sample->no);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM sample';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUser($value){
		$sql = 'SELECT * FROM sample WHERE user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPass($value){
		$sql = 'SELECT * FROM sample WHERE pass = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosition($value){
		$sql = 'SELECT * FROM sample WHERE position = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM sample WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountStatus($value){
		$sql = 'SELECT * FROM sample WHERE account_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUser($value){
		$sql = 'DELETE FROM sample WHERE user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPass($value){
		$sql = 'DELETE FROM sample WHERE pass = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosition($value){
		$sql = 'DELETE FROM sample WHERE position = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM sample WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountStatus($value){
		$sql = 'DELETE FROM sample WHERE account_status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SampleMySql 
	 */
	protected function readRow($row){
		$sample = new Sample();
		
		$sample->no = $row['no'];
		$sample->user = $row['user'];
		$sample->pass = $row['pass'];
		$sample->position = $row['position'];
		$sample->status = $row['status'];
		$sample->accountStatus = $row['account_status'];

		return $sample;
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
	 * @return SampleMySql 
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