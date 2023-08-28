<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>



<!-- Start Header -->
<div class="technaus-header technaus-after-overlay bg-rules">
    <div class="container">
        <h2 class="technaus-page-title technaus-second-border-color">Contact Us</h2>
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
        <div class="col-12 col-md-10 offset-md-1 mt-5">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown" data-wow-delay=".5s">
                    <span
                        class="technaus-iconmap-icon fa-3x technaus-second-text-color technaus-main-hover-color"></span>
                    <h2 class="font-16 semi-font technaus-second-text-color my-3">Address Information</h2>
                    <p class="font-14 technaus-main-text-color text-center">
                    #27, Puducherry - Tindivanam Main Road, V.I.P Nagar, Pattanur, Puducherry - 605 101</p>
                </div>
                <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown " data-wow-delay=".8s">
                    <span class="technaus-iconphone fa-3x technaus-second-text-color technaus-main-hover-color"></span>
                    <h2 class="font-16 semi-font technaus-second-text-color my-3">Mail & Phone number</h2>
                    <p class="font-14 technaus-main-text-color text-center">solar@technaus.co.in</p>
                    <p class="font-14 technaus-main-text-color text-center">+91 74186 50503</p>

                </div>
                <div class="col-12 col-sm-6 col-md-4 text-center mb-5 mb-md-0 wow fadeInDown" data-wow-delay="1.1s">
                    <span
                        class="technaus-iconshare-icon fa-3x technaus-second-text-color technaus-main-hover-color"></span>
                    <h2 class="font-16 semi-font technaus-second-text-color my-3">Stay In Touch</h2>
                    <ul class="nav technaus-contact-social-links">
                        <li><a href="#" target="_blank"><i
                                    class="fab fa-facebook-f technaus-forth-text-color fa-fw"></i></a></li>
                        <li><a href="#" target="_blank"><i
                                    class="fab fa-instagram technaus-forth-text-color  fa-fw"></i></a></li>
                        <li><a href="#" target="_blank"><i
                                    class="fab fa-twitter technaus-forth-text-color    fa-fw"></i></a></li>
                        <li><a href="#" target="_blank"><i
                                    class="fab fa-linkedin technaus-forth-text-color   fa-fw"></i></a></li>
                    </ul>
                </div>
            </div>




        <div class="mt-0 mb-5 my-md-5">
                        <h3 class="font-35 font-weight-bold technaus-main-text-color text-center">Contact Us</h3>
                        <p class="mt-3 technaus-forth-text-color  text-center">
                            We welcome your inquiries and look forward to connecting with you. 
                            Our team is eager to assist you, whether you have questions, feedback, 
                            or would like to explore how our solar solutions can cater to your needs.
                         </p>
                    </div>

        </div>
    </div>


    
        <div class="row mb-4 mb-md-5 overflow-hidden">
            <div class="col-12 col-sm-6 wow fadeInLeft">
                <form class="technaus-contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control rounded-0 p-3" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control rounded-0 p-3" placeholder="Email">
                    </div>
                    <div class="form-group">                      
                        <div class="form-group">                      
                            <select class="form-control rounded-0 p-3" style="height: auto;">
                                <option value="" selected disabled>Select Category</option>
                                <option value="ressolarcat">Residential Solar</option>
                                <option value="comsolarcat">Commercial Solar</option>
                                <option value="batterycat">Battery Storage</option>
                                <option value="evchargingcat">EV Charging</option>                           
                            </select>                     
                        </div>
                                       
                    </div>
                    <div class="form-group">
                        <textarea class="form-control rounded-0 p-3" placeholder="Message" rows="3"></textarea>
                    </div>
                    <button type="submit"
                        class="btn technaus-second-background-color rounded-0 text-white btn-block p-3">Send</button>
                </form>
            </div>
            <div class="col-12 col-sm-6 wow fadeInRight">
                <div id="map" data-lng="31.248848" data-lat="29.966324" data-icon="assets/custom/images/map-marker.png"
                    data-zom="12" style="width:100%;height:420px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d62451.05164512451!2d79.805857!3d11.961293!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a53631bbb3669d7%3A0x5db1e34f9771b647!2sTechnaus%20Renewable%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1692683481484!5m2!1sen!2sin"
                        width="600" height="415" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    
                </div>
            </div>
        </div>
</div>
<!-- /End page content -->
<?php require_once 'includes/footer.php'; ?>