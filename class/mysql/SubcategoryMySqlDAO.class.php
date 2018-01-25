<?php
/**
 * Class that operate on table 'subcategory'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class SubcategoryMySqlDAO implements SubcategoryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SubcategoryMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM subcategory WHERE scategory_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM subcategory';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM subcategory ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param subcategory primary key
 	 */
	public function delete($scategory_no){
		$sql = 'DELETE FROM subcategory WHERE scategory_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($scategory_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SubcategoryMySql subcategory
 	 */
	public function insert($subcategory){
		$sql = 'INSERT INTO subcategory (category_name, scategory_name, status) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($subcategory->categoryName);
		$sqlQuery->set($subcategory->scategoryName);
		$sqlQuery->set($subcategory->status);

		$id = $this->executeInsert($sqlQuery);	
		$subcategory->scategoryNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SubcategoryMySql subcategory
 	 */
	public function update($subcategory){
		$sql = 'UPDATE subcategory SET category_name = ?, scategory_name = ?, status = ? WHERE scategory_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($subcategory->categoryName);
		$sqlQuery->set($subcategory->scategoryName);
		$sqlQuery->set($subcategory->status);

		$sqlQuery->setNumber($subcategory->scategoryNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM subcategory';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoryName($value){
		$sql = 'SELECT * FROM subcategory WHERE category_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByScategoryName($value){
		$sql = 'SELECT * FROM subcategory WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM subcategory WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoryName($value){
		$sql = 'DELETE FROM subcategory WHERE category_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByScategoryName($value){
		$sql = 'DELETE FROM subcategory WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM subcategory WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SubcategoryMySql 
	 */
	protected function readRow($row){
		$subcategory = new Subcategory();
		
		$subcategory->scategoryNo = $row['scategory_no'];
		$subcategory->categoryName = $row['category_name'];
		$subcategory->scategoryName = $row['scategory_name'];
		$subcategory->status = $row['status'];

		return $subcategory;
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
	 * @return SubcategoryMySql 
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