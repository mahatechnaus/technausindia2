<?php
include 'includes/db.php';
session_start();

$quot_id = $_POST['quot_id'];
$sqlf = "SELECT * FROM `quotation` WHERE owner_id = '$quot_id'";
$resultf = mysqli_query($con, $sqlf);
$rowf = mysqli_fetch_assoc($resultf);
$user_id = $rowf["owner_id"];
$quotation_number = $rowf['quotation_no'];

$type ="Quotation";


?>



<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quotation Preview</title>

    <!-- Custom fonts for this template-->

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link rel="icon" href="assets/images/logo.ico" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    @media print {
        .pagebreak {
            page-break-before: always;
        }

        /* page-break-after works, as well */
    }

    @media print {
        body {
            width: 21cm;
            height: 29.7cm;
            margin: 15mm 15mm 15mm 15mm;
            /* change the margins as you want them to be. */
        }
    }

    .container-fluid {
        margin-top: 25px;
    }


    .table2 {
        outline: 0px;
        margin-left: 300px;
    }


    table {
        /* border: 0.5px solid grey; */
        border-spacing: 0;
        padding: 10px;
        /* outline: 0.5px solid grey; */
        margin-left: 0px;
        border-collapse: collapse;
        min-width: 100%;
        max-width: 100%;
        text-align: left;
    }


    .table1 {
        border: 0.5px solid grey;
        border-spacing: 0;
        padding: 10px;
        outline: 0.5px solid grey;
        margin-left: 2px;
        border-collapse: collapse;
        text-align: left;

    }


    td,
    th {
        /* border: 0.5px solid grey; */
        border-spacing: 0;
        padding: 5px;
        /* outline: 0.5px solid grey; */
        margin-left: 2px;
        border-collapse: collapse;
    }



    .logo1 {}

    .logo {

        float: left;

    }





    @page {

        size: A4;

        margin: 0;

    }



    @media print {

        .page {



            border: initial;

            border-radius: initial;

            width: initial;

            min-height: initial;

            box-shadow: initial;

            background: initial;

            page-break-after: always;

        }

    }



    .company {

        font-size: 16px;

    }



    h2 {

        margin-bottom: -10px;

    }



    h5 {

        font-wight: bolder;

    }



    .note {

        font-size: 13px;

        margin-top: 15px;

    }

    .invoiceheader h2 {
        color: #088BC3;
        text-transform: uppercase;
        text-align: right;
        margin-right: 150px;
    }

    .right-align {
        text-align: right;
        margin-right: 150px;
    }

    body {
        font-family: Arial, sans-serif;

    }

    ol {
        margin-top: 2px;
        margin-bottom: 20px;
        font-size: 10px;
    }

    li {
        /* margin-bottom: 10px; */
        font-size: 12px;
    }

    p {
        margin-bottom: 10px;

    }

    #rectangle {
        width: 800px;
        height: 300px;
        background: #F0F0F0;
    }
    </style>



</head>





<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper" style="margin:50px 30px 20px 40px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="logo">
                        <?php
                        $sqlx = "SELECT * from logo";
                        $resultx = mysqli_query($con, $sqlx);
                        $rowx = mysqli_fetch_array($resultx);
                        $image = $rowx['image'];
                        ?>
                        <img src='<?php echo "upload/" . $image . ""; ?>' style="width:70%">
                    </div>

                </div>
                <div class="col-6">
                    <div class="invoiceheader">
                        <h2>
                            <?php
            $type_1 = strtoupper($type);
            echo $type_1 . "<br>";
            ?>
                        </h2>
                    </div>
                    <div class="right-align mt-2">
                        <?php echo "# " . $quotation_number . "<br>";
                        
                        echo "<br><span style='font-size: 16px;'>           
                        Date: <strong>" .   date("d/m/Y", strtotime($rowf["quotdate"]))  . "</strong></span>";
                        ?>

                    </div>
                </div>
            </div>
            <!-- logo end  -->

            <!-- start address  -->
            <div class="company">
                <?php
