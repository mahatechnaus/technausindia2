<?php
include 'includes/db.php';
session_start();

$quot_id = $_POST['quot_id'];
$sqlf = "SELECT * FROM `quotation` WHERE owner_id = '$quot_id'";
$resultf = mysqli_query($con, $sqlf);
$rowf = mysqli_fetch_assoc($resultf);
$user_id = $rowf["owner_id"];
$emp_id = $rowf["emp_id"];
$quotation_number = $rowf['quotation_no'];

$type ="Quotation";

// $sqlemp = "SELECT * FROM employees where emp_id='$emp_id'";
// $sql_emprun = mysqli_query($con, $sqlemp);
// $row_emp = mysqli_fetch_assoc($sql_emprun)
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
    /* body::after {
        content: '';
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url('assets/images/Technaus_Solar_logo_round.png');
        opacity: 0.3;
        pointer-events: none;
    } */

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
        margin-left: 25px;
        border-collapse: collapse;
        min-width: 80%;
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
        margin-right: 20px;
    }

    .right-align {
        text-align: right;
        margin-right: 20px;
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
        height: 450px;
        background: #F0F0F0;
        border: 1px solid black;
    }


    .technaus-footer-image {
        /* background-image: url(assets/images/industry2.jpg); */
        /* background-color: 	#E0E0E0; */
        background-repeat: no-repeat;
        background-size: cover;
    }

    .technaus-after-overlay {
        position: relative;
    }

    .pageborder {
            border: 1px solid #000; /* Set border properties */
            padding: 20px; /* Add padding to create space between content and border */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

    .contactbg{
        background-color: #088AC2;
        color: white;

    }



    </style>



</head>





<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper" style="margin:50px 30px 20px 40px;">
        <div class="container-fluid ">
            

        <!-- start 1st page  -->
        <!-- <div class="pageborder"> -->
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


            <p class="mt-4"></p>

            <div class="company">
                <?php



                $sql = "SELECT * FROM employees where emp_id='$emp_id'";
                $result = $con->query($sql);                
                $row_emp = mysqli_fetch_assoc($result); ?>
                <div class="row">
                    <div class="col-8">
                        <?php
             if (empty($row_emp['name'])) {
            } else {
                echo "<br><span style='font-size: 16px;'>  
                Consultant Name: <strong>" . $row_emp["name"] . "</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                Phone: <strong>" . $row_emp["contact_number"] . "</strong></span>";
                             
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
              
                echo "<br>I / we <strong>  " . $rowf['owner'] . "</strong> being the owner(s) / resident(s) of the property situated
                at <strong>"  . $rowf['address'] . ", "  . $rowf['State'] . "</strong>";
                ?>

            </div>

            <hr align="center">



            <table width="90%" height="92" cellpadding="10px" cellspacing="0" align="center" style="margin-top: -20px;">


                <tr>
                    <td>Consumer No: <strong><?php echo $rowf['meterno'] ?></strong></td>
                    <td>Mobile: <strong><?php echo $rowf['mobile'] ?></strong></td>
                    <td>Email: <strong><?php echo !empty($rowf['email']) ? $rowf['email'] : 'NA'; ?></strong></td>

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


       
            <strong style='font-size: 16px; text-decoration: underline;'>Property Details:-</strong>

            <table class="">
                <tr>
                    <td>Roof Type : <strong><?php echo $rowf['rooftype'] ?></strong></td>
                    <td>Roof Level : <strong><?php echo $rowf['rooflevel'] ?></strong></td>
                    <td>Phase : <strong><?php echo $rowf['phase'] ?></strong></td>
                    <!-- <td>Sanction load: NA</td> -->

                </tr>

            </table>

            <!-- Start of specification -->
            <strong style='font-size: 16px; text-decoration: underline;'>System Details:-</strong>

         
            <p class="mt-4"></p>
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
                    <td><?php echo  $rowf['invertercount'] . " X " . $rowf['inverterkw'] . " ". $rowf['invertertype']; ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Battery:</strong></td>
                    <td>
                        <?php
echo ($rowf['batterycount'] !== null && $rowf['batterycount'] !== "0") ? $rowf['batterycount'] . " X " . $rowf['batterycapacity'] : "NA";
?>

                    </td>
                </tr>
                <tr>
                    <td><strong>Included:</strong></td>
                    <!-- <td><?php echo $rowf['included']; ?></td> -->
                    <td>
                        <ol>
                            <li style="font-size:14px;">Structure - 4*3 GI structure (7*9 Ft Extra @ 3000 per kw)</li>
                            <li style="font-size:14px;">DC wire - Polycab 4Sqmm 50Mtr</li>
                            <li style="font-size:14px;">AC wire - 2.5-6 Sqmm 50Mtr</li>
                            <li style="font-size:14px;">Earthing Wire - 6Sqm Copper / 10Sqmm Aluminium 20Mtr</li>
                            <li style="font-size:14px;">Earthing Rod - 1Mtr - 1No</li>
                            <li style="font-size:14px;">Lightning Arrestor - Single/Multi Spike 1Mtr & Aluminium conductor (50Sqmm) 20 Mtr</li>
                            <li style="font-size:14px;">DCDB & ACDB - MCB, SPD, Fuse</li>
                        </ol>

                    </td>
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
                        // $num =  number_format($amount, 0, '.', ',');

                        
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

            <div class="row pt-1">
                <div class="col-6">

                <!-- <div class="mx-3" style="margin-top: 10px;">
    <p style="font-weight: bold; margin-bottom: 0px;">System Details:</p>
    <p class="mx-5" style="margin-bottom: 0px;">Solar Inverter Product Warranty: <strong>7 Years</strong></p>
    <p class="mx-5" style="margin-bottom: 0px;">Solar Panels Product Warranty:<strong> 12 Years</strong></p>
    <p class="mx-5" style="margin-bottom: 0px;">Solar Panels Performance Warranty:<strong> 25 Years</strong></p>
    <p class="mx-5" style="margin-bottom: 0px;">Battery Warranty:<strong> NA</strong></p>
    <p class="mx-5" style="margin-bottom: 0px;">Workmanship Warranty:<strong> 05 Years</strong></p>
</div> -->


                    <table style="margin-top: 10px;">
                        <tr>
                            <th style="padding: 5px; text-align: left; width: 25%;">Warranty Details</th>
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
                            <td>03 Years</td>
                        </tr>
                        <tr>
                            <td>Workmanship Warranty</td>
                            <td>05 Years</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- end Warranty  -->

            <!-- footer address  -->
    
            <hr style="border-top: 2px solid #088AC2;">


            <div class="contactbg pt-1 ">
                <div class="container">
                    <div class="row mx-3">
                        <div class="col-4">
                            <strong>Sales Office</strong>
                            <p style="font-size: 14px;">
                                #27, Puducherry - Tindivanam <br> Main Road,
                                V.I.P Nagar,<br> Pattanur - 605 006</p>
                        </div>
                        <div class="col-4">
                            <strong>Corporate Office</strong>
                            <p style="font-size: 14px;"> #87, 1st Floor, 4th Cross St,<br>
                                Thirumalai Nagar, Perungudi, <br>
                                Chennai - 600 096</p>
                        </div>
                        <div class="col-4">
                            <strong>Branch Office</strong>
                            <p style="font-size: 14px;">
                                #4 Cauvery Avenue,
                                Alagapuram, <br>
                                Salem - 636 004</p>
                        </div>
                    </div>
                </div>
            </div>
   
            <!-- end footer address  -->

            <div class="pagebreak"> </div>
        </div> 
        <!-- div pageborder -->
        
            <div class="pt-5" style="margin-top:50px;"></div>
            <strong style='font-size: 16px; text-decoration: underline;'>Estimated Time Frame for Deliver:-</strong>
            <!-- <h4 class="m-3">Estimated Time Frame for Delivery:</h4> -->
            <ul class="pt-3" style="list-style-type: none;">
                <li style="font-size: 16px;">
                    <i class="fa fa-square-o" style="font-size:20px;  padding-right: 10px;">
                        All time Frames are subjected to stock availability. Please allow approx.
                        15-20 Business days.
                    </i>
                </li>
                <li style="font-size: 16px;">
                    <i class="fa fa-square-o " style="font-size:20px;  padding-right: 10px;">
                        Client Understands by Default that EB delays are not the responsibility of
                        the Contractor.
                    </i>
                </li>
                <li style="font-size: 16px;">
                    <i class="fa fa-square-o" style="font-size:20px;  padding-right: 10px;">
                        EB Approval charges are Client scope. (Process will be supported till Net
                        metering if needed).
                    </i>
                </li>
            </ul>


            <div class="row mx-5">
                <div class="col-5">
                <strong style='font-size: 16px; text-decoration: underline;'>Payment Details:-</strong>
                    <!-- <h4>Payment Details:</h4> -->
                    <p class="pt-3">All payments should be made by Cheque CC / NEFT / UPI transfer.</p>
                    <p><strong>Bank:</strong> ICICI Bank</p>
                    <p><strong>Account No:</strong> 611905056418</p>
                    <p><strong>IFSC:</strong> ICIC0006119</p>
                    <!-- <p><strong>Bank:</strong> State Bank of India</p>
                    <p><strong>Account No:</strong> 42339346512</p>
                    <p><strong>IFSC:</strong> SBIN0010662</p> -->
                </div>
                <div class="col-3 text-start  mt-3">
                    <!-- <img src='<?php echo "assets/images/payment_code.jpg"; ?>' style="width: 50%;"
                        alt="Scan to pay"><br>
                    <p class="mx-2">[Scan to pay]</p> -->
                </div>

            </div>

            <hr>
            <!-- terms and condition  -->
            <!-- <h4>Terms and Conditions:</h4> -->
            <strong style='font-size: 16px; text-decoration: underline;'>Terms and Conditions:-</strong>

            <ol>
                <li><strong>Payment Terms:</strong>
                    <ol type="1">
                                    <!-- <?php 
                                    $per60 =  ($amount * 60)/100;
                                    $per60num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $per60);
                                    $per30 =  ($amount * 30)/100;
                                    $per30num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $per30);
                                    $per10 =  ($amount * 10)/100;
                                    $per10num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $per10);
                                    ?> -->
                        <li>1st Payment on Advance with Agreement - 60% </li>
                        <li>2nd Payment on Material Delivery - 30% </li>
                        <li>3rd Payment on Installation - 10% </li>
                        <!-- <li>1st Payment on Advance with Agreement - 60%  - (Rs.<?php  echo $per60num; ?>/-)</li>
                        <li>2nd Payment on Material Delivery - 30% - (Rs.<?php  echo $per30num; ?>/-)</li>
                        <li>3rd Payment on Installation - 10% - (Rs.<?php  echo $per10num; ?>/-)</li> -->
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

            </ol>
            <br>
            <!-- footer address  -->
            <br> <br> <br>
            <hr style="border-top: 2px solid #088AC2;">
            <div class=" contactbg pt-3 ">
                <div class="container">
                    <div class="row mx-3">
                        <div class="col-4">
                            <strong>Sales Office</strong>
                            <p style="font-size: 14px;">
                                #27, Puducherry - Tindivanam <br> Main Road,
                                V.I.P Nagar,<br> Pattanur - 605 006</p>
                        </div>
                        <div class="col-4">
                            <strong>Corporate Office</strong>
                            <p style="font-size: 14px;"> #87, 1st Floor, 4th Cross St,<br>
                                Thirumalai Nagar, Perungudi, <br>
                                Chennai - 600 096</p>
                        </div>
                        <div class="col-4">
                            <strong>Branch Office</strong>
                            <p style="font-size: 14px;">
                                #4 Cauvery Avenue,
                                Alagapuram, <br>
                                Salem - 636 004</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end footer address  -->
            <div class="pagebreak"> </div>
            <br>
            <br>
            <!-- page 3  -->
            <div class="pt-5"></div>
            <strong style='font-size: 16px; text-decoration: underline;'>Site layout:-</strong>
          
                    <br>
                    <br>
                    <div id="rectangle"></div>
                    <br>
                    <br>

             
                <strong style='font-size: 16px; text-decoration: underline;'>Workout Details:-</strong>
              
                    <br>
                    <br>
                    <div id="rectangle"></div>
                    <br>
                    <br>
               

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

            <!-- footer address  -->
            <br> <br> <br>
            <hr style="border-top: 2px solid #088AC2;">
            <div class="contactbg pt-3 ">
                <div class="container">
                    <div class="row mx-3">
                        <div class="col-4">
                            <strong>Sales Office</strong>
                            <p style="font-size: 14px;">
                                #27, Puducherry - Tindivanam <br> Main Road,
                                V.I.P Nagar,<br> Pattanur - 605 006</p>
                        </div>
                        <div class="col-4">
                            <strong>Corporate Office</strong>
                            <p style="font-size: 14px;"> #87, 1st Floor, 4th Cross St,<br>
                                Thirumalai Nagar, Perungudi, <br>
                                Chennai - 600 096</p>
                        </div>
                        <div class="col-4">
                            <strong>Branch Office</strong>
                            <p style="font-size: 14px;">
                                #4 Cauvery Avenue,
                                Alagapuram, <br>
                                Salem - 636 004</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end footer address  -->
            <!-- <div class="pagebreak"> </div> -->

            <div class="row">
                <div class="col-12 text-center"><img src='<?php echo "upload/ourproject.jpg"; ?>' style="width:100%">
                </div>
            </div>




        </div>



    </div>



</body>

</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>