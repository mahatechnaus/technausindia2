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
    
        $sql5= mysqli_query($con, "SELECT * FROM logo WHERE user_id = '$user_id'");
        $num5=mysqli_num_rows($sql5);

        $sql6= mysqli_query($con, "SELECT * FROM sign WHERE user_id = '$user_id'");
        $num6=mysqli_num_rows($sql6);
  
?>

<style>
    .card-body p {
        margin-bottom: 5px; /* Add this line to remove the bottom margin */
    }
</style>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-global"></i>
                    </div>

                    <div>Leads<div class="page-title-subheading">Create, Edit, Delete leads here
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a class="btn mr-3 mb-3 btn-primary" href="leads_create.php" style="font-size:14px;"><i
                            class="fa fa-plus"></i>&nbsp;
                        Create Leads
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

<div class="row mb-3">
<?php  while($row = mysqli_fetch_assoc($query_run)) { ?>
    <div class="col-3">

    <div class="card-container">
  
        <div class="card" >
            <div class="card-header">
                Lead ID: <?php echo $row['leadid']; ?>
            </div>
            <div class="card-body">
                <p><strong> Date: </strong> <?php echo date("d/m/Y", strtotime($row["lddate"])); ?></p>
                <p><strong> Lead Name:</strong>  <?php echo $row['leadname']; ?></p>
                <p><strong> Mobile: </strong> <?php echo $row['mobile']; ?></p>
                <p><strong> Source: </strong> <?php echo $row['source']; ?></p>
                <p><strong> Site visit Dt:  <?php echo date("d/m/Y", strtotime($row["appointmentdt"]));  ?></strong></p>
                <p><strong> Telecaller Status:</strong>  <?php echo $row['statustc']; ?></p>
            </div>
            <div class="card-footer">
            <form action="#" target="_blank" method="post">
                                                <input type="hidden" name="lead_id"
                                                    value="<?php echo $row['leadid']; ?>">
                                                <button style="background-color:transparent; border:0;" type="submit"
                                                    name="pdf_btn" class="btn btn-link btn-warning"><i
                                                        class="fa fa-eye"></i></button>
                                            </form>
                                            <form action="#" method="post">
                                                <input type="hidden" name="lead_edit_id"
                                                    value="<?php echo $row['leadid']; ?>">
                                                <button style="background-color:transparent; border:0;" type="submit"
                                                    name="quot_edit_btn" class="btn btn-link btn-success"><i
                                                        class="fa fa-pen"></i> </button>
                                            </form>
                                            <button style="background-color:transparent; border:0;" type="button"
                                                data-id1="<?php echo $row['leadid']; ?>" id="deleteleads"
                                                class="btn btn-link btn-danger"><i class="fa fa-trash"></i> </button>
                 <!-- <a href="#" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a> -->
            </div>
        </div>
  
</div>

    </div>
    <?php } ?>
    </div>



                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="table">
                            <thead align="center">
                                <tr>
                                    <th>Lead ID</th>
                                    <th>Date</th>
                                    <th>Lead Name</th>
                                    <th>Mobile</th>
                                    <th>Source </th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
                                <tr>
                                    <td><?php  echo $row['leadid']; ?></td>
                                    <td><?php  echo  date("d/m/Y", strtotime($row["lddate"])); ?></td>
                                    <td><?php  echo $row['leadname']; ?></td>
                                    <td><?php  echo $row['mobile']; ?></td>
                                    <td><?php  echo $row['source']; ?></td>
                                    <td style="width:30px;">
                                        <div class="row">
                                            <form action="#" target="_blank" method="post">
                                                <input type="hidden" name="lead_id"
                                                    value="<?php echo $row['leadid']; ?>">
                                                <button style="background-color:transparent; border:0;" type="submit"
                                                    name="pdf_btn" class="btn btn-link btn-warning"><i
                                                        class="fa fa-eye"></i></button>
                                            </form>
                                            <form action="#" method="post">
                                                <input type="hidden" name="lead_edit_id"
                                                    value="<?php echo $row['leadid']; ?>">
                                                <button style="background-color:transparent; border:0;" type="submit"
                                                    name="quot_edit_btn" class="btn btn-link btn-success"><i
                                                        class="fa fa-pen"></i></button>
                                            </form>
                                            <button style="background-color:transparent; border:0;" type="button"
                                                data-id1="<?php echo $row['leadid']; ?>" id="deleteleads"
                                                class="btn btn-link btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php   }   ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


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


    $(document).on('click', '#deleteleads', function() {
        var id = $(this).data("id1");
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "deleteleads.php",
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

