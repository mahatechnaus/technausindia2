<?php
include 'includes/db.php';
include 'includes/header.php';
?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<?php
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
    margin-bottom: 5px;
    /* Add this line to remove the bottom margin */
}
</style>
</head>

<body>
    
        <!-- Button to trigger the modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Open Modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>This is the content of the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    <br>
    <br>
    <br>
    <br>
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
                        <div class="col-3 mb-3">

                            <div class="card-container">

                                <div class="card">
                                    <div class="card-header">
                                        Lead ID: <?php echo $row['leadno']; ?>
                                    </div>
                                    <div class="card-body">
                                        <p><strong> Date: </strong>
                                            <?php echo date("d/m/Y", strtotime($row["lddate"])); ?>
                                        </p>
                                        <p><strong> Lead Name:</strong> <?php echo $row['leadname']; ?></p>
                                        <p><strong> Mobile: </strong> <?php echo $row['mobile']; ?></p>
                                        <p><strong> Source: </strong> <?php echo $row['source']; ?></p>
                                        <p><strong> Site visit Dt:
                                                <?php echo date("d/m/Y", strtotime($row["appointmentdt"]));  ?></strong>
                                        </p>
                                        <p><strong> Telecaller Status:</strong> <?php echo $row['statustc']; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <!-- <form action="#" method="post">
                                        <input type="hidden" name="lead_id" value="<?php echo $row['leadid']; ?>">
                                        <button style="background-color:transparent; border:0;" type="submit"
                                            name="pdf_btn" class="btn btn-link btn-warning"><i
                                                class="fa fa-eye"></i></button>
                                    </form> -->

                                        <form action="#" method="post">
                                            <input type="hidden" name="lead_id" value="<?php echo $row['leadid']; ?>">
                                            <button style="background-color:transparent; border:0;" type="button"
                                                class="btn btn-link btn-warning" data-toggle="modal"
                                                data-target="#myModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
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

                </div>
            </div>
        </div>



        <!-- Bootstrap JS (with Popper.js) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        <?php include('includes/footer.php'); ?>