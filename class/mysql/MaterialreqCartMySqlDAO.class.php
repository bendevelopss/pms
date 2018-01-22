<?php
/**
 * Class that operate on table 'materialreq_cart'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class MaterialreqCartMySqlDAO implements MaterialreqCartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MaterialreqCartMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM materialreq_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM materialreq_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM materialreq_cart ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param materialreqCart primary key
 	 */
	public function delete($code){
		$sql = 'DELETE FROM materialreq_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($code);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MaterialreqCartMySql materialreqCart
 	 */
	public function insert($materialreqCart){
		$sql = 'INSERT INTO materialreq_cart (req_no, customer, project, material_no, brand_name, category, scategory_name, description, color, package, unit_measurement, quantity, abbre, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($materialreqCart->reqNo);
		$sqlQuery->set($materialreqCart->customer);
		$sqlQuery->set($materialreqCart->project);
		$sqlQuery->setNumber($materialreqCart->materialNo);
		$sqlQuery->set($materialreqCart->brandName);
		$sqlQuery->set($materialreqCart->category);
		$sqlQuery->set($materialreqCart->scategoryName);
		$sqlQuery->set($materialreqCart->description);
		$sqlQuery->set($materialreqCart->color);
		$sqlQuery->set($materialreqCart->package);
		$sqlQuery->set($materialreqCart->unitMeasurement);
		$sqlQuery->setNumber($materialreqCart->quantity);
		$sqlQuery->set($materialreqCart->abbre);
		$sqlQuery->set($materialreqCart->status);

		$id = $this->executeInsert($sqlQuery);	
		$materialreqCart->code = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MaterialreqCartMySql materialreqCart
 	 */
	public function update($materialreqCart){
		$sql = 'UPDATE materialreq_cart SET req_no = ?, customer = ?, project = ?, material_no = ?, brand_name = ?, category = ?, scategory_name = ?, description = ?, color = ?, package = ?, unit_measurement = ?, quantity = ?, abbre = ?, status = ? WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($materialreqCart->reqNo);
		$sqlQuery->set($materialreqCart->customer);
		$sqlQuery->set($materialreqCart->project);
		$sqlQuery->setNumber($materialreqCart->materialNo);
		$sqlQuery->set($materialreqCart->brandName);
		$sqlQuery->set($materialreqCart->category);
		$sqlQuery->set($materialreqCart->scategoryName);
		$sqlQuery->set($materialreqCart->description);
		$sqlQuery->set($materialreqCart->color);
		$sqlQuery->set($materialreqCart->package);
		$sqlQuery->set($materialreqCart->unitMeasurement);
		$sqlQuery->setNumber($materialreqCart->quantity);
		$sqlQuery->set($materialreqCart->abbre);
		$sqlQuery->set($materialreqCart->status);

		$sqlQuery->set($materialreqCart->code);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM materialreq_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByReqNo($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE req_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCustomer($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaterialNo($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBrandName($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategory($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByScategoryName($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColor($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPackage($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnitMeasurement($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbre($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM materialreq_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByReqNo($value){
		$sql = 'DELETE FROM materialreq_cart WHERE req_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCustomer($value){
		$sql = 'DELETE FROM materialreq_cart WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM materialreq_cart WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaterialNo($value){
		$sql = 'DELETE FROM materialreq_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBrandName($value){
		$sql = 'DELETE FROM materialreq_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategory($value){
		$sql = 'DELETE FROM materialreq_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByScategoryName($value){
		$sql = 'DELETE FROM materialreq_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM materialreq_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColor($value){
		$sql = 'DELETE FROM materialreq_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPackage($value){
		$sql = 'DELETE FROM materialreq_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnitMeasurement($value){
		$sql = 'DELETE FROM materialreq_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM materialreq_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbre($value){
		$sql = 'DELETE FROM materialreq_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM materialreq_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MaterialreqCartMySql 
	 */
	protected function readRow($row){
		$materialreqCart = new MaterialreqCart();
		
		$materialreqCart->reqNo = $row['req_no'];
		$materialreqCart->code = $row['code'];
		$materialreqCart->customer = $row['customer'];
		$materialreqCart->project = $row['project'];
		$materialreqCart->materialNo = $row['material_no'];
		$materialreqCart->brandName = $row['brand_name'];
		$materialreqCart->category = $row['category'];
		$materialreqCart->scategoryName = $row['scategory_name'];
		$materialreqCart->description = $row['description'];
		$materialreqCart->color = $row['color'];
		$materialreqCart->package = $row['package'];
		$materialreqCart->unitMeasurement = $row['unit_measurement'];
		$materialreqCart->quantity = $row['quantity'];
		$materialreqCart->abbre = $row['abbre'];
		$materialreqCart->status = $row['status'];

		return $materialreqCart;
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
	 * @return MaterialreqCartMySql 
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