<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

  $query_c = "SELECT * FROM quotation";
  $query_run_c = mysqli_query($con, $query_c);
  $number = mysqli_num_rows($query_run_c);

  $query_ld = "SELECT * FROM leads where is_deleted='0'";
  $query_run_ld = mysqli_query($con, $query_ld);
  $number_ld = mysqli_num_rows($query_run_ld);

// ............. other ..........
$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];


  $sql1= mysqli_query($con, "SELECT * FROM permanent_details WHERE user_id = '$user_id'");
  $num1=mysqli_num_rows($sql1);

  $sql2= mysqli_query($con, "SELECT * FROM bank_details WHERE user_id = '$user_id'");
  $num2=mysqli_num_rows($sql2);

  $sql3= mysqli_query($con, "SELECT * FROM buyer_details WHERE user_id = '$user_id'");
  $num3=mysqli_num_rows($sql3);


  $sql4= mysqli_query($con, "SELECT * FROM product WHERE user_id = '$user_id'");
  $num4=mysqli_num_rows($sql4);


  $sql5= mysqli_query($con, "SELECT * FROM logo WHERE user_id = '$user_id'");
  $num5=mysqli_num_rows($sql5);


  $sql6= mysqli_query($con, "SELECT * FROM sign WHERE user_id = '$user_id'");
  $num6=mysqli_num_rows($sql6);
?>





<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-global"></i>
                    </div>
                    <div>Dashboard<div class="page-title-subheading">Get insights into your activity here</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <?php
            if(($num1==0) OR ($num2==0) OR ($num3==0) OR ($num4==0) OR ($num5==0) OR ($num6==0)){
               echo '<p class="text-danger">Enter all details to start creating invoices</p>';
            } else {
            ?>
                    <a class="btn mr-3 mb-3 btn-primary" href="form_quotation.php" style="font-size:14px;"><i
                            class="fa fa-plus"></i>&nbsp;
                        Create Quotation
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Leads</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $number_ld;?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Quotation</div>
                                            <!-- <div class="widget-subheading">Invoices created till today</div> -->
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $number;?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Company Info</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-warning"><span>
                                                    <?php
                                            if($num1==0 && $num2==0){
                                                echo "0";
                                            } else if ($num1==0 AND !($num2==0)){
                                                echo "50%";
                                            } else if ($num2==0 AND !($num1==0)){
                                                echo "50%";
                                            } else {
                                                echo "100%";
                                            }
                                            ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<!-- 
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Clients</div>                                      
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $number_b;?></span></div>
                                        </div>
                                    </div>
                                </div> -->
<!-- <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Products/services</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $number_a;?></span>
                                            </div>
                                        </div>
                                    </div> -->



<?php

include('includes/footer.php');

?>



<script>
$(document).ready(function() {

    $('#table').DataTable({

        "lengthMenu": [
            [25, 200, 300, -1],
            [25, 200, 300, "All"]
        ],

        "order": [
            [0, "desc"]
        ],



    });

});
</script>