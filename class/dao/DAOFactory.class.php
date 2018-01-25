<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return BillingDAO
	 */
	public static function getBillingDAO(){
		return new BillingMySqlExtDAO();
	}

	/**
	 * @return CategoryDAO
	 */
	public static function getCategoryDAO(){
		return new CategoryMySqlExtDAO();
	}

	/**
	 * @return CustomerDAO
	 */
	public static function getCustomerDAO(){
		return new CustomerMySqlExtDAO();
	}

	/**
	 * @return DeliveryDAO
	 */
	public static function getDeliveryDAO(){
		return new DeliveryMySqlExtDAO();
	}

	/**
	 * @return EmployeeDAO
	 */
	public static function getEmployeeDAO(){
		return new EmployeeMySqlExtDAO();
	}

	/**
	 * @return MaterialreqDAO
	 */
	public static function getMaterialreqDAO(){
		return new MaterialreqMySqlExtDAO();
	}

	/**
	 * @return MaterialreqCartDAO
	 */
	public static function getMaterialreqCartDAO(){
		return new MaterialreqCartMySqlExtDAO();
	}

	/**
	 * @return MaterialsDAO
	 */
	public static function getMaterialsDAO(){
		return new MaterialsMySqlExtDAO();
	}

	/**
	 * @return PaymentDAO
	 */
	public static function getPaymentDAO(){
		return new PaymentMySqlExtDAO();
	}

	/**
	 * @return PositionDAO
	 */
	public static function getPositionDAO(){
		return new PositionMySqlExtDAO();
	}

	/**
	 * @return PulloutDAO
	 */
	public static function getPulloutDAO(){
		return new PulloutMySqlExtDAO();
	}

	/**
	 * @return PulloutCartDAO
	 */
	public static function getPulloutCartDAO(){
		return new PulloutCartMySqlExtDAO();
	}

	/**
	 * @return PurchaseCartDAO
	 */
	public static function getPurchaseCartDAO(){
		return new PurchaseCartMySqlExtDAO();
	}

	/**
	 * @return PurchaseOrderDAO
	 */
	public static function getPurchaseOrderDAO(){
		return new PurchaseOrderMySqlExtDAO();
	}

	/**
	 * @return QuotationDAO
	 */
	public static function getQuotationDAO(){
		return new QuotationMySqlExtDAO();
	}

	/**
	 * @return QuotationCartDAO
	 */
	public static function getQuotationCartDAO(){
		return new QuotationCartMySqlExtDAO();
	}

	/**
	 * @return SampleDAO
	 */
	public static function getSampleDAO(){
		return new SampleMySqlExtDAO();
	}

	/**
	 * @return SubcategoryDAO
	 */
	public static function getSubcategoryDAO(){
		return new SubcategoryMySqlExtDAO();
	}

	/**
	 * @return SupplierDAO
	 */
	public static function getSupplierDAO(){
		return new SupplierMySqlExtDAO();
	}

	/**
	 * @return UnitmeasurementDAO
	 */
	public static function getUnitmeasurementDAO(){
		return new UnitmeasurementMySqlExtDAO();
	}


}
?>