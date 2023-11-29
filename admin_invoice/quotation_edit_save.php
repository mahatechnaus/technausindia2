<?php
include 'includes/db.php';
session_start();
if(!$_SESSION['username'])
{
  header('location: login.php');
}
$username=$_SESSION['username'];
        
$query_c = "SELECT * FROM quotation";
$query_run_c = mysqli_query($con, $query_c);
$quot_no = mysqli_num_rows($query_run_c);
$quotation_no = 200 + $quot_no;

// .......... update start 

// if(isset($_POST['updatequotBtn'])){
$quot_id = $_POST['quot_edit_id'];
$cust_name=$_POST['cust_name'];
$cust_mobile=$_POST['cust_mobile'];
$cust_email=$_POST['cust_email'];
$cust_address = $_POST['cust_st'];
$cust_state=$_POST['cust_state'] ." - ". $_POST['cust_pincode'];
$cust_meter=$_POST['cust_meter'];
$distributor_name=$_POST['distributor_name'];
$roof_type=$_POST['roof_type'];
$roof_level=$_POST['roof_level'];
$phase_select=$_POST['phase_select'];
$panel_brand=$_POST['panel_brand'];
$panel_watts=$_POST['panel_watts'];
$no_panel=$_POST['no_panel'];
$inverter_brand=$_POST['inverter_brand'];
$inverter_type=$_POST['inverter_type'];
$no_inverter_kw=$_POST['no_inverter_kw'];
$no_inverter=$_POST['no_inverter'];
$included_select=$_POST['included_select'];
$battery_capacity=$_POST['battery_capacity'];
$no_battery=$_POST['no_battery'];
$payment_type=$_POST['payment_type'];
$actual_amt=$_POST['actual_amt'];
date_default_timezone_set("Asia/Manila");
$date1 = date("Y-m-d H:i:s");

$query = "UPDATE `quotation` 
  SET 
    `quotdate` = '$date1',
    `owner` = '$cust_name',
    -- `quotation_no` = '$quotation_no',
    `mobile` = '$cust_mobile',
    `email` = '$cust_email',
    `address` = '$cust_address',
    `State` = '$cust_state',
    `meterno` = '$cust_meter',
    `distributor` = '$distributor_name',
    `rooftype` = '$roof_type',
    `rooflevel` = '$roof_level',
    `phase` = '$phase_select',
    `panelbrand` = '$panel_brand',
    `panelwatts` = '$panel_watts',
    `panelcount` = '$no_panel',
    `inverterbrand` = '$inverter_brand',
    `invertertype` = '$inverter_type',
    `inverterkw` = '$no_inverter_kw',
    `invertercount` = '$no_inverter',
    `included` = '$included_select',
    `batterycapacity` = '$battery_capacity',
    `batterycount` = '$no_battery',
    `paymenttype` = '$payment_type',
    `totoutlay` = '$actual_amt',
    `grandtotal` = '$actual_amt',
    `is_deleted` = '0'
  WHERE `owner_id` = '$quot_id'";
	$query_run = mysqli_query($con, $query);	
// print_r($query);
	if ($query_run){
		$_SESSION['SUCCESS'] = "Quotation Updated successfully";
		header('location: quotation.php');
	} else {
		$_SESSION['Failure'] = "Quotation Not Updated";
		header('location: quotation.php');
	
	}
// }
?>