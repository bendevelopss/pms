

    <?php           // ESTABLISH CONNECTION TO MYSQL


                              //FETCH ALL VARIABLES
    $id = $_POST['idKey'];

                                                                 // UPDATE DATA TO DATABASE
$sql = "UPDATE employee SET status = ? WHERE emp_id = ?";
$q = $conn -> prepare($sql);
$q -> execute(array('inactive',$id));

$year = date('Y');
$year = substr($year,2,3);
$trail_id =uniqid('at'.$year);  


$q = $conn -> prepare($sql);    



$conn = null;

?>  
