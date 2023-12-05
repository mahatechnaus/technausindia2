<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';
$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];        
// Display success message
$message = "";
if (isset($_GET['success']) && $_GET['success'] == 1) {
   $message = "Lead saved successfully";
}
// Display error message
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $message = "Failed to save Lead";
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

                <div class="successmsg p-3"
                    style="background-color: <?php echo isset($_GET['success']) && $_GET['success'] == 1 ? '#4CAF50' : (isset($_GET['error']) && $_GET['error'] == 1 ? '#f44336' : ''); ?>; color: white;">
                    <?php echo $message; ?>
                </div>
                <div class="main-card mb-3 card ">
                    <div class="card-body">
                        <form action="lead_db_save.php" method="POST">
                            <input type="hidden" name="user_id" id="imp" value="<?php echo $user_id; ?>">

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
                                                    placeholder="Lead Name" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile</label> <span style="color:red;"> *</span> <br>
                                                <input type="text" id="mobile" name="mobile" class="form-control"
                                                    placeholder="Mobile" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label><br>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label><br>
                                                <input type="text" id="address" name="address" class="form-control"
                                                    placeholder="Address">
                                            </div>

                                            <div class="form-group">
                                                <label>State </label> <span style="color:red;">*</span> <br>
                                                <select name="lead_state" id="lead_state" class="form-control" required>
                                                    <option value="" hidden>Choose State</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                    <option value="Tamilnadu">Tamilnadu</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Others">Others</option>
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
                                                <select name="lead_type" id="lead_type" class="form-control">
                                                    <option value="" hidden>Choose lead type</option>
                                                    <option value="Residential">Residential</option>
                                                    <option value="Commercial">Commercial</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Lead Source</label> <br>
                                                <select name="lead_source" id="lead_source" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose source</option>
                                                    <option value="External Source">External Source</option>
                                                    <option value="Website">Website</option>
                                                    <option value="Staff referral">Staff referral</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="News Paper Ad">News Paper Ad</option>
                                                    <option value="Google ads">Google ads</option>
                                                    <option value="Phone enquiry">Phone enquiry</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>EB bill amount</label><br>
                                                <input type="text" id="eb_amt" name="eb_amt" class="form-control"
                                                    placeholder="EB amount" value="0">
                                            </div>

                                            <div class="form-group">
                                                <label>Phase </label> <br>
                                                <select name="phase_select" id="phase_select" class="form-control">
                                                    <option value="" hidden>Choose phase</option>
                                                    <option value="Single phase">Single phase</option>                                       
                                                    <option value="Three phase">Three phase</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Estimated site visit</label> <span style="color:red;">*</span>
                                                <br>
                                                <input type="date" id="est_appoint_dt" name="est_appoint_dt"
                                                    class="form-control" required>
                                                <!-- value="<?php echo date('Y-m-d'); ?>" 
                                                     value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" -->
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
                                                    <option value="" hidden>Choose Status</option>
                                                    <option value="Interested">Interested</option>
                                                    <option value="Not Interested">Not Interested</option>
                                                    <option value="Hold">Hold</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Telecaller Notes</label><br>
                                                <textarea id="tc_notes" name="tc_notes" class="form-control"
                                                    rows="4"></textarea>
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
                  

                            <div id="clicks" hidden>1</div>
                            <button type="reset" class="btn btn-danger" id="reset" disabled>Reset</button>
                            <input type="submit" class="btn btn-success" id="submitBtn" name="submit" value="Save">
                            <!-- <input type="submit" class="btn btn-success" id="save" name="submit" value="Save"> -->

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