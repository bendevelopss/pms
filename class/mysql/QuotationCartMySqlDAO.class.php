<?php
/**
 * Class that operate on table 'quotation_cart'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class QuotationCartMySqlDAO implements QuotationCartDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return QuotationCartMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM quotation_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM quotation_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM quotation_cart ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param quotationCart primary key
 	 */
	public function delete($code){
		$sql = 'DELETE FROM quotation_cart WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($code);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param QuotationCartMySql quotationCart
 	 */
	public function insert($quotationCart){
		$sql = 'INSERT INTO quotation_cart (quote_no, company, project, material_no, brand_name, category, scategory_name, description, color, package, unit_measurement, quantity, quantity_remaining, price, abbre, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($quotationCart->quoteNo);
		$sqlQuery->set($quotationCart->company);
		$sqlQuery->set($quotationCart->project);
		$sqlQuery->setNumber($quotationCart->materialNo);
		$sqlQuery->set($quotationCart->brandName);
		$sqlQuery->set($quotationCart->category);
		$sqlQuery->set($quotationCart->scategoryName);
		$sqlQuery->set($quotationCart->description);
		$sqlQuery->set($quotationCart->color);
		$sqlQuery->set($quotationCart->package);
		$sqlQuery->set($quotationCart->unitMeasurement);
		$sqlQuery->setNumber($quotationCart->quantity);
		$sqlQuery->setNumber($quotationCart->quantityRemaining);
		$sqlQuery->setNumber($quotationCart->price);
		$sqlQuery->set($quotationCart->abbre);
		$sqlQuery->set($quotationCart->status);

		$id = $this->executeInsert($sqlQuery);	
		$quotationCart->code = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param QuotationCartMySql quotationCart
 	 */
	public function update($quotationCart){
		$sql = 'UPDATE quotation_cart SET quote_no = ?, company = ?, project = ?, material_no = ?, brand_name = ?, category = ?, scategory_name = ?, description = ?, color = ?, package = ?, unit_measurement = ?, quantity = ?, quantity_remaining = ?, price = ?, abbre = ?, status = ? WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($quotationCart->quoteNo);
		$sqlQuery->set($quotationCart->company);
		$sqlQuery->set($quotationCart->project);
		$sqlQuery->setNumber($quotationCart->materialNo);
		$sqlQuery->set($quotationCart->brandName);
		$sqlQuery->set($quotationCart->category);
		$sqlQuery->set($quotationCart->scategoryName);
		$sqlQuery->set($quotationCart->description);
		$sqlQuery->set($quotationCart->color);
		$sqlQuery->set($quotationCart->package);
		$sqlQuery->set($quotationCart->unitMeasurement);
		$sqlQuery->setNumber($quotationCart->quantity);
		$sqlQuery->setNumber($quotationCart->quantityRemaining);
		$sqlQuery->setNumber($quotationCart->price);
		$sqlQuery->set($quotationCart->abbre);
		$sqlQuery->set($quotationCart->status);

		$sqlQuery->set($quotationCart->code);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM quotation_cart';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByQuoteNo($value){
		$sql = 'SELECT * FROM quotation_cart WHERE quote_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCompany($value){
		$sql = 'SELECT * FROM quotation_cart WHERE company = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM quotation_cart WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMaterialNo($value){
		$sql = 'SELECT * FROM quotation_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBrandName($value){
		$sql = 'SELECT * FROM quotation_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategory($value){
		$sql = 'SELECT * FROM quotation_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByScategoryName($value){
		$sql = 'SELECT * FROM quotation_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM quotation_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColor($value){
		$sql = 'SELECT * FROM quotation_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPackage($value){
		$sql = 'SELECT * FROM quotation_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUnitMeasurement($value){
		$sql = 'SELECT * FROM quotation_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantity($value){
		$sql = 'SELECT * FROM quotation_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuantityRemaining($value){
		$sql = 'SELECT * FROM quotation_cart WHERE quantity_remaining = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrice($value){
		$sql = 'SELECT * FROM quotation_cart WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbre($value){
		$sql = 'SELECT * FROM quotation_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM quotation_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByQuoteNo($value){
		$sql = 'DELETE FROM quotation_cart WHERE quote_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCompany($value){
		$sql = 'DELETE FROM quotation_cart WHERE company = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM quotation_cart WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMaterialNo($value){
		$sql = 'DELETE FROM quotation_cart WHERE material_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBrandName($value){
		$sql = 'DELETE FROM quotation_cart WHERE brand_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategory($value){
		$sql = 'DELETE FROM quotation_cart WHERE category = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByScategoryName($value){
		$sql = 'DELETE FROM quotation_cart WHERE scategory_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM quotation_cart WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColor($value){
		$sql = 'DELETE FROM quotation_cart WHERE color = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPackage($value){
		$sql = 'DELETE FROM quotation_cart WHERE package = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUnitMeasurement($value){
		$sql = 'DELETE FROM quotation_cart WHERE unit_measurement = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantity($value){
		$sql = 'DELETE FROM quotation_cart WHERE quantity = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuantityRemaining($value){
		$sql = 'DELETE FROM quotation_cart WHERE quantity_remaining = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrice($value){
		$sql = 'DELETE FROM quotation_cart WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbre($value){
		$sql = 'DELETE FROM quotation_cart WHERE abbre = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM quotation_cart WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return QuotationCartMySql 
	 */
	protected function readRow($row){
		$quotationCart = new QuotationCart();
		
		$quotationCart->quoteNo = $row['quote_no'];
		$quotationCart->company = $row['company'];
		$quotationCart->project = $row['project'];
		$quotationCart->materialNo = $row['material_no'];
		$quotationCart->code = $row['code'];
		$quotationCart->brandName = $row['brand_name'];
		$quotationCart->category = $row['category'];
		$quotationCart->scategoryName = $row['scategory_name'];
		$quotationCart->description = $row['description'];
		$quotationCart->color = $row['color'];
		$quotationCart->package = $row['package'];
		$quotationCart->unitMeasurement = $row['unit_measurement'];
		$quotationCart->quantity = $row['quantity'];
		$quotationCart->quantityRemaining = $row['quantity_remaining'];
		$quotationCart->price = $row['price'];
		$quotationCart->abbre = $row['abbre'];
		$quotationCart->status = $row['status'];

		return $quotationCart;
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
	 * @return QuotationCartMySql 
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