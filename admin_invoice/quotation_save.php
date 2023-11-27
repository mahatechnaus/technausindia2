<?php
include 'includes/db.php';
session_start();
if(!$_SESSION['username'])
{
  header('location: login.php');
}

$username=$_SESSION['username'];
$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];


        
$query_c = "SELECT * FROM quotation";

$query_run_c = mysqli_query($con, $query_c);

$quot_no = mysqli_num_rows($query_run_c);

$quotation_no = 200 + $quot_no;


$emp_id=$_POST['emp_id'];

$cust_name=$_POST['cust_title'] ." ". $_POST['cust_name'];
$cust_mobile=$_POST['cust_mobile'];
$cust_email=$_POST['cust_email'];
$cust_address = $_POST['cust_st'] .", ". $_POST['cust_area'];

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

$sqla="INSERT INTO `quotation` 
(`emp_id`,`quotdate`,`owner`, `quotation_no`, `mobile`, `email`, `address`, `State`, `meterno`, `distributor`,
 `rooftype`, `rooflevel`, `phase`,
  `panelbrand`, `panelwatts`, `panelcount`,
  `inverterbrand`, `invertertype`, `inverterkw`, `invertercount`,
 `included`, `batterycapacity`, `batterycount`, 
 `paymenttype`, `totoutlay`, `grandtotal`,`is_deleted`) 
 VALUES ('$emp_id','$date1','$cust_name','$quotation_no', '$cust_mobile', '$cust_email', '$cust_address', '$cust_state', '$cust_meter', '$distributor_name',
  '$roof_type', '$roof_level', '$phase_select', 
  '$panel_brand', '$panel_watts', '$no_panel', '$inverter_brand', '$inverter_type', '$no_inverter_kw', '$no_inverter',
  '$included_select', '$battery_capacity', '$no_battery', '$payment_type', '$actual_amt', '$actual_amt','0')";

$result = mysqli_query($con, $sqla);


if ($result) {
    // Record saved successfully
    header('location: form_quotation.php?success=1');
} else {
    // Record failed to save
    header('location: form_quotation.php?error=1');
}

?>