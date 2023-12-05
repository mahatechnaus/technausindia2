<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';



if(isset( $_GET['leadid'])){
    $lead_id_quot = $_GET['leadid'];
    $sqlquot= "SELECT * FROM quotation WHERE leadid = '$lead_id_quot'";
    $sql_result = mysqli_query($con, $sqlquot);
    $row_all = mysqli_fetch_assoc($sql_result);

}
?>
<style type="text/css">
.spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -20px;
    margin-left: -20px;
    display: none;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>


<link href="assets/css/step_form.css" rel="stylesheet">

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-global">
                        </i>
                    </div>
                    <div>Lead -> Quotation
                        <div class="page-title-subheading">Create, Edit, Delete invoices here
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
                                <li class="active" id="quotation"><strong>Quotation</strong></li>
                                <li id="invoice"><strong>Invoice</strong></li>
                            </ul>
                        </form>
                    </div>
                </div>
                <!-- ....... end step form .........  -->


                <div class="main-card mb-3 card">
                    <div class="card-header">
                        Lead Information 
                     
                    </div>
                    <div class="card-body">
                        <form action="quotation_edit_save.php" method="POST">
                            <?php
$stateAndZip = $row_all['State'];
$parts = explode(' - ', $stateAndZip);
$state = isset($parts[0]) ? $parts[0] : '';
$zipcode = isset($parts[1]) ? $parts[1] : '';
?>
       <label style="font-size:12px;">If you don't know the value, please enter 'NA'</label>
                            <div class="row mb-3">
                     
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Customer name </label> <span style="color:red;"> *</span><br>
                                                <input type="text" id="cust_name" name="cust_name" class="form-control"
                                                    placeholder="Customer name"
                                                    value="<?php echo $row_all['owner']  ?? 'NA'; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Mobile </label><span style="color:red;"> *</span><br>
                                                <input type="text" id="cust_mobile" name="cust_mobile"
                                                    class="form-control" placeholder="Mobile"
                                                    value="<?php echo $row_all['mobile']  ?? 'NA'; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label><br>
                                                <input type="text" id="cust_email" name="cust_email"
                                                    class="form-control" placeholder="Email"
                                                    value="<?php echo $row_all['email'] !== '' ? $row_all['email'] : 'NA'; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Street </label><span style="color:red;"> *</span><br>
                                                <input type="text" id="cust_st" name="cust_st" class="form-control"
                                                    placeholder="Street"
                                                    value="<?php echo $row_all['address'] !== '' ? $row_all['address'] : 'NA'; ?>"
                                                    required>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                                <!-- end of cust details  -->

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label>State </label><span style="color:red;"> *</span><br>
                                                <select name="cust_state" id="cust_state" class="form-control" required>
                                                    <option value="" hidden>Choose State</option>
                                                    <?php
                                                     $states = array("Puducherry", "Tamilnadu", "Andhra Pradesh", "Kerala", "Karnataka", "Others");
                                                     foreach ($states as $stateOption) {
                                                     $selected = ($stateOption == $state) ? 'selected' : '';
                                                     echo "<option value=\"$stateOption\" $selected>$stateOption</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Pincode </label><span style="color:red;"> *</span><br>
                                                <input type="text" id="cust_pincode" name="cust_pincode"
                                                    class="form-control" placeholder="Pincode"
                                                    value="<?php echo $zipcode !== '' ? $zipcode : 'NA'; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Consumer / Meter No. </label><span style="color:red;">
                                                    *</span><br>
                                                <input type="text" id="cust_meter" name="cust_meter"
                                                    class="form-control" placeholder="Consumer / Meter No."
                                                    value="<?php echo $row_all['meterno'] ?? 'NA';?>" required>
                                                <!-- <label style="font-size:12px;">If you don't know the consumer number,
                                                    please enter 'NA'</label> -->
                                            </div>

                                            <div class="form-group">
                                                <label>Sanction load </label><span style="color:red;">
                                                    *</span><br>
                                                <input type="text" id="sanction_load" name="sanction_load"
                                                    class="form-control" placeholder="Sanction load"
                                                    value="<?php echo $row_all['sanctionload'] !== '' ? $row_all['sanctionload'] : 'NA'; ?>"
                                                    required>
                                                <!-- <label style="font-size:12px;">If you don't know the Sanction load,
                                                    please enter 'NA'</label> -->
                                            </div>


                                        </div>
                                    </div>
                                </div> <!-- end of building details  -->



                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Distributor Name </label><span style="color:red;"> *</span><br>
                                                <select name="distributor_name" id="distributor_name"
                                                    class="form-control" required>
                                                    <option value="" hidden>Choose distributor</option>
                                                    <?php
                                                      $distributors = array(
                                                     "Electricity Department - Puducherry",
                                                     "Tamil nadu Electricity Board - TN",
                                                     "Others");
                                                     foreach ($distributors as $distributorOption) {
                                                       $selected = ($distributorOption == $row_all['distributor']) ? 'selected' : '';
                                                       echo "<option value=\"$distributorOption\" $selected>$distributorOption</option>";
                                                    }
                                                   ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Roof type </label> <span style="color:red;"> *</span><br>
                                                <select name="roof_type" id="roof_type" class="form-control" required>
                                                    <option value="" hidden>Choose roof type</option>
                                                    <?php
                                                      $rooftypearr = array("RCC","Sheets","Flat Roof","N/A","Others");
                                                     foreach ($rooftypearr as $rooftypeOption) {
                                                       $selected = ($rooftypeOption == $row_all['rooftype']) ? 'selected' : '';
                                                       echo "<option value=\"$rooftypeOption\" $selected>$rooftypeOption</option>";
                                                    }
                                                   ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Roof level </label> <span style="color:red;"> *</span><br>
                                                <select name="roof_level" id="roof_level" class="form-control" required>
                                                    <option value="" hidden>Choose roof level</option>
                                                    <?php
                                                      $rooflevelarr = array("Ground Floor","Three storey","Two storey","One storey","N/A","Others");
                                                     foreach ($rooflevelarr as $rooflevelOption) {
                                                       $selected = ($rooflevelOption == $row_all['rooflevel']) ? 'selected' : '';
                                                       echo "<option value=\"$rooflevelOption\" $selected>$rooflevelOption</option>";
                                                    }
                                                   ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Phase </label> <span style="color:red;"> *</span><br>
                                                <select name="phase_select" id="phase_select" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose phase</option>
                                                    <?php
                                                      $phasearr = array("Single phase","Three phase","N/A","Others");
                                                     foreach ($phasearr as $phaseOption) {
                                                       $selected = ($phaseOption == $row_all['phase']) ? 'selected' : '';
                                                       echo "<option value=\"$phaseOption\" $selected>$phaseOption</option>";
                                                    }
                                                   ?>
                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                </div> <!-- end of eb details  -->
                            </div>



                            <div class="card text-white bg-secondary  mb-1">
                                <h5 class="card-header">System Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Panel Brand </label> <span style="color:#ffffff;"> *</span><br>
                                                <select name="panel_brand" id="panel_brand" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose brand</option>
                                                    <?php
                                                      $panelBrandarr = array("Waaree / Renewsys / Saatvik / Rayzon",
                                                      "Waaree","Renewsys","Saatvik","Rayzon","Others");
                                                     foreach ($panelBrandarr as $panelBrandOption) {
                                                       $selected = ($panelBrandOption == $row_all['panelbrand']) ? 'selected' : '';
                                                       echo "<option value=\"$panelBrandOption\" $selected>$panelBrandOption</option>";
                                                    }
                                                   ?>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-2">

                                            <div class="form-group">
                                                <label>Panel Watts </label> <span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="panel_watts" name="panel_watts"
                                                    class="form-control" placeholder="Example: '540'"
                                                    onkeypress="return isNumeric(event)"
                                                    value="<?php echo $row_all['panelwatts']; ?>" required>

                                                <!-- <select name="panel_watts" id="panel_watts"
                                                    class="form-control" required>
                                                    <option value="" hidden>Choose panel watts</option>
                                                    <?php
                                                      $panelwattsarr = array("540","545","535","Others");
                                                     foreach ($panelwattsarr as $panelWattsOption) {
                                                       $selected = ($panelWattsOption == $row_all['panelwatts']) ? 'selected' : '';
                                                       echo "<option value=\"$panelWattsOption\" $selected>$panelWattsOption W</option>";
                                                    }
                                                   ?>
                                                </select> -->

                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>No. of Panel </label> <span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="no_panel" name="no_panel" class="form-control"
                                                    placeholder="Panel count"
                                                    value="<?php echo $row_all['panelcount']; ?>"
                                                    onkeypress="return isNumeric(event)" required
                                                    onchange="calculateTotalAmount()">
                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                    </div>
                                    <hr style=" border: 1px dotted  #fff; margin:0px;">
                                    <div class="row ">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Inverter Brand </label> <span style="color:#ffffff;">
                                                    *</span><br>
                                                <select name="inverter_brand" id="inverter_brand" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose Inverter brand</option>
                                                    <?php
                                                      $panelInvBrandarr = array("Growatt/ EVVO/ UTL/ Deye/ K-Solar",
                                                      "Growatt","EVVO","UTL","Deye","K-Solar","Others");
                                                     foreach ($panelInvBrandarr as $panelInvBrandOption) {
                                                       $selected = ($panelInvBrandOption == $row_all['inverterbrand']) ? 'selected' : '';
                                                       echo "<option value=\"$panelInvBrandOption\" $selected>$panelInvBrandOption</option>";
                                                    }
                                                   ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Inverter Type </label> <span style="color:#ffffff;"> *</span><br>
                                                <select name="inverter_type" id="inverter_type" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose Inverter type</option>
                                                    <?php
                                                      $panelInvTypearr = array("On-Grid Inverter",
                                                      "Off-Grid Inverter","Hybrid Inverter","Others");
                                                     foreach ($panelInvTypearr as $panelInvTypeOption) {
                                                       $selected = ($panelInvTypeOption == $row_all['invertertype']) ? 'selected' : '';
                                                       echo "<option value=\"$panelInvTypeOption\" $selected>$panelInvTypeOption</option>";
                                                    }
                                                   ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Inverter KW </label> <span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="no_inverter_kw" name="no_inverter_kw"
                                                    class="form-control" placeholder="Example: '6KW'"
                                                    value="<?php echo $row_all['inverterkw']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>No. of Inverter </label><span style="color:#ffffff;">
                                                    *</span><br>
                                                <input type="text" id="no_inverter" name="no_inverter"
                                                    class="form-control" placeholder="Inverter count"
                                                    value="<?php echo $row_all['invertercount']; ?>"
                                                    onkeypress="return isNumeric(event)" required>
                                            </div>
                                        </div>

                                        <div class="col-2"></div>
                                    </div>
                                    <hr style=" border: 1px dotted  #fff; margin:0px;">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Battery Capacity </label><span style="color:#ffffff;">
                                                    *</span><br>
                                                <input type="text" id="battery_capacity" name="battery_capacity"
                                                    class="form-control" placeholder="Example: '60Ah'"
                                                    value="<?php echo $row_all['batterycapacity']; ?>" required>

                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>No. of Battery</label><span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="no_battery" name="no_battery"
                                                    class="form-control" placeholder="No of Battery"
                                                    value="<?php echo $row_all['batterycount']; ?>"
                                                    onkeypress="return isNumeric(event)" required>

                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                    </div>

                                    <hr style=" border: 1px dotted  #fff; margin:0px;">

                                    <div class="row ">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Included</label><br>
                                                <select name="included_select" id="included_select" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose Included</option>
                                                    <?php
                                                      $Includedarr = array("All Mountings, Electricals and Installation",
                                                      "All Mountings","Electricals","Installation","Others");
                                                     foreach ($Includedarr as $IncludedeOption) {
                                                       $selected = ($IncludedeOption == $row_all['included']) ? 'selected' : '';
                                                       echo "<option value=\"$IncludedeOption\" $selected>$IncludedeOption</option>";
                                                    }
                                                   ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label> Payment Plan Option Chosen </label> <span
                                                    style="color:#ffffff;">
                                                    *</span><br>

                                                <select name="payment_type" id="payment_type" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose Included</option>
                                                    <?php
                                                      $Paytypearr = array("Cash / Finance",
                                                      "Cash","Finance","Others");
                                                     foreach ($Paytypearr as $PaytypeOption) {
                                                       $selected = ($PaytypeOption == $row_all['paymenttype']) ? 'selected' : '';
                                                       echo "<option value=\"$PaytypeOption\" $selected>$PaytypeOption</option>";
                                                    }
                                                   ?>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                    </div>
                                    <hr style=" border: 1px dotted  #fff; margin:0px;">

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label id="totamt" style="font-size:18px;">Total Outlay </label> <span
                                                    style="color:#ffffff;"> *</span>
                                                <input type="text" id="actual_amt" name="actual_amt"
                                                    class="form-control" placeholder="Actual Total Outlay"
                                                    value="<?php echo $row_all['totoutlay']; ?>"
                                                    onkeypress="return isNumeric(event)" required>
                                                <p> (Inclusive of Tax)</p>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <!-- <div class="form-group">
                                                <label>Total Outlay for reference calcuation : </label>                                 
                                                <input type="text" id="totamt" name="totamt" class="form-control"
                                                    placeholder="Total Amount" readonly>
                                            </div> -->
                                        </div>

                                        <div class="col-4"></div>

                                    </div>
                                </div>
                            </div>
                            <!-- end of system details  -->


                            <div id="clicks" hidden>1</div>
                            <button type="reset" class="btn btn-danger" id="reset" disabled>Reset</button>
                            <input type="hidden" name="quot_edit_id" value="<?php echo $row_all['owner_id']; ?>">
                            <input type="submit" class="btn btn-success" id="updatequotBtn" name="submit" value="Save">
                            <!-- <input type="submit" class="btn btn-success" id="save" name="submit" value="Save"> -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <script>
    $(document).on('change', '#invoice_number', function() {
        var number = document.getElementById('invoice_number').value;
        var id = document.getElementById('imp').value;
        $.ajax({
            url: "check.php",
            method: "POST",
            data: {
                number: number,
                id: id
            },
            dataType: "text",
            success: function(data) {
                if (data == "Invoice number already exists") {
                    document.getElementById("danger").style.display = 'block';
                    document.getElementById("danger").innerHTML = data;
                    $(function() {
                        setTimeout(function() {
                            $("#danger").fadeOut(1000);
                        }, 1500)
                    })
                    document.getElementById("save").disabled = true;
                } else {
                    document.getElementById("success").style.display = 'block';
                    document.getElementById("success").innerHTML = data;
                    $(function() {
                        setTimeout(function() {
                            $("#success").fadeOut(1000);
                        }, 1500)
                    })
                    document.getElementById("save").disabled = false;
                }
            }
        });

    });
    </script>

    <script>
    function calculateTotalAmount() {
        // Get values from input fields
        var panelWatts = document.getElementById('panel_watts').value;
        var noPanel = document.getElementById('no_panel').value;

        // Perform the calculation
        var sysSize = panelWatts * noPanel;
        var totAmt = sysSize * 65;

        // Display the result
        // document.getElementById('totamt').value = totAmt;
        document.getElementById('totamt').innerHTML = "Total Outlay for ref calculation: " + totAmt;
    }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('spinner').style.display = 'block';
            setTimeout(function() {
                document.getElementById('spinner').style.display = 'none';
            }, 5000); // 5000 milliseconds (5 seconds)
        });
    });
    </script>



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