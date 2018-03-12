<?php
	require_once '../../include_dao.php';

	// print_r($_POST); exit;
	

	for($x = 0; $x < count($_POST['brand']);$x++){
		$max_no = DAOFactory::getMaterialReqCartDAO()->maxId();
		$max = (!empty($max_no[0]['max_req_no']) ? $max_no[0]['max_req_no'] : 1);
		$new_no = $max+1;
	
		$insert = new MaterialreqCart;
		$insert->reqNo = $new_no;
		$insert->customer = $_POST['customer'];
		$insert->project = $_POST['project'];
		$insert->materialNo = $_POST['material_no'][$x];
		$insert->brandName = $_POST['brand'][$x];
		$insert->category = $_POST['category'][$x];
		$insert->scategoryName = $_POST['scategory_name'][$x];
		$insert->description = $_POST['description'][$x];
		$insert->color = $_POST['color'][$x];
		$insert->package = $_POST['package'][$x];
		$insert->unitMeasurement = $_POST['measurement'][$x];
		$insert->quantity = $_POST['qty'][$x];
		$insert->abbre = $_POST['qty'][$x];
		$insert->status = 'Active';

		$id = DAOFactory::getMaterialReqCartDAO()->insert($insert);
	}
		echo 1;


	

?>
