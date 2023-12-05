<?php
include 'includes/db.php';
session_start();
if(!$_SESSION['username'])
{
  header('location: login.php');
}


$lead_quot_id=$_POST['lead_quot_id'];
date_default_timezone_set("Asia/Manila");

        
$query_lead = "SELECT * FROM leads where leadid='$lead_quot_id'";
$result_lead = mysqli_query($con, $query_lead);
$row_all = mysqli_fetch_assoc($result_lead);
print_r($row_all['leadname']);

$emp_id='0';
$leadid=$row_all['leadid'];
$leadno=$row_all['leadno'];
$lead_quot_dt = date("Y-m-d H:i:s");
$leadname=$row_all['leadname'];
$mobile=$row_all['mobile'];
$email=$row_all['email'];
$address=$row_all['address'];
$state=$row_all['state'];
$phase=$row_all['phase'];

// print_r($lead_no);


print_r($lead_quot_dt);

$insert_query="INSERT INTO `quotation` 
(`emp_id`,`leadid`,`leadno`,`quotdate`,`owner`,`mobile`, `email`, `address`, `State`,`phase`,`is_deleted`) 
 VALUES ('$emp_id','$leadid','$leadno','$lead_quot_dt', '$leadname',
  '$mobile', '$email', '$address', '$state', '$phase','0')";




// print_r($insert_query);

$result = mysqli_query($con, $insert_query);
$query_ld_update = "UPDATE `leads` SET `is_quotation` = '1' WHERE `leadid` = '$lead_quot_id'";
$result_ld_update = mysqli_query($con, $query_ld_update);	

if ($result) {
    // Record saved successfully
    // header('location: leads_list.php?success=1'); 
    header('location: leads_list.php?success=1&leadname=' . urlencode($leadname));

} else {
    // Record failed to save
    header('location: leads_list.php?error=1');
}

?>