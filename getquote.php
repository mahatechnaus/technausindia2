<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<!-- Start Header -->
<div class="technaus-header technaus-after-overlay bg-rules">
    <div class="container">
        <h2 class="technaus-page-title technaus-second-border-color">Get quote</h2>
    </div>
</div>
<!-- /End Header -->

<!-- Start page content -->
<br>
<div class="container">
    <div class="row overflow-hidden">
        <div class="col-12 col-md-10 offset-md-1 mt-2">
  
           

            <div class="mt-0 mb-5 my-md-5">
                <h3 class="font-35 font-weight-bold technaus-main-text-color text-center">Get Your Free Quote & Start
                    <br>Saving Big on
                    <span class="technaus-second-text-color">Energy Costs</span>
                </h3>
                <p class="mt-3 mb-3 technaus-forth-text-color ">
                    Choosing the right solar power system for your needs can be a confusing and daunting endeavour.
                    If you are a homeowner and your energy costs are breaking the bank, we can help.
                    Technaus Solar offer FREE in-home energy audits with our professional renewable energy consultants
                    at times convenient
                    to your busy schedule.
                </p>
                <p class="mb-5 technaus-forth-text-color">
                    With zero upfront cost options, there has never been a better time to invest in a solar power system
                    for your home.
                </p>
            </div>

        </div>
    </div>
    <!-- onsubmit="return validateForm()"> -->

    <div class="row mb-4 mb-md-5 overflow-hidden">
        <div class="col-12 col-sm-6 wow fadeInLeft">
        <div id="respmessage" class="respmessage" style="display: none;"></div>
            <form action="requestform_ajax.php" method="post" id="getquote" name="getquote"
                class="technaus-contact-form">
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control rounded-0 p-3" placeholder="Name"
                        required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control rounded-0 p-3" placeholder="Email"
                        required>
                </div>
                <div class="form-group">
                    <input type="tel" id="mobile" name="mobile" class="form-control rounded-0 p-3" placeholder="Mobile"
                        required>
                </div>
                <div class="form-group">
                    <select class="form-control rounded-0 p-3" id="category" name="category" style="height: auto;"
                        required>
                        <option value="" selected disabled>Select Category</option>
                        <option value="ressolarcat">Residential Solar</option>
                        <option value="comsolarcat">Commercial Solar</option>
                        <option value="batterycat">Battery Storage</option>
                        <option value="evchargingcat">EV Charging</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control rounded-0 p-3" id="message" name="message" placeholder="Message"
                        rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="g-recaptcha-response" value="" id="g-recaptcha-response">
                </div>
                <button type="submit" id="quote_form" name="quote_form"
                    class="btn technaus-second-background-color rounded-0 text-white btn-block p-3 g-recaptcha">
                    Get Quote</button>
                <input type="hidden" name="quoteSubmited" value="quoteSubmited" />
            </form>
        </div>
        <div class="col-12 col-sm-6 wow fadeInRight ">
            <img src="assets/custom/images/site/getquote2.png" alt="" class="w-75">
        </div>
    </div>
</div>
<!-- /End page content -->
<?php require_once 'includes/footer.php'; ?>

<script>
  $(document).ready(function () {  
      $("#respmessage").html('');    
  });  
</script>
<!-- recaptcha -->
<script>
   $(function () {
        $("#getquote").on('submit', function (e) {
            e.preventDefault();
            var partnerForm = $(this);
            grecaptcha.ready(function () {
                grecaptcha.execute('AIzaSyBrA1FdQmIqNVUg8nvJcbZtYQwBCvC91dw', {
                                        
                    action: 'submit'
                }).then(function (token) {
                    $('#g-recaptcha-response').val(token);
                    $.ajax({
                        url: partnerForm.attr('action'),
                        type: 'post',
                        data: partnerForm.serialize(),
                        success: function (response) {
                            console.log(response);
                            if (response.status == 'success') {
                                $('#getquote')[0].reset();
                            }
                            $("#respmessage").html(response.message).show();
                        }
                    });
                });
            });
        });
    });


</script>

<!-- <script>
    $(document).ready(function () {
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
                                document.getElementById('getquote').reset(); // Reset the form
                                $("#respmessage").html(response.message); // Display success message
                            } else {
                                $("#respmessage").html(response.message); // Display error message
                            }
                        }
                    });
                });
            });
        });
    });
</script> -->

<!-- recaptcha end -->

<script>
    function validateForm() {
        const email = document.getElementById("email").value;
        const mobile = document.getElementById("mobile").value;

        // Perform your custom validation checks here
        if (!isValidEmail(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (!isValidMobile(mobile)) {
            alert("Please enter a valid mobile number.");
            return false;
        }

        return true;
    }

    function isValidEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    function isValidMobile(mobile) {
        const mobilePattern = /^[0-9]{10}$/;
        return mobilePattern.test(mobile);
    }

</script>


