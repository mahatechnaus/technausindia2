<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];

        $query = "SELECT * FROM leads where is_deleted='0' ORDER BY `leadid` DESC ";
        $query_run = mysqli_query($con, $query);
?>



<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-global"></i>
                    </div>

                    <div>Lead Conversion
                        <div class="page-title-subheading">Create, Edit, Delete lead conversion here
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

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <?php            

        if(isset($_SESSION['SUCCESS']) && $_SESSION['SUCCESS'] !=''){
            echo '<div class="alert alert-success" role="alert"> '.$_SESSION['SUCCESS']. '</div>';
            unset($_SESSION['SUCCESS']);
        }
        if(isset($_SESSION['Failure']) && $_SESSION['Failure'] !=''){
            echo '<div class="alert alert-danger" role="alert"> '.$_SESSION['Failure']. '</div>';
            unset($_SESSION['Failure']);
        }
        ?>
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <table class="table table-striped table-bordered" id="table">
                            <thead align="center">
                                <tr>
                                    <th>Lead ID</th>
                                    <th>Date</th>
                                    <th>Lead Name</th>
                                    <th>Mobile</th>
                                    <th>Source</th>
                                    <th>Estimated Site Visit</th>

                                    <th>Details </th>
                                    <!-- <th>Operations</th> -->
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php     
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
                                <tr>
                                    <td><?php  echo $row['leadno']; ?></td>
                                    <td><?php  echo  date("d/m/Y", strtotime($row["lddate"])); ?></td>
                                    <td><?php  echo $row['leadname']; ?></td>
                                    <td><?php  echo $row['mobile']; ?></td>
                                    <td><?php  echo $row['source']; ?></td>
                                    <td><strong><?php  echo  date("d/m/Y", strtotime($row["appointmentdt"])); ?> <strong></td>


                                    <td>
                                        <?php
                                         if ($row['is_quotation'] == '0') { 
                                            echo ' <a href="lead_sitevisit.php?leadid='. $row['leadid'] .'"> <i class="fa fa-history" style="color:#000000"></i> <span class="badge badge-success">Waiting for site visit</span></a>';
                                         } elseif ($row['is_quotation'] == '1') {
                                             echo '<a href="lead_quot_create.php?leadid='. $row['leadid'] .'"> <i class="fa fa-hand-point-right" style="color:#000000"></i> <span class="badge badge-warning">Awaiting Quotation</span></a>';
                                        }
                                        ?>
                                    </td>


                                </tr>
                                <?php     
            } 
          ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>



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

    $(document).on('click', '#deletequotation', function() {
        var id = $(this).data("id1");
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "deletequotation.php",
                method: "POST",
                data: {
                    id: id
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        }
    });
    </script>