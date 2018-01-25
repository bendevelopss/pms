<?php
/**
 * Class that operate on table 'payment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class PaymentMySqlDAO implements PaymentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PaymentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM payment WHERE payment_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM payment';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM payment ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param payment primary key
 	 */
	public function delete($payment_no){
		$sql = 'DELETE FROM payment WHERE payment_no = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($payment_no);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PaymentMySql payment
 	 */
	public function insert($payment){
		$sql = 'INSERT INTO payment (customer, project, topay, amount, bankname, chequeno, chequedate, type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($payment->customer);
		$sqlQuery->set($payment->project);
		$sqlQuery->set($payment->topay);
		$sqlQuery->set($payment->amount);
		$sqlQuery->set($payment->bankname);
		$sqlQuery->setNumber($payment->chequeno);
		$sqlQuery->set($payment->chequedate);
		$sqlQuery->set($payment->type);
		$sqlQuery->set($payment->status);

		$id = $this->executeInsert($sqlQuery);	
		$payment->paymentNo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PaymentMySql payment
 	 */
	public function update($payment){
		$sql = 'UPDATE payment SET customer = ?, project = ?, topay = ?, amount = ?, bankname = ?, chequeno = ?, chequedate = ?, type = ?, status = ? WHERE payment_no = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($payment->customer);
		$sqlQuery->set($payment->project);
		$sqlQuery->set($payment->topay);
		$sqlQuery->set($payment->amount);
		$sqlQuery->set($payment->bankname);
		$sqlQuery->setNumber($payment->chequeno);
		$sqlQuery->set($payment->chequedate);
		$sqlQuery->set($payment->type);
		$sqlQuery->set($payment->status);

		$sqlQuery->setNumber($payment->paymentNo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM payment';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCustomer($value){
		$sql = 'SELECT * FROM payment WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProject($value){
		$sql = 'SELECT * FROM payment WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTopay($value){
		$sql = 'SELECT * FROM payment WHERE topay = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAmount($value){
		$sql = 'SELECT * FROM payment WHERE amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBankname($value){
		$sql = 'SELECT * FROM payment WHERE bankname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByChequeno($value){
		$sql = 'SELECT * FROM payment WHERE chequeno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByChequedate($value){
		$sql = 'SELECT * FROM payment WHERE chequedate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByType($value){
		$sql = 'SELECT * FROM payment WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM payment WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCustomer($value){
		$sql = 'DELETE FROM payment WHERE customer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProject($value){
		$sql = 'DELETE FROM payment WHERE project = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTopay($value){
		$sql = 'DELETE FROM payment WHERE topay = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAmount($value){
		$sql = 'DELETE FROM payment WHERE amount = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankname($value){
		$sql = 'DELETE FROM payment WHERE bankname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByChequeno($value){
		$sql = 'DELETE FROM payment WHERE chequeno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByChequedate($value){
		$sql = 'DELETE FROM payment WHERE chequedate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM payment WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM payment WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PaymentMySql 
	 */
	protected function readRow($row){
		$payment = new Payment();
		
		$payment->paymentNo = $row['payment_no'];
		$payment->customer = $row['customer'];
		$payment->project = $row['project'];
		$payment->topay = $row['topay'];
		$payment->amount = $row['amount'];
		$payment->bankname = $row['bankname'];
		$payment->chequeno = $row['chequeno'];
		$payment->chequedate = $row['chequedate'];
		$payment->type = $row['type'];
		$payment->status = $row['status'];

		return $payment;
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
	 * @return PaymentMySql 
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