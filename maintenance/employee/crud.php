<?php
$content1=mysql_query("select max(emp_no) as max from employee");
$total1=@mysql_affected_rows();

$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$usernames=$_POST['txtusername'];
$passwords=$_POST['txtpassword'];
$fname=$_POST['txtfirstname'];
$mname=$_POST['txtmiddlename'];
$lname=$_POST['txtlastname'];
$position=$_POST['pname'];
$contact=$_POST['txtcontact'];
$email=$_POST['txtemail'];
$street=$_POST['txtstreet'];
$city=$_POST['txtcity'];



    if(isset($_POST['btnAdd'])) 
    {
      include("../include/connect.php");
                         

     $status="Active";
$statuss="inactive";

$sql="INSERT into employee (firstname, middlename, lastname, position, contact, email, street,city, username, password, status ) 
  values('". $fname."','".$mname."', '".$lname."','".$position."'  ,'".$contact."', '".$email."','".$street."', '".$city."', '".$_POST['txtusername']."','".$_POST['txtpassword']."','".$status."')";

mysql_query("INSERT into sample (user, pass, position , status, account_status ) 
  values('".$_POST['txtusername']."','".$_POST['txtpassword']."', '".$position."' ,'".$statuss."','".$status."')");
  $result = $dbLink->query($sql);
 
        // Check if it was successfull
        if($result) 
         {
          
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Employee Added!","success");';
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
                    $emp_no = $_POST['emp_no1'];           
                    $fname=$_POST['firstname1'];
                    $mname=$_POST['middlename1'];
                    $lname=$_POST['lastname1'];
                    $position=$_POST['pname1'];
                    $contact=$_POST['contact1'];
                    $email=$_POST['email1'];
                    $street=$_POST['street1'];
                    $city=$_POST['city1'];
                  $username=$_POST['username1'];
                  $password=$_POST['password1'];
                  
                    mysql_query("UPDATE employee SET firstname='".$fname."',middlename='".$mname."',lastname='".$lname."',position='".$position."', contact='".$contact."', email='".$email."', street='".$street."', city='".$city."', username='".$username."', password='".$password."' WHERE emp_no='".$emp_no."'");
                    
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Success!","Employee Updated!","success");';
                    echo '},);</script>';
                     
                                       
                }
//delete query
 if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];
include("../include/connect.php");
 $status="inactive";


$sql="UPDATE employee set status='".$status."' 
  WHERE emp_no='{$nos}'";

$content11=mysql_query("SELECT * from employee where emp_no='".$nos."' ");
$total11=@mysql_affected_rows();
$row11=mysql_fetch_array($content11);

mysql_query("UPDATE sample set account_status='".$status."' 
  where user='".$row11['username']."' and pass='".$row11['password']."'");

 if ($dbLink->query($sql) === TRUE) 
         {
          
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Employee Deleted!","success");';
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