<?php
/**
 * Class that operate on table 'position'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class PositionMySqlDAO implements PositionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PositionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM position WHERE position_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM position';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM position ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param position primary key
 	 */
	public function delete($position_no){
		$sql = 'DELETE FROM position WHERE position_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($position_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PositionMySql position
 	 */
	public function insert($position){
		$sql = 'INSERT INTO position (position_name, status) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($position->positionName);
		$sqlQuery->set($position->status);

		$id = $this->executeInsert($sqlQuery);	
		$position->positionNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PositionMySql position
 	 */
	public function update($position){
		$sql = 'UPDATE position SET position_name = ?, status = ? WHERE position_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($position->positionName);
		$sqlQuery->set($position->status);

		$sqlQuery->setNumber($position->positionNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM position';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPositionName($value){
		$sql = 'SELECT * FROM position WHERE position_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM position WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPositionName($value){
		$sql = 'DELETE FROM position WHERE position_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM position WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PositionMySql 
	 */
	protected function readRow($row){
		$position = new Position();
		
		$position->positionNo = $row['position_no'];
		$position->positionName = $row['position_name'];
		$position->status = $row['status'];

		return $position;
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
	 * @return PositionMySql 
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