$sql = "SELECT * FROM permanent_details";
$result = $con->query($sql);
// output data of each row
$row = mysqli_fetch_assoc($result);
$x1 = $row['statecode'];
$query_2 = mysqli_query($con, "SELECT * FROM statecode WHERE state_id='$x1'");
$row_2 = mysqli_fetch_assoc($query_2);
$str = $row['gst'];
echo "<h6>" . $row["company_name"] . "</h6>" . $row["address"] . " " . $row["pincode"] . "<br>";
if (empty($row['cin'])) {
} else {
    echo "CIN: " . $row["cin"] . "<br>";
}
echo "Phone: " . $row["ph_number"] . "<br>Email: " . $row["email"] . "<br>";
if (empty($row['whatsapp'])) {
    echo "Website: " . $row["website"] . "";
} else {
    echo "Whatsapp: " . $row["whatsapp"] . "<br>";
    echo "Website: " . $row["website"] . "";
}

?>



            </div>



            <div class="company">
                <?php



                $sql = "SELECT * FROM employees";
                $result = $con->query($sql);                
                $row = mysqli_fetch_assoc($result); ?>
                <div class="row">
                    <div class="col-8">
                        <?php
             if (empty($row['name'])) {
            } else {
                echo "<br><span style='font-size: 16px;'>  
                Consultant Name: <strong>" . $row["name"] . "</strong>
                Phone: <strong>" . $row["contact_number"] . "</strong></span>";
                             
            } ?>
                    </div>
                    <div class="col-4">
                        <!-- <?php
       
                echo "<br><span style='font-size: 16px;'>           
                Date: <strong>" .  date("d/m/yy")  . "</strong></span>";
           ?> -->
                    </div>
                </div>

                <?php
              
                echo "<br>I we <strong> " . $rowf['owner'] . "</strong> being the owner(s) / resident(s) of the property situated
                at <strong>"  . $rowf['address'] . "</strong>";
                ?>

            </div>

            <hr align="center">



            <table width="90%" height="92" cellpadding="10px" cellspacing="0" align="center" style="margin-top: -20px;">


                <tr>
                    <td>Consumer No: <strong><?php echo $rowf['meterno'] ?></strong></td>
                    <td>Mobile: <strong><?php echo $rowf['mobile'] ?></strong></td>
                    <td>Email: <strong><?php echo $rowf['email'] ?></strong></td>
                </tr>


                <tr>
                    <td colspan="3">Distributor Name: <strong><?php echo $rowf['distributor'] ?></strong></td>

                </tr>

            </table>
            <hr align="center">
            <strong style='font-size: 18px;'>
                HEREBY AUTHORISE TECHNAUS RENEWABLE PVT LTD TO CARRYOUT THE WORK AS STATED HERE UNDER
            </strong>
            <hr align="center">


            <p class="mt-4"></p>
            <strong style='font-size: 16px;'>Property Details:- </strong>
            <table class="table ">
                <tr>
                    <td>Roof Type : <strong><?php echo $rowf['rooftype'] ?></strong></td>
                    <td>Roof Level : <strong><?php echo $rowf['rooflevel'] ?></strong></td>
                    <td>Phase : <strong><?php echo $rowf['phase'] ?></strong></td>
                    <!-- <td>Sanction load: NA</td> -->

                </tr>

            </table>

            <!-- Start of specification -->
            <p class="mt-4"></p>
            <strong style='font-size: 16px;'>Warranty Details:- </strong>
            <table border="1" cellpadding="10">

                <tr>
                    <td><strong>System Size:</strong></td>
                    <td>
                        <?php $systemsize= ($rowf['panelwatts'] *  $rowf['panelcount'])/ 1000;
        echo $systemsize . ' KW';
        ?>

                    </td>
                </tr>
                <tr>
                    <td><strong>Panel Brand:</strong></td>
                    <td><?php echo $rowf['panelbrand']; ?></td>
                </tr>
                <tr>
                    <td><strong>Panel Model:</strong></td>
                    <td><?php echo  $rowf['panelcount'] . " X " . $rowf['panelwatts'] . " W"; ?></td>
                </tr>
                <tr>
                    <td><strong>Inverter Brand:</strong></td>
                    <td><?php echo $rowf['inverterbrand']; ?></td>
                </tr>
                <tr>
                    <td><strong>Inverter Model:</strong></td>
                    <td><?php echo  $rowf['invertercount'] . " X " . $rowf['inverterkw'] . " KW ". $rowf['invertertype']; ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Battery:</strong></td>
                    <td><?php echo ($rowf['batterycount'] !== null) ? $rowf['batterycount'] . " X " . $rowf['batterycapacity'] : "NA"; ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Included:</strong></td>
                    <td><?php echo $rowf['included']; ?></td>
                </tr>
                <tr>
                    <td><strong>Total Outlay:</strong></td>
                    <?php
