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

<!-- Start Breadcrumbs -->
<!-- <div class="technaus-light-background-color">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="technaus-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="#" class="technaus-second-text-color">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact 1</li>
          </ol>
        </nav> 
    </div>
</div> -->
<!-- /End Breadcrumbs -->

<!-- Start page content -->
<br>
<div class="container">
    <div class="row overflow-hidden">
        <div class="col-12 col-md-10 offset-md-1 mt-2">

            <div class="mt-0 mb-5 my-md-5">
                   <!-- Display thank you message -->
            <?php if (isset($_GET['submitted']) && $_GET['submitted'] == 'true') { ?>
                <p class="thank-you-message mb-3">Thank you for submitting your quote request! We'll be in touch soon.</p>
            <?php } ?>
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


         

            <form class="technaus-contact-form" id="quoteForm" method="POST" action="process_form.php"
                onsubmit="return validateForm()">
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
                <button type="submit"
                    class="btn technaus-second-background-color rounded-0 text-white btn-block p-3">Get Quote</button>
            </form>


        </div>
        <div class="col-12 col-sm-6 wow fadeInRight ">
            <img src="assets/custom/images/site/getquote2.png" alt="" class="w-75">


        </div>
    </div>
</div>
<!-- /End page content -->
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


<?php require_once 'includes/footer.php'; ?>