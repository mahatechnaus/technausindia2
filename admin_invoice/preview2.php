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
                        Date: <strong>" .  date("d/m/yy")  . "</strong></span>";
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
                        <tr >
                            <th style="padding: 5px; text-align: left; width: 20%;">Warranty Type</th>
                            <th style="padding: 5px; text-align: left; width: 10%;">Duration</th>
                        </tr>
                        <tr >
                            <td >Solar Inverter Product Warranty</td>
                            <td >07 Years</td>
                        </tr>
                        <tr >
                            <td >Solar Panels Product Warranty</td>
                            <td >12 Years</td>
                        </tr>
                        <tr >
                            <td >Solar Panels Performance Warranty</td>
                            <td >25 Years</td>
                        </tr>
                        <tr >
                            <td >Battery Warranty</td>
                            <td >NA</td>
                        </tr>
                        <tr >
                            <td >Workmanship Warranty</td>
                            <td >05 Years</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- end Warranty  -->

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


            <?php



                $sql_a = "SELECT * FROM bank_details";

                $result_a = $con->query($sql_a);





                $row_a = mysqli_fetch_assoc($result_a);

                echo "<h5>Bank Account Details</h5>";



                echo "Bank: " . $row_a["bank_name"] . ", A/C Name: " . $row_a["account_name"] . "<br> A/C No.: " . $row_a["account_number"] . " (" . $row_a["acc_type"] . ")" . ", IFSC: " . $row_a["ifsc_code"] . "<br>";



                if (empty($row_a["micr_code"]) and empty($row_a["swift_code"])) {

                    if (empty($row_a["url"])) {
                    } else {

                        echo "Online Payment URL: " . $row_a["url"] . "";

                    }



                } else {

                    echo "MICR: " . $row_a["micr_code"] . "";
                    if (empty($row_a["swift_code"])) {
                    } else {
                        echo ", SWIFT: " . $row_a["swift_code"] . "<br>";
                    }

                    if (empty($row_a["url"])) {
                    } else {

                        echo "Online Payment URL: " . $row_a["url"] . "";

                    }



                }




                ?><br>


            <p class="note">Note: Quotation will be valid for 3 months only</p>



            <div class="logo1" align="right" style="margin-top: -160px;">

                <?php



                    $sqlz = "SELECT * from sign";

                    $resultz = mysqli_query($con, $sqlz);

                    $rowz = mysqli_fetch_array($resultz);



                    $imagez = $rowz['image'];





                    ?>

                <img src='<?php echo "upload/" . $imagez . ""; ?>' style="width:150px"><br>





                <h6>Authorized Signatory</h6>

            </div>









        </div>



    </div>



</body>

</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>