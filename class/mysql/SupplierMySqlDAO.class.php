<?php
/**
 * Class that operate on table 'supplier'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class SupplierMySqlDAO implements SupplierDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SupplierMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM supplier WHERE supplier_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM supplier';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM supplier ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param supplier primary key
 	 */
	public function delete($supplier_no){
		$sql = 'DELETE FROM supplier WHERE supplier_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($supplier_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SupplierMySql supplier
 	 */
	public function insert($supplier){
		$sql = 'INSERT INTO supplier (supp_name, phone, fax, email, firstname, middlename, lastname, contact, street, city, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($supplier->suppName);
		$sqlQuery->set($supplier->phone);
		$sqlQuery->set($supplier->fax);
		$sqlQuery->set($supplier->email);
		$sqlQuery->set($supplier->firstname);
		$sqlQuery->set($supplier->middlename);
		$sqlQuery->set($supplier->lastname);
		$sqlQuery->set($supplier->contact);
		$sqlQuery->set($supplier->street);
		$sqlQuery->set($supplier->city);
		$sqlQuery->set($supplier->status);

		$id = $this->executeInsert($sqlQuery);	
		$supplier->supplierNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SupplierMySql supplier
 	 */
	public function update($supplier){
		$sql = 'UPDATE supplier SET supp_name = ?, phone = ?, fax = ?, email = ?, firstname = ?, middlename = ?, lastname = ?, contact = ?, street = ?, city = ?, status = ? WHERE supplier_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($supplier->suppName);
		$sqlQuery->set($supplier->phone);
		$sqlQuery->set($supplier->fax);
		$sqlQuery->set($supplier->email);
		$sqlQuery->set($supplier->firstname);
		$sqlQuery->set($supplier->middlename);
		$sqlQuery->set($supplier->lastname);
		$sqlQuery->set($supplier->contact);
		$sqlQuery->set($supplier->street);
		$sqlQuery->set($supplier->city);
		$sqlQuery->set($supplier->status);

		$sqlQuery->setNumber($supplier->supplierNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM supplier';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryBySuppName($value){
		$sql = 'SELECT * FROM supplier WHERE supp_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone($value){
		$sql = 'SELECT * FROM supplier WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM supplier WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM supplier WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirstname($value){
		$sql = 'SELECT * FROM supplier WHERE firstname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMiddlename($value){
		$sql = 'SELECT * FROM supplier WHERE middlename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastname($value){
		$sql = 'SELECT * FROM supplier WHERE lastname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContact($value){
		$sql = 'SELECT * FROM supplier WHERE contact = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStreet($value){
		$sql = 'SELECT * FROM supplier WHERE street = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM supplier WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM supplier WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySuppName($value){
		$sql = 'DELETE FROM supplier WHERE supp_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone($value){
		$sql = 'DELETE FROM supplier WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM supplier WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM supplier WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirstname($value){
		$sql = 'DELETE FROM supplier WHERE firstname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMiddlename($value){
		$sql = 'DELETE FROM supplier WHERE middlename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastname($value){
		$sql = 'DELETE FROM supplier WHERE lastname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContact($value){
		$sql = 'DELETE FROM supplier WHERE contact = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStreet($value){
		$sql = 'DELETE FROM supplier WHERE street = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM supplier WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM supplier WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SupplierMySql 
	 */
	protected function readRow($row){
		$supplier = new Supplier();
		
		$supplier->supplierNo = $row['supplier_no'];
		$supplier->suppName = $row['supp_name'];
		$supplier->phone = $row['phone'];
		$supplier->fax = $row['fax'];
		$supplier->email = $row['email'];
		$supplier->firstname = $row['firstname'];
		$supplier->middlename = $row['middlename'];
		$supplier->lastname = $row['lastname'];
		$supplier->contact = $row['contact'];
		$supplier->street = $row['street'];
		$supplier->city = $row['city'];
		$supplier->status = $row['status'];

		return $supplier;
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
	 * @return SupplierMySql 
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