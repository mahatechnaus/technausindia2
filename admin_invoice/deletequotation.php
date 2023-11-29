<?php  
include 'includes/db.php';
 $id=$_POST["id"];
 $sql = mysqli_query($con, "UPDATE quotation SET is_deleted = '1' WHERE owner_id = '$id'"); 
 if($sql)  
 {  echo 'Ownder id '.  $id . ' - Quotation Deleted Successfully';   }  
 ?>