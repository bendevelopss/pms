<?php
/**
 * Class that operate on table 'materials'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class MaterialsMySqlDAO implements MaterialsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaterialsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM materials WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM materials';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM materials ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param material primary key
 	 */
	public function delete($material_no){
		$sql = 'DELETE FROM materials WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($material_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaterialsMySql material
 	 */
	public function insert($material){
		$sql = 'INSERT INTO materials (code, category, scategory_name, description, brand_name, color, package, unit_measurement, abbre, quantity, price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($material->code);
		$sqlQuery->set($material->category);
		$sqlQuery->set($material->scategoryName);
		$sqlQuery->set($material->description);
		$sqlQuery->set($material->brandName);
		$sqlQuery->set($material->color);
		$sqlQuery->set($material->package);
		$sqlQuery->set($material->unitMeasurement);
		$sqlQuery->set($material->abbre);
		$sqlQuery->setNumber($material->quantity);
		$sqlQuery->set($material->price);
		$sqlQuery->set($material->status);

		$id = $this->executeInsert($sqlQuery);	
		$material->materialNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaterialsMySql material
 	 */
	public function update($material){
		$sql = 'UPDATE materials SET code = ?, category = ?, scategory_name = ?, description = ?, brand_name = ?, color = ?, package = ?, unit_measurement = ?, abbre = ?, quantity = ?, price = ?, status = ? WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($material->code);
		$sqlQuery->set($material->category);
		$sqlQuery->set($material->scategoryName);
		$sqlQuery->set($material->description);
		$sqlQuery->set($material->brandName);
		$sqlQuery->set($material->color);
		$sqlQuery->set($material->package);
		$sqlQuery->set($material->unitMeasurement);
		$sqlQuery->set($material->abbre);
		$sqlQuery->setNumber($material->quantity);
		$sqlQuery->set($material->price);
		$sqlQuery->set($material->status);

		$sqlQuery->setNumber($material->materialNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM materials';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCode($value){
		$sql = 'SELECT * FROM materials WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategory($value){
		$sql = 'SELECT * FROM materials WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByScategoryName($value){
		$sql = 'SELECT * FROM materials WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM materials WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBrandName($value){
		$sql = 'SELECT * FROM materials WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColor($value){
		$sql = 'SELECT * FROM materials WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPackage($value){
		$sql = 'SELECT * FROM materials WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnitMeasurement($value){
		$sql = 'SELECT * FROM materials WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbre($value){
		$sql = 'SELECT * FROM materials WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM materials WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrice($value){
		$sql = 'SELECT * FROM materials WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM materials WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCode($value){
		$sql = 'DELETE FROM materials WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategory($value){
		$sql = 'DELETE FROM materials WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByScategoryName($value){
		$sql = 'DELETE FROM materials WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM materials WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBrandName($value){
		$sql = 'DELETE FROM materials WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColor($value){
		$sql = 'DELETE FROM materials WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPackage($value){
		$sql = 'DELETE FROM materials WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnitMeasurement($value){
		$sql = 'DELETE FROM materials WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbre($value){
		$sql = 'DELETE FROM materials WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM materials WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrice($value){
		$sql = 'DELETE FROM materials WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM materials WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaterialsMySql 
	 */
	protected function readRow($row){
		$material = new Material();
		
		$material->materialNo = $row['material_no'];
		$material->code = $row['code'];
		$material->category = $row['category'];
		$material->scategoryName = $row['scategory_name'];
		$material->description = $row['description'];
		$material->brandName = $row['brand_name'];
		$material->color = $row['color'];
		$material->package = $row['package'];
		$material->unitMeasurement = $row['unit_measurement'];
		$material->abbre = $row['abbre'];
		$material->quantity = $row['quantity'];
		$material->price = $row['price'];
		$material->status = $row['status'];

		return $material;
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
	 * @return MaterialsMySql 
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