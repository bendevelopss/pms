<?php
/**
 * Class that operate on table 'pullout_cart'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class PulloutCartMySqlDAO implements PulloutCartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PulloutCartMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pullout_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pullout_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pullout_cart ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pulloutCart primary key
 	 */
	public function delete($code){
		$sql = 'DELETE FROM pullout_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($code);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PulloutCartMySql pulloutCart
 	 */
	public function insert($pulloutCart){
		$sql = 'INSERT INTO pullout_cart (pullout_no, req_no, customer, project, material_no, brand_name, category, scategory_name, description, color, package, unit_measurement, quantity, abbre, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pulloutCart->pulloutNo);
		$sqlQuery->setNumber($pulloutCart->reqNo);
		$sqlQuery->set($pulloutCart->customer);
		$sqlQuery->set($pulloutCart->project);
		$sqlQuery->setNumber($pulloutCart->materialNo);
		$sqlQuery->set($pulloutCart->brandName);
		$sqlQuery->set($pulloutCart->category);
		$sqlQuery->set($pulloutCart->scategoryName);
		$sqlQuery->set($pulloutCart->description);
		$sqlQuery->set($pulloutCart->color);
		$sqlQuery->set($pulloutCart->package);
		$sqlQuery->set($pulloutCart->unitMeasurement);
		$sqlQuery->setNumber($pulloutCart->quantity);
		$sqlQuery->set($pulloutCart->abbre);
		$sqlQuery->set($pulloutCart->status);

		$id = $this->executeInsert($sqlQuery);	
		$pulloutCart->code = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PulloutCartMySql pulloutCart
 	 */
	public function update($pulloutCart){
		$sql = 'UPDATE pullout_cart SET pullout_no = ?, req_no = ?, customer = ?, project = ?, material_no = ?, brand_name = ?, category = ?, scategory_name = ?, description = ?, color = ?, package = ?, unit_measurement = ?, quantity = ?, abbre = ?, status = ? WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pulloutCart->pulloutNo);
		$sqlQuery->setNumber($pulloutCart->reqNo);
		$sqlQuery->set($pulloutCart->customer);
		$sqlQuery->set($pulloutCart->project);
		$sqlQuery->setNumber($pulloutCart->materialNo);
		$sqlQuery->set($pulloutCart->brandName);
		$sqlQuery->set($pulloutCart->category);
		$sqlQuery->set($pulloutCart->scategoryName);
		$sqlQuery->set($pulloutCart->description);
		$sqlQuery->set($pulloutCart->color);
		$sqlQuery->set($pulloutCart->package);
		$sqlQuery->set($pulloutCart->unitMeasurement);
		$sqlQuery->setNumber($pulloutCart->quantity);
		$sqlQuery->set($pulloutCart->abbre);
		$sqlQuery->set($pulloutCart->status);

		$sqlQuery->set($pulloutCart->code);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pullout_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPulloutNo($value){
		$sql = 'SELECT * FROM pullout_cart WHERE pullout_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByReqNo($value){
		$sql = 'SELECT * FROM pullout_cart WHERE req_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCustomer($value){
		$sql = 'SELECT * FROM pullout_cart WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM pullout_cart WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaterialNo($value){
		$sql = 'SELECT * FROM pullout_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBrandName($value){
		$sql = 'SELECT * FROM pullout_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategory($value){
		$sql = 'SELECT * FROM pullout_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByScategoryName($value){
		$sql = 'SELECT * FROM pullout_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM pullout_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColor($value){
		$sql = 'SELECT * FROM pullout_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPackage($value){
		$sql = 'SELECT * FROM pullout_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnitMeasurement($value){
		$sql = 'SELECT * FROM pullout_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM pullout_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbre($value){
		$sql = 'SELECT * FROM pullout_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM pullout_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPulloutNo($value){
		$sql = 'DELETE FROM pullout_cart WHERE pullout_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReqNo($value){
		$sql = 'DELETE FROM pullout_cart WHERE req_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCustomer($value){
		$sql = 'DELETE FROM pullout_cart WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM pullout_cart WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaterialNo($value){
		$sql = 'DELETE FROM pullout_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBrandName($value){
		$sql = 'DELETE FROM pullout_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategory($value){
		$sql = 'DELETE FROM pullout_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByScategoryName($value){
		$sql = 'DELETE FROM pullout_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM pullout_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColor($value){
		$sql = 'DELETE FROM pullout_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPackage($value){
		$sql = 'DELETE FROM pullout_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnitMeasurement($value){
		$sql = 'DELETE FROM pullout_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM pullout_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbre($value){
		$sql = 'DELETE FROM pullout_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM pullout_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PulloutCartMySql 
	 */
	protected function readRow($row){
		$pulloutCart = new PulloutCart();
		
		$pulloutCart->pulloutNo = $row['pullout_no'];
		$pulloutCart->reqNo = $row['req_no'];
		$pulloutCart->code = $row['code'];
		$pulloutCart->customer = $row['customer'];
		$pulloutCart->project = $row['project'];
		$pulloutCart->materialNo = $row['material_no'];
		$pulloutCart->brandName = $row['brand_name'];
		$pulloutCart->category = $row['category'];
		$pulloutCart->scategoryName = $row['scategory_name'];
		$pulloutCart->description = $row['description'];
		$pulloutCart->color = $row['color'];
		$pulloutCart->package = $row['package'];
		$pulloutCart->unitMeasurement = $row['unit_measurement'];
		$pulloutCart->quantity = $row['quantity'];
		$pulloutCart->abbre = $row['abbre'];
		$pulloutCart->status = $row['status'];

		return $pulloutCart;
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
	 * @return PulloutCartMySql 
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