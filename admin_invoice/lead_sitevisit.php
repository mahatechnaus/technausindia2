<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

// if (isset($_GET['leadid'])){
    $leadid_site = $_GET['leadid'];

    $selquery = "SELECT * FROM leads where  leadid= $leadid_site";
    $query_sel = mysqli_query($con, $selquery);
    $row_data = mysqli_fetch_assoc($query_sel);
// }


// print_r($leadid_site);
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
                    <div>Leads - Site visit details
                        <div class="page-title-subheading">Create, Edit, Delete leads here
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a class="btn mr-3 mb-3 btn-primary" href="leads_conversion_list.php" style="font-size:14px;"><i
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
                                <li class="active" id="sitevisit"><strong>Site visit</strong></li>
                                <li id="quotation"><strong>Quotation</strong></li>
                                <li id="invoice"><strong>Invoice</strong></li>
                            </ul>
                        </form>
                    </div>
                </div>
                <!-- ....... end step form .........  -->


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
                                                <label>Lead Name</label> <br>
                                                <input type="text" id="lead_name" name="lead_name" class="form-control"
                                                    placeholder="Lead Name" value="<?php echo $row_data['leadname']; ?>"
                                                    readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile</label> <br>
                                                <input type="text" id="mobile" name="mobile" class="form-control"
                                                    placeholder="Mobile" value="<?php echo $row_data['mobile']; ?>"
                                                    readonly>
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
                                                <label>Site visited on</label> <span style="color:red;">*</span>
                                                <br>
                                                <input type="date" id="site_visit_dt" name="site_visit_dt"
                                                    class="form-control" required>
                                                <!-- value="<?php echo date('Y-m-d'); ?>" 
                                                     value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" -->
                                            </div>
                                            <!-- 
                                            <div class="form-group">
                                                <label>Status by Site visit</label> <span style="color:red;">*</span>
                                                <br>
                                                <select name="tc_status" id="tc_status" class="form-control" required>
                                                    <option value="" hidden>Choose Status</option>
                                                    <option value="Hot">Hot</option>
                                                    <option value="Warm">Warm</option>
                                                    <option value="Cold">Cold</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div> -->

                                            <div class="form-group">
                                                <label>Status by Site visit</label> <span style="color:red;">*</span>
                                                <br><strong>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" style="background-color:red;"
                                                            type="radio" name="tc_status" id="hotStatus" value="Hot"
                                                            required>
                                                        <label class="form-check-label" for="hotStatus"
                                                            style="color:red;">Hot</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tc_status"
                                                            id="warmStatus" value="Warm" required>
                                                        <label class="form-check-label" for="warmStatus"
                                                            style="color:orange;">Warm</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tc_status"
                                                            id="coldStatus" value="Cold" required>
                                                        <label class="form-check-label" for="coldStatus"
                                                            style="color:green;">Cold</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="tc_status"
                                                            id="otherStatus" value="Others" required>
                                                        <label class="form-check-label" for="otherStatus">Others</label>
                                                    </div>
                                                </strong>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Status Details Card -->
                                <div class="col-8 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Notes</label> <span style="color:red;">*</span> <br>
                                                <textarea id="ta_notes" name="ta_notes" class="form-control" rows="4"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- --------- end of html form design ---  -->

                            <div class="successmsg p-3"
                                style="background-color: <?php echo isset($_GET['success']) && $_GET['success'] == 1 ? '#4CAF50' : (isset($_GET['error']) && $_GET['error'] == 1 ? '#f44336' : ''); ?>; color: white;">
                                <?php echo $message; ?>
                            </div>
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