<?php
session_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0074)https://demo.dashboardpack.com/architectui-html-pro/pages-login-boxed.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    
    <title>Technaus Renewable Pvt Ltd</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <link rel="icon" href="assets/images/logo.ico" type="image/png">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="./login/main.d810cf0ae7f39f28f336.css" rel="stylesheet"><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100  bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-4">
                    <div align="center">
                        <h3 style="color:white;"></h3>
                        <img src="assets/images/logo.jpg" style="width:100%">
                    
                </div>
                        <div class="modal-dialog w-100 mx-auto" style="margin-top:-5px;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                            <span>Please sign in to your account below.</span>
                                        </h4>
                                    </div>
                                    <form action="code.php" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" placeholder="Email here..." type="email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                   
                                    <?php
                     
                     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                      echo '<p class="text-danger" align="center"> '.$_SESSION['status']. '</p>';
                      unset($_SESSION['status']);
                     }

                     ?>
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-left">
                                        <!-- <a href="forgot.php" class="btn-lg btn btn-link">Recover Password</a> -->
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" name="loginbtn" class="btn btn-primary btn-lg">Login to Dashboard</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Technaus Solar Renewables 2023. Designed by Technaus Creative.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="./login/main.d810cf0ae7f39f28f336.js.download"></script>

</body>
</html>