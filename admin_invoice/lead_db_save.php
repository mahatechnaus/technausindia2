<?php
include 'includes/db.php';
session_start();
if(!$_SESSION['username'])
{
  header('location: login.php');
}

        
$query_count = "SELECT * FROM leads";
$result_count = mysqli_query($con, $query_count);
$lead_no = mysqli_num_rows($result_count);
$lead_no = "ENQ000" . $lead_no;

print_r($lead_no);

date_default_timezone_set("Asia/Manila");
$lead_dt = date("Y-m-d H:i:s");
print_r($lead_dt);
$lead_name=$_POST['lead_name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];
$lead_state=$_POST['lead_state'];

$lead_type=$_POST['lead_type'];
$lead_source=$_POST['lead_source'];
$eb_amt=$_POST['eb_amt'];
$phase_select=$_POST['phase_select'];
$est_appoint_dt=$_POST['est_appoint_dt'];

// print_r($est_appoint_dt);

$tc_status=$_POST['tc_status'];
$tc_notes=$_POST['tc_notes'];


$insert_query = "INSERT INTO leads 
                (leadno, lddate, source, leadtype, leadname, mobile, email, address, area, state, ebillamt, 
                phase, appointmentdt, assignto, statustc, notestc, nextcalltcdt, appx_kw, sanction_load, 
                space_solar, statusta, quot_dt, quot_no, quot_price, is_deleted) 
                VALUES 
                ('$lead_no', '$lead_dt', '$lead_source', '$lead_type', '$lead_name', '$mobile', '$email', 
                '$address', '', '$lead_state', '$eb_amt', '$phase_select', '$est_appoint_dt', '', '$tc_status', 
                '$tc_notes', '', '', '', '', '', '', '', '', '0')";

$result = mysqli_query($con, $insert_query);


if ($result) {
    // Record saved successfully
    header('location: leads_create.php?success=1');
} else {
    // Record failed to save
    header('location: leads_create.php?error=1');
}

?>
