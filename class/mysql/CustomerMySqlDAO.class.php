<?php
/**
 * Class that operate on table 'customer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class CustomerMySqlDAO implements CustomerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CustomerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM customer WHERE customer_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM customer';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM customer ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param customer primary key
 	 */
	public function delete($customer_no){
		$sql = 'DELETE FROM customer WHERE customer_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($customer_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CustomerMySql customer
 	 */
	public function insert($customer){
		$sql = 'INSERT INTO customer (username, password, cust_type, comp_name, phone_num, fax, email, firstname, middlename, lastname, contact, street, city, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($customer->username);
		$sqlQuery->set($customer->password);
		$sqlQuery->set($customer->custType);
		$sqlQuery->set($customer->compName);
		$sqlQuery->set($customer->phoneNum);
		$sqlQuery->set($customer->fax);
		$sqlQuery->set($customer->email);
		$sqlQuery->set($customer->firstname);
		$sqlQuery->set($customer->middlename);
		$sqlQuery->set($customer->lastname);
		$sqlQuery->set($customer->contact);
		$sqlQuery->set($customer->street);
		$sqlQuery->set($customer->city);
		$sqlQuery->set($customer->status);

		$id = $this->executeInsert($sqlQuery);	
		$customer->customerNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CustomerMySql customer
 	 */
	public function update($customer){
		$sql = 'UPDATE customer SET username = ?, password = ?, cust_type = ?, comp_name = ?, phone_num = ?, fax = ?, email = ?, firstname = ?, middlename = ?, lastname = ?, contact = ?, street = ?, city = ?, status = ? WHERE customer_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($customer->username);
		$sqlQuery->set($customer->password);
		$sqlQuery->set($customer->custType);
		$sqlQuery->set($customer->compName);
		$sqlQuery->set($customer->phoneNum);
		$sqlQuery->set($customer->fax);
		$sqlQuery->set($customer->email);
		$sqlQuery->set($customer->firstname);
		$sqlQuery->set($customer->middlename);
		$sqlQuery->set($customer->lastname);
		$sqlQuery->set($customer->contact);
		$sqlQuery->set($customer->street);
		$sqlQuery->set($customer->city);
		$sqlQuery->set($customer->status);

		$sqlQuery->setNumber($customer->customerNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM customer';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM customer WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM customer WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCustType($value){
		$sql = 'SELECT * FROM customer WHERE cust_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCompName($value){
		$sql = 'SELECT * FROM customer WHERE comp_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhoneNum($value){
		$sql = 'SELECT * FROM customer WHERE phone_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM customer WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM customer WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirstname($value){
		$sql = 'SELECT * FROM customer WHERE firstname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMiddlename($value){
		$sql = 'SELECT * FROM customer WHERE middlename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastname($value){
		$sql = 'SELECT * FROM customer WHERE lastname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContact($value){
		$sql = 'SELECT * FROM customer WHERE contact = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStreet($value){
		$sql = 'SELECT * FROM customer WHERE street = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM customer WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM customer WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsername($value){
		$sql = 'DELETE FROM customer WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM customer WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCustType($value){
		$sql = 'DELETE FROM customer WHERE cust_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCompName($value){
		$sql = 'DELETE FROM customer WHERE comp_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhoneNum($value){
		$sql = 'DELETE FROM customer WHERE phone_num = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM customer WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM customer WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirstname($value){
		$sql = 'DELETE FROM customer WHERE firstname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMiddlename($value){
		$sql = 'DELETE FROM customer WHERE middlename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastname($value){
		$sql = 'DELETE FROM customer WHERE lastname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContact($value){
		$sql = 'DELETE FROM customer WHERE contact = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStreet($value){
		$sql = 'DELETE FROM customer WHERE street = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM customer WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM customer WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CustomerMySql 
	 */
	protected function readRow($row){
		$customer = new Customer();
		
		$customer->customerNo = $row['customer_no'];
		$customer->username = $row['username'];
		$customer->password = $row['password'];
		$customer->custType = $row['cust_type'];
		$customer->compName = $row['comp_name'];
		$customer->phoneNum = $row['phone_num'];
		$customer->fax = $row['fax'];
		$customer->email = $row['email'];
		$customer->firstname = $row['firstname'];
		$customer->middlename = $row['middlename'];
		$customer->lastname = $row['lastname'];
		$customer->contact = $row['contact'];
		$customer->street = $row['street'];
		$customer->city = $row['city'];
		$customer->status = $row['status'];

		return $customer;
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
	 * @return CustomerMySql 
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