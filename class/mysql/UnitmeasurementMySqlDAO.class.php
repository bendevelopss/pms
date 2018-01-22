<?php
/**
 * Class that operate on table 'unitmeasurement'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class UnitmeasurementMySqlDAO implements UnitmeasurementDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UnitmeasurementMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM unitmeasurement WHERE unit_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM unitmeasurement';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM unitmeasurement ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param unitmeasurement primary key
 	 */
	public function delete($unit_no){
		$sql = 'DELETE FROM unitmeasurement WHERE unit_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($unit_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UnitmeasurementMySql unitmeasurement
 	 */
	public function insert($unitmeasurement){
		$sql = 'INSERT INTO unitmeasurement (category, type, unit_measurment, Abbreviation, status) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($unitmeasurement->category);
		$sqlQuery->set($unitmeasurement->type);
		$sqlQuery->set($unitmeasurement->unitMeasurment);
		$sqlQuery->set($unitmeasurement->abbreviation);
		$sqlQuery->set($unitmeasurement->status);

		$id = $this->executeInsert($sqlQuery);	
		$unitmeasurement->unitNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UnitmeasurementMySql unitmeasurement
 	 */
	public function update($unitmeasurement){
		$sql = 'UPDATE unitmeasurement SET category = ?, type = ?, unit_measurment = ?, Abbreviation = ?, status = ? WHERE unit_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($unitmeasurement->category);
		$sqlQuery->set($unitmeasurement->type);
		$sqlQuery->set($unitmeasurement->unitMeasurment);
		$sqlQuery->set($unitmeasurement->abbreviation);
		$sqlQuery->set($unitmeasurement->status);

		$sqlQuery->setNumber($unitmeasurement->unitNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM unitmeasurement';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategory($value){
		$sql = 'SELECT * FROM unitmeasurement WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM unitmeasurement WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnitMeasurment($value){
		$sql = 'SELECT * FROM unitmeasurement WHERE unit_measurment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbreviation($value){
		$sql = 'SELECT * FROM unitmeasurement WHERE Abbreviation = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM unitmeasurement WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategory($value){
		$sql = 'DELETE FROM unitmeasurement WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM unitmeasurement WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnitMeasurment($value){
		$sql = 'DELETE FROM unitmeasurement WHERE unit_measurment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbreviation($value){
		$sql = 'DELETE FROM unitmeasurement WHERE Abbreviation = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM unitmeasurement WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UnitmeasurementMySql 
	 */
	protected function readRow($row){
		$unitmeasurement = new Unitmeasurement();
		
		$unitmeasurement->unitNo = $row['unit_no'];
		$unitmeasurement->category = $row['category'];
		$unitmeasurement->type = $row['type'];
		$unitmeasurement->unitMeasurment = $row['unit_measurment'];
		$unitmeasurement->abbreviation = $row['Abbreviation'];
		$unitmeasurement->status = $row['status'];

		return $unitmeasurement;
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
	 * @return UnitmeasurementMySql 
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