setlocale(LC_NUMERIC, 'en_IN');
?>


                    <td>
                        <i class="fa fa-inr" aria-hidden="true"></i> INR
                        <?php                        
                        $amount = $rowf['totoutlay'];
                        $num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);

                        
                        echo $num; ?> /-
                    </td>

                </tr>
                <tr>
                    <td><strong>Payment Plan Option Chosen:</strong></td>
                    <td><?php echo $rowf['paymenttype']; ?></td>
                </tr>
                <tr>
                    <td><strong>Grand Total:</strong></td>
                    <td> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo "INR " . $num . " /-"; ?> (Inclusive of
                        Tax)</td>
                </tr>
            </table>




            <!-- end of specification  -->


            <!-- Warranty   -->

            <div class="row">
                <div class="col-6">
                    <table style="margin-top: 10px;">
                        <tr>
                            <th style="padding: 5px; text-align: left; width: 20%;">Warranty Type</th>
                            <th style="padding: 5px; text-align: left; width: 10%;">Duration</th>
                        </tr>
                        <tr>
                            <td>Solar Inverter Product Warranty</td>
                            <td>07 Years</td>
                        </tr>
                        <tr>
                            <td>Solar Panels Product Warranty</td>
                            <td>12 Years</td>
                        </tr>
                        <tr>
                            <td>Solar Panels Performance Warranty</td>
                            <td>25 Years</td>
                        </tr>
                        <tr>
                            <td>Battery Warranty</td>
                            <td>NA</td>
                        </tr>
                        <tr>
                            <td>Workmanship Warranty</td>
                            <td>05 Years</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- end Warranty  -->
            <br>
            <br>
            <div class="pagebreak"> </div>

            <br>
            <br>
            <div class="pt-5"></div>
            <h4 class="m-3">Estimated Time Frame for Delivery:</h4>
            <ul>
                <li>All time Frames are subjected to stock availability. Please allow approx. 15-20 Business days.</li>
                <li>Client Understands by Default that EB delays are not the responsibility of the Contractor.</li>
                <li>EB Approval charges are Client scope. (Process will be supported till Net metering if needed).</li>
            </ul>

            <h4 class="mt-5">Payment Details:</h4>
            <p>All payments should be made by Cheque CC / NEFT / UPI transfer.</p>
            <p><strong>Bank:</strong> ICICI Bank</p>
            <p><strong>Account No:</strong> 611905056418</p>
            <p><strong>IFSC:</strong> ICIC0006119</p>

            <hr>

            <!-- terms and condition  -->
            <h4>Terms and Conditions:</h4>

            <ol>
                <li><strong>Payment Terms:</strong>
                    <ol type="1">
                        <li>1st Payment on Advance with Agreement - 60%</li>
                        <li>2nd Payment on Material Delivery - 30%</li>
                        <li>3rd Payment on Installation - 10%</li>
                    </ol>
                </li>
                <br>
                <li><strong>Technaus Renewables (SOW)</strong>
                    <ol type="a">
                        <li>Complete EPC of Solar Power Plant (Technical evaluation, design, engineering, supply,
                            erection, and testing of the grid-connected rooftop solar PV projects.</li>
                        <li>Deployment of Site Execution Team and Supervision of our Technical Service Engineers /
                            Technicians in the client’s premises.</li>
                        <li>To take care of the transportation, accommodation, food, and other incidental expenses of
                            our team members.</li>
                        <li>Technical team shall be equipped with all the necessary tools including drilling/cutting
                            tools and lifting equipment as required for carryingout timely Installation & Commissioning.
                        </li>
                        <li>Shall supply Skilled/unskilled manpower as required for the execution of the work and
                            supervision of the work carried out.</li>
                        <li>Project Manager to periodically update the daily plan and progress to the client.</li>
                        <li>Any type of inspection by Government/third-party/client is excluded from this offer, it
                            shall be mutually agreed if required.</li>
                        <li>Net metering documentation support (If required). • ACDB to customer MV panel MCCB up to 30
                            meters Technaus Renewables.</li>

                    </ol>
                </li>
                <br>
                <li><strong>Customer (SOW) - ON Grid Only</strong>
                    <ol type="a">
                        <li>All financial cost for the Net Metering and related process is in the scope of the customer.
                        </li>
                        <li>To provide the required space and security for the materials used in the project site.</li>

                        <li>To provide any clarification, support or approvals during the phase of execution of the
                            Project.</li>
                        <li>To extend and fulfill any other reasonable requirement from Technaus Renewables.</li>
                        <li>To provide the Civil Foundation Construction for PV panel mounting structure as per the
                            Technaus Renewables Layout drawing.</li>
                        <li>To provide a Single Point of Contact (Client-side Project Manager) for
                            coordination/approval.</li>
                        <li>EB NOC Clearance and Net-Meter / On-Grid Connection Certificate shall be arranged by Client
                            / Customer, Technaus Renewables shall coordinate for necessary documents support.</li>

                    </ol>
                </li>
                <br>
                <li><strong>Product and Performance Warranty</strong>
                    <ol type="a">
                        <li>Solar Grid tie inverter shall be warranted for a period of 84 months from the date of supply
                            for any manufacturing defects (As per company warranty terms)</li>
                        <li>SPV module performance warranty for 25 years 80% power output, for the first 12 years 90%
                            output 12 years product warranty.</li>

                        <li>The Owner shall make available, prior to coming into force, full “right of access”,
                            “possession” and “right of easement” of the Site to theContractor and all its assigned
                            sub-contractors during the complete tenure of the Contract</li>
                        <li>Standard Force Majeure Conditions apply for this offer and resultant Order. Technaus
                            Renewables has no responsibility for delay & damage of Goods due to transportation.</li>
                        <li>We shall retain the right on equipment, materials, or parts supplied by us under this
                            quotation until full value thereof as per our invoice has beenfully paid to us.</li>
                        <li>The offer is valid for your acceptance for a period of 15 days from the date of this offer
                        </li>
                        <li>All the information exchanged between the Parties, either oral or written, in connection
                            with this Offer/ Contract, shall be maintainedstrictly confidential, except to the extent
                            necessary to carry out obligations under it or to comply with applicable Laws.</li>
                        <li>We will provide 5 years of free service support for 3 visits/year and on-call basis.</li>

                    </ol>
                </li>
                <br>
                <div class="pagebreak"> </div>
                <br>
                <br>
                <!-- page 3  -->
                <div class="pt-5"></div>
                <li><strong>Site layout:</strong>
                    <br>
                    <br>
                    <div id="rectangle"></div>
                    <br>
                    <br>

                </li>

                <li><strong>Workout Details:</strong>
                    <br>
                    <br>
                    <div id="rectangle"></div>
                    <br>
                    <br>
                </li>
            </ol>

            <p><strong>Proposal/Quotation acceptance by:</strong></p>
            <div class="row">
                <div class="col-6">
                    <p><strong>Consultant Signature:................................</strong></p>
                </div>
                <div class="col-6">
                    <p><strong>Owner Signature:................................</strong></p>
                </div>
            </div>



            <p><strong>Signed Date:.......................</strong></p>


            <!-- <div class="pagebreak"> </div> -->

            <div class="row">
                <div class="col-12 text-center" ><img src='<?php echo "upload/ourproject.jpg"; ?>' style="width:100%">
                </div>
            </div>




        </div>



    </div>



</body>

</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>