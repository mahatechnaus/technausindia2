
<?php
if (!session_id()){
    session_start();
   
}
// Define unique page-specific SEO information
$page_title = "Survey - Technaus Solar in India - Get in Touch for Solar Solutions";
$page_description = "Contact Technaus Solar for inquiries, consultations, and assistance with your solar projects. 
We're here to help you harness the power of the sun.";

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>







<!-- Start Header -->
<div class="technaus-header technaus-after-overlay bg-rules">
    <div class="container">
        <h2 class="technaus-page-title technaus-second-border-color">Survey</h2>
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
        <div class="col-12 col-md-10 offset-md-1 mt-3">
            <div class="row wow fadeInDown" data-wow-delay=".5s">
                <div class="col-12 text-center">
                    <h3
                        class="technaus-about-top-head technaus-second-text-color font-15 semi-font d-inline-block bg-white position-relative">
                        <span class="mx-4">Survey</span>
                    </h3>
                    <h2 class="technaus-second-text-color mt-3 font-30 font-weight-bold text-center">Welcome to Technaus
                        Solar Survey</h2>
                </div>
                <div class="col-12 col-md-10 offset-md-1 mt-3 mb-5">
                    <div class="technaus-forth-text-color ">
                        <p>
                            (Please take a few moments to answer these questions to determine your eligibility for
                            solar)
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="row mb-4 mb-md-5 overflow-hidden">
        <div class="col-12 col-md-12 text-center wow fadeInRight">

            <?php require_once 'surveyform.php'; ?>

        </div>
    </div>
</div>


<!-- /End page content -->
<?php require_once 'includes/footer.php'; ?>