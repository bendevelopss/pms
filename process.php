<?php
    include('../include/connect.php');


  $sql = "SELECT * FROM customer WHERE cust_status='active' ORDER BY cust_id DESC";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['cust_id'],ucwords($fetch['cust_type']),
      $fetch['cust_name'],$fetch['cust_email'],$fetch['cust_phone'],
      $fetch['cust_tel']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    