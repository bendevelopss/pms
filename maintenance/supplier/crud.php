 <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />    
<?php
$content1=mysql_query("select max(supplier_no) as max from supplier");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;


$sname=$_POST['txtname'];
$phone=$_POST['txtphone'];
$fax=$_POST['txtfax'];
$email=$_POST['txtemail'];
$fname=$_POST['txtfirstname'];
$mname=$_POST['txtmiddlename'];
$lname=$_POST['txtlastname'];
$contact=$_POST['txtcontact'];
$street=$_POST['txtstreet'];
$city=$_POST['txtcity'];

$status="Active";
$cont= strlen($contact);







if(isset($_POST['btnAdd']))

{
                          include("../include/connect.php");
                          
$status="Active";


$sql="INSERT into supplier (supp_name, phone, fax, email, firstname, middlename, lastname, contact, street,city, status ) values('".$sname."','".$phone."',
 '".$fax."', '".$email."', '". $fname."','".$mname."', '".$lname."', '".$contact."', '".$street."', '".$city."', '".$status."')";
  
 $result = $dbLink->query($sql);
 
        // Check if it was successfull
        if($result) 
         {
          
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Supplier Added!","success");';
        echo '},);</script>';
       
        }
        else 
          {
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Error!","There Was an error","error");';
              echo '},);</script>'; 
         }


}







//Update query
  if(isset($_POST['btnSave']))
                {
                    $supp_no = $_POST['supp_no1'];
                    $supp_name = $_POST['supp_name1'];
                    $phone = $_POST['phone_num1'];
                    $fax = $_POST['fax1'];
                    $firstname = $_POST['firstname1'];
                    $middlename = $_POST['middlename1'];
                    $lastname = $_POST['lastname1'];
                    $contact = $_POST['contact1'];
                    $email = $_POST['email1'];
                    $address = $_POST['address1'];
                    $city = $_POST['city1'];
                  
                    mysql_query("UPDATE supplier SET supp_name='".$supp_name."',phone='".$phone."',fax='".$fax."',email='".$email."',firstname='".$firstname."',middlename='".$middlename."',lastname='".$lastname."',contact='".$contact."',street='".$address."', city='".$city."' WHERE supplier_no='".$supp_no."'");
                     echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Success!","Update Successful!","success");';
                     echo '},);</script>';
 
                                       
                }


                if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";

include("../include/connect.php");
$sql="UPDATE supplier set status='".$status."' 
  where supplier_no='{$nos}'";
if ($dbLink->query($sql) === TRUE) 
         {
          
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Supplier Deleted!","success");';
        echo '},);</script>';
       
        } 

else 
        {
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Error!","There Was an error","error");';
              echo '},);</script>'; 
        }


}


?>