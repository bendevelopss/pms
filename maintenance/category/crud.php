<?php
$content1=mysql_query("SELECT max(category_no) as max from category");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;


$cname=$_POST['txtname'];


$desc1= mysql_real_escape_string($cname);

$find=mysql_query("SELECT * from category where category_name='".$desc1."' and status='active'");
$total1=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$category_name=$row['category_name'];


echo'<input type="hidden" id="dup" value="'.$category_name.'"/>';


if(isset($_POST['btnAdd']) && !empty($cname) && $category_name==$desc1)

{
 echo '<script type="text/javascript">alert("Duplicate category is not allowed")</script>'; 

}


else if(isset($_POST['btnAdd']))

{    
include("../include/connect.php");

                          
$status="Active";



$sql="INSERT into category (category_name,  status) values('".$cname."','".$status."')";
  
 $result = $dbLink->query($sql);
 
        // Check if it was successfull
        if($result) 
         {
          
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Category Added!","success");';
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
                    $category_no11 = $_POST['category_no1'];
                    $c_name = $_POST['c_name1'];
                  
                    mysql_query("UPDATE category SET category_name='".$c_name."' WHERE category_no='".$category_no11."'");
                     echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Update Successful!","success");';
        echo '},);</script>';
                                       
                }

                if(isset($_POST['btnRemove']))
                 {
include("../include/connect.php");
 $nos=$_POST['btnRemove'];

 $status="inactive";


$sql="UPDATE category set status='".$status."' 
  where category_no='{$nos}'";
 
          if ($dbLink->query($sql) === TRUE) 
         {
          
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Category Deleted!","success");';
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