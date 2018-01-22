<?php
/**
 * Class that operate on table 'quotation'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class QuotationMySqlDAO implements QuotationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return QuotationMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM quotation WHERE quote_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM quotation';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM quotation ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param quotation primary key
 	 */
	public function delete($quote_no){
		$sql = 'DELETE FROM quotation WHERE quote_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($quote_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param QuotationMySql quotation
 	 */
	public function insert($quotation){
		$sql = 'INSERT INTO quotation (username, password, customer, project, date, due_date, address, phone, email, sales_person, prepared_by, status, total_amount, balance) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($quotation->username);
		$sqlQuery->set($quotation->password);
		$sqlQuery->set($quotation->customer);
		$sqlQuery->set($quotation->project);
		$sqlQuery->set($quotation->date);
		$sqlQuery->set($quotation->dueDate);
		$sqlQuery->set($quotation->address);
		$sqlQuery->set($quotation->phone);
		$sqlQuery->set($quotation->email);
		$sqlQuery->set($quotation->salesPerson);
		$sqlQuery->set($quotation->preparedBy);
		$sqlQuery->set($quotation->status);
		$sqlQuery->set($quotation->totalAmount);
		$sqlQuery->set($quotation->balance);

		$id = $this->executeInsert($sqlQuery);	
		$quotation->quoteNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param QuotationMySql quotation
 	 */
	public function update($quotation){
		$sql = 'UPDATE quotation SET username = ?, password = ?, customer = ?, project = ?, date = ?, due_date = ?, address = ?, phone = ?, email = ?, sales_person = ?, prepared_by = ?, status = ?, total_amount = ?, balance = ? WHERE quote_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($quotation->username);
		$sqlQuery->set($quotation->password);
		$sqlQuery->set($quotation->customer);
		$sqlQuery->set($quotation->project);
		$sqlQuery->set($quotation->date);
		$sqlQuery->set($quotation->dueDate);
		$sqlQuery->set($quotation->address);
		$sqlQuery->set($quotation->phone);
		$sqlQuery->set($quotation->email);
		$sqlQuery->set($quotation->salesPerson);
		$sqlQuery->set($quotation->preparedBy);
		$sqlQuery->set($quotation->status);
		$sqlQuery->set($quotation->totalAmount);
		$sqlQuery->set($quotation->balance);

		$sqlQuery->setNumber($quotation->quoteNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM quotation';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsername($value){
		$sql = 'SELECT * FROM quotation WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM quotation WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCustomer($value){
		$sql = 'SELECT * FROM quotation WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM quotation WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM quotation WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDueDate($value){
		$sql = 'SELECT * FROM quotation WHERE due_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value){
		$sql = 'SELECT * FROM quotation WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone($value){
		$sql = 'SELECT * FROM quotation WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM quotation WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySalesPerson($value){
		$sql = 'SELECT * FROM quotation WHERE sales_person = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPreparedBy($value){
		$sql = 'SELECT * FROM quotation WHERE prepared_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM quotation WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotalAmount($value){
		$sql = 'SELECT * FROM quotation WHERE total_amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBalance($value){
		$sql = 'SELECT * FROM quotation WHERE balance = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsername($value){
		$sql = 'DELETE FROM quotation WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM quotation WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCustomer($value){
		$sql = 'DELETE FROM quotation WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM quotation WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM quotation WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDueDate($value){
		$sql = 'DELETE FROM quotation WHERE due_date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM quotation WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone($value){
		$sql = 'DELETE FROM quotation WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM quotation WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySalesPerson($value){
		$sql = 'DELETE FROM quotation WHERE sales_person = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPreparedBy($value){
		$sql = 'DELETE FROM quotation WHERE prepared_by = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM quotation WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotalAmount($value){
		$sql = 'DELETE FROM quotation WHERE total_amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBalance($value){
		$sql = 'DELETE FROM quotation WHERE balance = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return QuotationMySql 
	 */
	protected function readRow($row){
		$quotation = new Quotation();
		
		$quotation->quoteNo = $row['quote_no'];
		$quotation->username = $row['username'];
		$quotation->password = $row['password'];
		$quotation->customer = $row['customer'];
		$quotation->project = $row['project'];
		$quotation->date = $row['date'];
		$quotation->dueDate = $row['due_date'];
		$quotation->address = $row['address'];
		$quotation->phone = $row['phone'];
		$quotation->email = $row['email'];
		$quotation->salesPerson = $row['sales_person'];
		$quotation->preparedBy = $row['prepared_by'];
		$quotation->status = $row['status'];
		$quotation->totalAmount = $row['total_amount'];
		$quotation->balance = $row['balance'];

		return $quotation;
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
	 * @return QuotationMySql 
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