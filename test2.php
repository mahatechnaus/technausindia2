<?php include_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="technaus">
    <meta name="author" content="Enterprise evCharging">
    <link rel="shortcut icon" href="assets/custom/images/shortcut.png">

    <title>Technaus Solar - Solar Power and Renewable Energy Solutions Specialists</title>
    <link href="assets/custom/images/site/logo.ico" rel="icon">
    <!-- animate.css-->
    <link href="assets/vendor/animate.css-master/animate.min.css" rel="stylesheet">
    <!-- Load Screen -->
    <link href="assets/vendor/loadscreen/css/spinkit.css" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link href="assets/vendor/fontawesome/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- technaus Icons -->
    <link href="assets/custom/css/technaus-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap-4-navbar.css" rel="stylesheet">
    <!-- portfolio filter gallery -->
    <link href="assets/vendor/portfolio-filter-gallery/portfolio-filter-gallery.css" rel="stylesheet">
    <!-- FANCY BOX -->
    <link href="assets/vendor/fancybox-master/jquery.fancybox.min.css" rel="stylesheet">
    <!-- RANGE SLIDER -->
    <link href="assets/vendor/range-slider/range-slider.css" rel="stylesheet">
    <!-- OWL CAROUSEL  -->
    <link href="assets/vendor/owlcarousel/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/owlcarousel/owl.theme.default.min.css" rel="stylesheet">
    <!-- technaus CUSTOM CSS FILE -->
    <link href="assets/custom/css/custom.css" rel="stylesheet">
    <!-- technaus CUSTOM CSS RESPONSIVE FILE -->
    <link href="assets/custom/css/custom-responsive.css" rel="stylesheet">
   
    <!-- recaptcha  -->
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<!-- Start page content -->
<br>
<div class="container">
    <div class="row overflow-hidden">
        <div class="col-12 col-md-10 offset-md-1 mt-2">
            <?php
            if (isset($_GET['status']) && $_GET['status'] === 'success') {
                $successMessage = $_GET['message'];            
                ?>
                <div id="respmessage" class="respmessage">
                    <?php echo $successMessage; ?>
                </div>
                <?php
            }
            ?>

            <div class="row mb-4 mb-md-5 overflow-hidden">
                <div class="col-12 col-sm-6 wow fadeInLeft">
                    <form action="requestform_ajax.php" method="post" id="getquote" name="getquote"
                        class="technaus-contact-form">        
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control rounded-0 p-3" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control rounded-0 p-3" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="mobile" name="mobile" class="form-control rounded-0 p-3" placeholder="Mobile" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control rounded-0 p-3" id="category" name="category" style="height: auto;" required>
                                <option value="" selected disabled>Select Category</option>
                                <option value="ressolarcat">Residential Solar</option>
                                <option value="comsolarcat">Commercial Solar</option>
                                <option value="batterycat">Battery Storage</option>
                                <option value="evchargingcat">EV Charging</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control rounded-0 p-3" id="message" name="message" placeholder="Message" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="g-recaptcha-response" value="" id="g-recaptcha-response">
                        </div>
                        <button type="submit" id="quote_form" name="quote_form" class="btn btn-primary rounded-0 text-white btn-block p-3 g-recaptcha">Get Quote</button>
                        <input type="hidden" name="quoteSubmited" value="quoteSubmited" />
                    </form>
                </div>
                <div class="col-12 col-sm-6 wow fadeInRight">
                    <img src="assets/custom/images/site/getquote2.png" alt="" class="w-75">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /End page content -->

<!-- recaptcha -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LfKYpIjAAAAAJ8OSkWEy3MCjeD7MT8cOYCfjzDU"></script>

<script>
    $(function () {
        $("#getquote").on('submit', function (e) {
            e.preventDefault();
            var partnerForm = $(this);
            grecaptcha.ready(function () {
                grecaptcha.execute('6LfKYpIjAAAAAJ8OSkWEy3MCjeD7MT8cOYCfjzDU', {
                    action: 'submit'
                }).then(function (token) {
                    $('#g-recaptcha-response').val(token);
                    $.ajax({
                        url: partnerForm.attr('action'),
                        type: 'post',
                        data: partnerForm.serialize(),
                        success: function (response) {
                            if (response.status == 'success') {
                                $('#getquote')[0].reset();
                            }
                            $("#respmessage").html(response.message);
                        }
                    });
                });
            });
        });
    });

</script>
<!-- recaptcha end -->

<?php require_once 'includes/footer.php'; ?>
