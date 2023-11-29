<?php
include 'includes/db.php';
session_start();
if(!$_SESSION['username'])
{
  header('location: login.php');
}
$username=$_SESSION['username'];
        
// .......... update start 
// if(isset($_POST['updatequotBtn'])){
$lead_edit_id = $_POST['lead_edit_id'];

$leadname = $_POST['lead_name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];

$address=$_POST['address'];
$state = $_POST['lead_state'];
$leadtype=$_POST['lead_type'];

$source=$_POST['lead_source'];
$ebillamt=$_POST['eb_amt'];
$phase=$_POST['phase_select'];

$appointmentdt=$_POST['est_appoint_dt'];
$statustc = $_POST['tc_status'];
$notestc=$_POST['tc_notes'];



date_default_timezone_set("Asia/Manila");
$date1 = date("Y-m-d H:i:s");

$query = "UPDATE `leads` 
  SET   
    `leadname` = '$leadname',
    `mobile` = '$mobile',
    `email` = '$email',

    `address` = '$address',
    `state` = '$state',
    `leadtype` = '$leadtype',

    `source` = '$source',
    `ebillamt` = '$ebillamt',
    `phase` = '$phase',

    `appointmentdt` = '$appointmentdt',
    `statustc` = '$statustc',
    `notestc` = '$notestc',
    `is_deleted` = '0'
  WHERE `leadid` = '$lead_edit_id'";
	$query_run = mysqli_query($con, $query);	
// print_r($query);
	if ($query_run){
		$_SESSION['SUCCESS'] = "Lead Updated successfully";
		header('location: leads_list.php');
	} else {
		$_SESSION['Failure'] = "Lead Not Updated";
		header('location: leads_list.php');
	
	}
// }
?>