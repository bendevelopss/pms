<?php
/**
 * Class that operate on table 'purchase_cart'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class PurchaseCartMySqlDAO implements PurchaseCartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PurchaseCartMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM purchase_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM purchase_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM purchase_cart ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param purchaseCart primary key
 	 */
	public function delete($code){
		$sql = 'DELETE FROM purchase_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($code);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PurchaseCartMySql purchaseCart
 	 */
	public function insert($purchaseCart){
		$sql = 'INSERT INTO purchase_cart (po_no, supplier, material_no, brand_name, category, scategory_name, description, color, package, unit_measurement, abbre, quantity, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($purchaseCart->poNo);
		$sqlQuery->set($purchaseCart->supplier);
		$sqlQuery->setNumber($purchaseCart->materialNo);
		$sqlQuery->set($purchaseCart->brandName);
		$sqlQuery->set($purchaseCart->category);
		$sqlQuery->set($purchaseCart->scategoryName);
		$sqlQuery->set($purchaseCart->description);
		$sqlQuery->set($purchaseCart->color);
		$sqlQuery->set($purchaseCart->package);
		$sqlQuery->set($purchaseCart->unitMeasurement);
		$sqlQuery->set($purchaseCart->abbre);
		$sqlQuery->setNumber($purchaseCart->quantity);
		$sqlQuery->set($purchaseCart->status);

		$id = $this->executeInsert($sqlQuery);	
		$purchaseCart->code = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PurchaseCartMySql purchaseCart
 	 */
	public function update($purchaseCart){
		$sql = 'UPDATE purchase_cart SET po_no = ?, supplier = ?, material_no = ?, brand_name = ?, category = ?, scategory_name = ?, description = ?, color = ?, package = ?, unit_measurement = ?, abbre = ?, quantity = ?, status = ? WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($purchaseCart->poNo);
		$sqlQuery->set($purchaseCart->supplier);
		$sqlQuery->setNumber($purchaseCart->materialNo);
		$sqlQuery->set($purchaseCart->brandName);
		$sqlQuery->set($purchaseCart->category);
		$sqlQuery->set($purchaseCart->scategoryName);
		$sqlQuery->set($purchaseCart->description);
		$sqlQuery->set($purchaseCart->color);
		$sqlQuery->set($purchaseCart->package);
		$sqlQuery->set($purchaseCart->unitMeasurement);
		$sqlQuery->set($purchaseCart->abbre);
		$sqlQuery->setNumber($purchaseCart->quantity);
		$sqlQuery->set($purchaseCart->status);

		$sqlQuery->set($purchaseCart->code);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM purchase_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPoNo($value){
		$sql = 'SELECT * FROM purchase_cart WHERE po_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySupplier($value){
		$sql = 'SELECT * FROM purchase_cart WHERE supplier = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaterialNo($value){
		$sql = 'SELECT * FROM purchase_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBrandName($value){
		$sql = 'SELECT * FROM purchase_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategory($value){
		$sql = 'SELECT * FROM purchase_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByScategoryName($value){
		$sql = 'SELECT * FROM purchase_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM purchase_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColor($value){
		$sql = 'SELECT * FROM purchase_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPackage($value){
		$sql = 'SELECT * FROM purchase_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnitMeasurement($value){
		$sql = 'SELECT * FROM purchase_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbre($value){
		$sql = 'SELECT * FROM purchase_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM purchase_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM purchase_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPoNo($value){
		$sql = 'DELETE FROM purchase_cart WHERE po_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySupplier($value){
		$sql = 'DELETE FROM purchase_cart WHERE supplier = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaterialNo($value){
		$sql = 'DELETE FROM purchase_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBrandName($value){
		$sql = 'DELETE FROM purchase_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategory($value){
		$sql = 'DELETE FROM purchase_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByScategoryName($value){
		$sql = 'DELETE FROM purchase_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM purchase_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColor($value){
		$sql = 'DELETE FROM purchase_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPackage($value){
		$sql = 'DELETE FROM purchase_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnitMeasurement($value){
		$sql = 'DELETE FROM purchase_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbre($value){
		$sql = 'DELETE FROM purchase_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM purchase_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM purchase_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PurchaseCartMySql 
	 */
	protected function readRow($row){
		$purchaseCart = new PurchaseCart();
		
		$purchaseCart->poNo = $row['po_no'];
		$purchaseCart->code = $row['code'];
		$purchaseCart->supplier = $row['supplier'];
		$purchaseCart->materialNo = $row['material_no'];
		$purchaseCart->brandName = $row['brand_name'];
		$purchaseCart->category = $row['category'];
		$purchaseCart->scategoryName = $row['scategory_name'];
		$purchaseCart->description = $row['description'];
		$purchaseCart->color = $row['color'];
		$purchaseCart->package = $row['package'];
		$purchaseCart->unitMeasurement = $row['unit_measurement'];
		$purchaseCart->abbre = $row['abbre'];
		$purchaseCart->quantity = $row['quantity'];
		$purchaseCart->status = $row['status'];

		return $purchaseCart;
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
	 * @return PurchaseCartMySql 
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