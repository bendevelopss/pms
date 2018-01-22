<?php
/**
 * Class that operate on table 'quotation_cart'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-12-04 12:58
 */
class QuotationCartMySqlExtDAO extends QuotationCartMySqlDAO{
	function showData(){
		$sql = "SELECT quotation_cart.quote_no,quotation_cart.material_no, quotation_cart.code,quotation_cart.brand_name,quotation_cart.category,quotation_cart.scategory_name,quotation_cart.description,quotation_cart.color,quotation_cart.package,quotation_cart.unit_measurement,quotation_cart.abbre,quotation_cart.quantity_remaining,quotation_cart.price, materials.quantity as quantity_available FROM quotation_cart INNER JOIN materials ON quotation_cart.material_no=materials.material_no where quotation_cart.quote_no = '".$_GET['scname']."' and quotation_cart.quantity_remaining >'0' ORDER BY quote_no ASC";
		$sqlQuery = new SqlQuery($sql);
		$data = QueryExecutor::execute($sqlQuery);
		return $data;
	}
}
?>