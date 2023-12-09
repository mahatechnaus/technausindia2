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
   $message = "Quotation saved successfully";
}
// Display error message
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $message = "Failed to save quotation";
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

<div id="spinner" class="spinner"></div>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-global">
                        </i>
                    </div>
                    <div>Quotation
                        <div class="page-title-subheading">Create, Edit, Delete invoices here
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="successmsg p-3"
                    style="background-color: <?php echo isset($_GET['success']) && $_GET['success'] == 1 ? '#4CAF50' : (isset($_GET['error']) && $_GET['error'] == 1 ? '#f44336' : ''); ?>; color: white;">
                    <?php echo $message; ?>
                </div>

                <div class="main-card mb-3 card ">
                    <div class="card-body">
                        <form action="quotation_save.php" method="POST">
                            <div id="spinner" class="spinner"></div>
                            <input type="hidden" name="user_id" id="imp" value="<?php echo $user_id; ?>">
                            <div class="card text-dark bg-light mb-1">

                                <div class="row mx-3">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Employee Name </label> <span style="color:red;"> *</span><br>
                                            <select name="emp_id" id="emp_id" class="form-control" required>
                                                <option value="" hidden>Choose Employee</option>
                                                <?php
                                          $sqlemp = "SELECT * FROM employees";
                                          $sql_emprun = mysqli_query($con, $sqlemp);

                                             while ($row_emp = mysqli_fetch_assoc($sql_emprun)) {
                                          echo '<option value="' . $row_emp['emp_id'] . '">' . $row_emp['name'] . '</option>';
                }
                ?>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <h5 class="card-header">Customer Details</h5>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Title </label> <span style="color:red;"> *</span><br>
                                                <select name="cust_title" id="cust_title" class="form-control" required>
                                                    <option value="" hidden>Choose Title</option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                    <option value="M/s.">M/s.</option>
                                                    <option value="Miss.">Miss.</option>
                                                    <option value="Miss./Mrs.">Miss./Mrs.</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Customer name </label> <span style="color:red;"> *</span><br>
                                                <input type="text" id="cust_name" name="cust_name" class="form-control"
                                                    placeholder="Customer name" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Mobile </label><span style="color:red;"> *</span><br>
                                                <input type="text" id="cust_mobile" name="cust_mobile"
                                                    class="form-control" placeholder="Mobile" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Email</label><br>
                                                <input type="text" id="cust_email" name="cust_email"
                                                    class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Street </label><br>
                                                <input type="text" id="cust_st" name="cust_st" class="form-control"
                                                    placeholder="Street">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Area </label><br>
                                                <input type="text" id="cust_area" name="cust_area" class="form-control"
                                                    placeholder="Area">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>State </label><span style="color:red;"> *</span><br>
                                                <select name="cust_state" id="cust_state" class="form-control" required>
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
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Pincode </label><br>
                                                <input type="text" id="cust_pincode" name="cust_pincode"
                                                    class="form-control" placeholder="Pincode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of cust details  -->

                            <div class="card text-dark bg-light mb-1">
                                <!-- <h5 class="card-header">EB Details</h5> -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Consumer / Meter No. </label><span style="color:red;">
                                                    *</span><br>
                                                <input type="text" id="cust_meter" name="cust_meter"
                                                    class="form-control" placeholder="Consumer / Meter No." required>
                                                <label style="font-size:12px;">If you don't know the consumer number,
                                                    please enter 'NA'</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Sanction load </label><span style="color:red;">
                                                    *</span><br>
                                                <input type="text" id="sanction_load" name="sanction_load"
                                                    class="form-control" placeholder="Sanction load" required>
                                                <label style="font-size:12px;">If you don't know the Sanction load,
                                                    please enter 'NA'</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Distributor Name </label><span style="color:red;"> *</span><br>
                                                <select name="distributor_name" id="distributor_name"
                                                    class="form-control" required>
                                                    <option value="" hidden>Choose distributor</option>
                                                    <option value="Electricity Department - Puducherry">Electricity
                                                        Department - Puducherry</option>
                                                    <option value="Tamil nadu Electricity Board - TN">Tamilnadu
                                                        Electricity Board - TN</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of eb details  -->

                            <div class="card text-dark bg-light  mb-1">
                                <h5 class="card-header">Building Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Roof type </label> <span style="color:red;"> *</span><br>
                                                <select name="roof_type" id="roof_type" class="form-control" required>
                                                    <option value="" hidden>Choose roof type</option>
                                                    <option value="RCC">RCC</option>
                                                    <option value="Flat Roof">Flat Roof</option>
                                                    <option value="Sheets">Sheets</option>
                                                    <option value="N/A">N/A</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Roof level </label> <span style="color:red;"> *</span><br>
                                                <select name="roof_level" id="roof_level" class="form-control" required>
                                                    <option value="" hidden>Choose roof level</option>
                                                    <option value="Ground Floor">Ground Floor only</option>
                                                    <option value="Three storey">Three storey</option>
                                                    <option value="Two storey">Two storey</option>
                                                    <option value="One storey">One storey</option>
                                                    <option value="N/A">N/A</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Phase </label> <span style="color:red;"> *</span><br>
                                                <select name="phase_select" id="phase_select" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose phase</option>
                                                    <option value="Single phase">Single phase</option>
                                                    <option value="Three phase">Three phase</option>
                                                    <option value="N/A">N/A</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of building details  -->


                            <div class="card text-white bg-secondary  mb-1">
                                <h5 class="card-header">System Details</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Panel Brand </label> <span style="color:#ffffff;"> *</span><br>
                                                <select name="panel_brand" id="panel_brand" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose Brand</option>
                                                    <option value="Renewsys / Saatvik / Rayzon"> Renewsys / Saatvik / Rayzon</option>
                                                    <option value="Waaree / Renewsys / Saatvik / Rayzon">Waaree / Renewsys / Saatvik / Rayzon</option>
                                                    <option value="Waaree">Waaree</option>
                                                    <option value="Renewsys">Renewsys</option>
                                                    <option value="Saatvik">Saatvik</option>
                                                    <option value="Rayzon">Rayzon</option>
                                                    <option value="others">others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Panel Watts </label> <span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="panel_watts" name="panel_watts"
                                                    class="form-control" placeholder="Example: '540'"
                                                    onkeypress="return isNumeric(event)" required>
                                                <!-- <select name="panel_watts" id="panel_watts" class="form-control"
                                                    required onchange="calculateTotalAmount()">
                                                    <option value="" hidden>Choose watts</option>
                                                    <option value="540"> 540W / 545W</option>
                                                    <option value="540">535W / 540W / 545W</option>
                                                    <option value="535">535W</option>
                                                    <option value="540">540W</option>
                                                    <option value="545">545W</option>
                                                    <option value="others">others</option>
                                                </select> -->
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>No. of Panel </label> <span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="no_panel" name="no_panel" class="form-control"
                                                    placeholder="Panel count" onkeypress="return isNumeric(event)"
                                                    required onchange="calculateTotalAmount()">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Panel Model</label> <span style="color:#ffffff;">*</span>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" style="background-color:red;"
                                                        type="radio" name="p_model" id="mcStatus"
                                                        value="Monocrystalline" checked required>
                                                    <label class="form-check-label"
                                                        for="mcStatus">Monocrystalline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="p_model"
                                                        id="pcStatus" value="Polycrystalline" required>
                                                    <label class="form-check-label"
                                                        for="pcStatus">Polycrystalline</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style=" border: 1px dotted  #fff; margin:0px;">
                                    <div class="row ">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Inverter Brand </label> <span style="color:#ffffff;">
                                                    *</span><br>
                                                <select name="inverter_brand" id="inverter_brand" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose Inverter</option>
                                                    <option value="Growatt/ EVVO/ UTL/ Deye/ K-Solar">Growatt/ EVVO/
                                                        UTL/ Deye/ K-Solar</option>
                                                    <option value="Growatt">Growatt</option>
                                                    <option value="EVVO">EVVO</option>
                                                    <option value="UTL">UTL</option>
                                                    <option value="Deye">Deye</option>
                                                    <option value="K-Solar">K-Solar</option>
                                                    <option value="others">others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Inverter Type </label> <span style="color:#ffffff;"> *</span><br>
                                                <select name="inverter_type" id="inverter_type" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose watts</option>
                                                    <option value="On-Grid Inverter">On-Grid Inverter</option>
                                                    <option value="Off-Grid Inverter">Off-Grid Inverter</option>
                                                    <option value="Hybrid Inverter">Hybrid Inverter</option>
                                                    <option value="others">others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Inverter KW </label> <span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="no_inverter_kw" name="no_inverter_kw"
                                                    class="form-control" placeholder="Example: '6KW'" required>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>No. of Inverter </label><span style="color:#ffffff;">
                                                    *</span><br>
                                                <input type="text" id="no_inverter" name="no_inverter"
                                                    class="form-control" placeholder="Inverter count"
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
                                                    class="form-control" placeholder="Example: '60Ah'" required>

                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>No. of Battery</label><span style="color:#ffffff;"> *</span><br>
                                                <input type="text" id="no_battery" name="no_battery"
                                                    class="form-control" placeholder="No of Battery"
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
                                                <select name="included_select" id="included_select"
                                                    class="form-control">
                                                    <option value="" hidden>Choose here</option>
                                                    <option value="All Mountings, Electricals and Installation">
                                                        All Mountings, Electricals and Installation</option>
                                                    <option value="All Mountings">All Mountings</option>
                                                    <option value="Electricals">Electricals</option>
                                                    <option value="Installation">Installation</option>
                                                    <option value="others">others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label> Payment Plan Option Chosen </label> <span
                                                    style="color:#ffffff;"> *</span><br>
                                                <select name="payment_type" id="payment_type" class="form-control"
                                                    required>
                                                    <option value="" hidden>Choose type</option>
                                                    <option value="Cash / Finance">Cash / Finance</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Finance">Finance</option>
                                                    <option value="others">others</option>
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