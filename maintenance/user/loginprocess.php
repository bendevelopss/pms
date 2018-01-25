<?php

    include('../include/connect.php');

      //FETCH VARIABLES
    $uname =$_POST['uname'];
    $upass = $_POST['upass'];  
    $upass = md5($upass);
    $UserType;
    $match="false";    


      // CHECK IF MATCH ACCOUNT
    $sql = "SELECT * FROM user_account  WHERE user_status = 'active'";
    $q = $conn->prepare($sql);
    $q -> execute();
    $browse = $q -> fetchAll();
    foreach($browse as $row)
    {
      if(($uname == $row['username']) && ($upass== $row['password']) )
      {
        $match="true";
        $UserType = $row['user_type'];
        break;
      }
    }

    // SINCE TRUE WHICH MEANS MATCH FOUND.. START AND STORE SESSIONS
    if($match == "true")
    {
      if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
      $_SESSION["ocsc_uname"] = $uname;
      $_SESSION["ocsc_upass"] = $upass;
      $_SESSION["ocsc_utype"] = $UserType;

      $year = date('Y');
      $year = substr($year,2,3);
      $trail_id =uniqid('at'.$year);  

      $sql = "INSERT INTO trails VALUES(?,?,?,?,?,?,?)";
      $q = $conn -> prepare($sql);    
      $q -> execute(array($trail_id,'Session','Log', 'Signed-IN', ' ', date('Y/m/d H:i:s'),  $_SESSION["ocsc_uname"]  ));

  	}

	$output[] = array ($match); 				 	
	echo json_encode($output); // RETURN data to login.php
	$conn = null; // CLOSE DATABASE CONNECTION

?>
