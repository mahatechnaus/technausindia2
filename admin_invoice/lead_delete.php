<?php  
include 'includes/db.php';
 $id=$_POST["id"];
 $sql = mysqli_query($con, "UPDATE leads SET is_deleted = '1' WHERE leadid = '$id'"); 
 if($sql)  
 {  echo 'Lead id '.  $id . ' - Quotation Deleted Successfully';   }  
 ?>