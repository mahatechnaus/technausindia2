<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';


if(isset($_POST['lead_edit_btn'])){
    $lead_id=$_POST['lead_edit_id'];    
    // print_r($quot_id);

    $sqllead= "SELECT * FROM leads WHERE leadid = '$lead_id'";
    $sql_result = mysqli_query($con, $sqllead);
    $row_all = mysqli_fetch_assoc($sql_result);

}

      
// Display success message
$message = "";
if (isset($_GET['success']) && $_GET['success'] == 1) {
   $message = "Lead updated successfully";
}
// Display error message
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $message = "Failed to update lead";
}
?>
<link href="assets/css/step_form.css" rel="stylesheet">
<div class="app-main__outer">
    <div class="app-main__inner">
        <!-- ..................start title info ..  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-global">
                        </i>
                    </div>
                    <div>Leads
                        <div class="page-title-subheading">Create, Edit, Delete leads here
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a class="btn mr-3 mb-3 btn-primary" href="leads_list.php" style="font-size:14px;"><i
                            class="fa fa-arrow-left"></i>&nbsp;
                        Back
                    </a>
                </div>
            </div>
        </div>
        <!-- .................end title info ..  -->

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">

                <!-- .... step form .........  -->
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="leadpg"><strong>Lead</strong></li>
                                <li id="sitevisit"><strong>Site visit</strong></li>
                                <li id="quotation"><strong>Quotation</strong></li>
                                <li id="invoice"><strong>Invoice</strong></li>
                            </ul>
                        </form>
                    </div>
                </div>
                <!-- ....... end step form .........  -->


                <div class="main-card mb-3 card ">
                    <div class="card-body">
                        <form action="lead_db_edit_save.php" method="POST">
                            <!-- <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $lead_id; ?>"> -->

                            <!-- ---- start html design form ---  -->
                            <div class="row mt-3">
                                <!-- Lead Information Card -->
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            Lead Information
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Lead Name</label> <span style="color:red;"> *</span> <br>
                                                <input type="text" id="lead_name" name="lead_name" class="form-control"
                                                    placeholder="Lead Name" value="<?php echo $row_all['leadname']; ?>"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile</label> <span style="color:red;"> *</span> <br>
                                                <input type="text" id="mobile" name="mobile" class="form-control"
                                                    placeholder="Mobile" value="<?php echo $row_all['mobile']; ?>"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label><br>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email" value="<?php echo $row_all['email']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label><br>
                                                <input type="text" id="address" name="address" class="form-control"
                                                    placeholder="Address" value="<?php echo $row_all['address']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>State </label> <span style="color:red;">*</span> <br>

                                                <select name="lead_state" id="lead_state" class="form-control" required>
                                                    <option value="" hidden>Choose State</option>
                                                    <?php
                                                     $states = array("Puducherry", "Tamilnadu", "Andhra Pradesh", "Kerala", "Karnataka", "Others");
                                                     foreach ($states as $stateOption) {
                                                     $selected = ($stateOption == $row_all['state']) ? 'selected' : '';
                                                     echo "<option value=\"$stateOption\" $selected>$stateOption</option>";
                                                        }
                                                    ?>
                                                </select>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lead Details Card -->
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            Lead Details
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Lead Type</label> <br>

                                                <select name="lead_type" id="lead_type" class="form-control" required>
                                                    <option value="" hidden>Choose lead type</option>
                                                    <?php
                                                     $ldtype = array("Residential", "Commercial","Others");
                                                     foreach ($ldtype as $ldtypeOption) {
                                                     $selected = ($ldtypeOption == $row_all['leadtype']) ? 'selected' : '';
                                                     echo "<option value=\"$ldtypeOption\" $selected>$ldtypeOption</option>";
                                                        }
                                                    ?>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label>Lead Source</label> <br>

                                                <select name="lead_source" id="lead_source" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose source</option>
                                                    <?php
                                                     $ldsource = array("External Source","Website","Staff referral","Facebook",
                                                     "News Paper Ad","Google ads","Phone enquiry",
                                                     "Others");
                                                     foreach ($ldsource as $ldsourceOption) {
                                                     $selected = ($ldsourceOption == $row_all['source']) ? 'selected' : '';
                                                     echo "<option value=\"$ldsourceOption\" $selected>$ldsourceOption</option>";
                                                        }
                                                    ?>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label>EB bill amount</label><br>
                                                <input type="text" id="eb_amt" name="eb_amt" class="form-control"
                                                    placeholder="EB amount" value="<?php echo $row_all['ebillamt']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Phase </label> <br>

                                                <select name="phase_select" id="phase_select" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose phase</option>
                                                    <?php
                                                      $phasearr = array("Single phase","Double phase","Three phase","Others");
                                                     foreach ($phasearr as $phaseOption) {
                                                       $selected = ($phaseOption == $row_all['phase']) ? 'selected' : '';
                                                       echo "<option value=\"$phaseOption\" $selected>$phaseOption</option>";
                                                    }
                                                   ?>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label>Estimated site visit</label> <span style="color:red;">*</span>
                                                <br>
                                                <input type="date" id="est_appoint_dt" name="est_appoint_dt"
                                                    class="form-control" value="<?php 
                                                     $estdt= $row_all['appointmentdt'];
                                                      echo  $estdt; ?>" required>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Status Details Card -->
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            Status Details
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Status by Telecaller</label> <span style="color:red;">*</span>
                                                <br>

                                                <select name="tc_status" id="tc_status" class="form-control" required>
                                                    <option value="" hidden>Choose source</option>
                                                    <?php
                                                     $tcstatus = array("Interested","Not Interested","Hold","Others");
                                                     foreach ($tcstatus as $tcstatusOption) {
                                                     $selected = ($tcstatusOption == $row_all['statustc']) ? 'selected' : '';
                                                     echo "<option value=\"$tcstatusOption\" $selected>$tcstatusOption</option>";
                                                        }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>Telecaller Notes</label><br>
                                                <textarea id="tc_notes" name="tc_notes" class="form-control"
                                                    rows="4"><?php echo $row_all['notestc']; ?></textarea>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Status Details Card -->
                                <div class="col-12 mt-3">

                                </div>
                            </div>

                            <!-- --------- end of html form design ---  -->

                            <div class="successmsg p-3"
                                style="background-color: <?php echo isset($_GET['success']) && $_GET['success'] == 1 ? '#4CAF50' : (isset($_GET['error']) && $_GET['error'] == 1 ? '#f44336' : ''); ?>; color: white;">
                                <?php echo $message; ?>
                            </div>

                            <div id="clicks" hidden>1</div>
                            <button type="reset" class="btn btn-danger" id="reset" disabled>Reset</button>


                            <input type="hidden" name="lead_edit_id" value="<?php echo $row_all['leadid']; ?>">
                            <input type="submit" class="btn btn-success" id="updateleadBtn" name="submit" value="Save">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>




    <script>
    function isNumeric(event) {
        var charCode = (event.which) ? event.which : event.keyCode;

        // Allow only numeric characters (0-9)
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
            return false;
        }
        return true;
    }
    </script>