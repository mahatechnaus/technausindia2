<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>


     
<!-- Start Header -->
<div class="technaus-header technaus-after-overlay">
    <div class="container"> 
         <h2 class="technaus-page-title technaus-second-border-color">Coming Soon</h2>
    </div>
</div>  
<!-- /End Header -->
     
<!-- Start Breadcrumbs -->
<div class="technaus-light-background-color">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <!-- <ol class="technaus-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="#" class="technaus-second-text-color">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Coming Soon</li>
          </ol> -->
        </nav> 
    </div>
</div>
<!-- /End Breadcrumbs -->
     
<!-- Start page content -->  
<div class="container">
     <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2 text-center my-4 my-lg-5 py-0 py-lg-5">
              <div class="technaus-404-page">
                
                  <span class="technaus-iconcommingSoon technaus-second-text-color fa-4x"></span>
                  <h3 class="font-40 font-weight-bold technaus-second-text-color my-3">Coming Soon</h3>
                  <!-- <p class="font-18 technaus-fifth-text-color">We are working on website very hard. Estimated remaining time is:</p>
                   <div id="comming-soon" data-countdown="2020/01/01"></div> -->
              </div>
          </div>
     </div>
     <!-- <div class="row">
            <div class="col-12">
                <h3 class="technaus-main-text-color font-25 semi-font text-center mb-5">Mail me when site is ready:</h3>
            </div>
            <div class="col-12">
                <form class="technaus-contact-form">
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <input type="text" class="form-control py-3 rounded"  placeholder="First Name">   
                      </div>
                      <div class="form-group col-md-6">
                          <input type="text" class="form-control py-3 rounded"  placeholder="Last Name">  
                      </div> 
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <input type="email" class="form-control py-3 rounded" placeholder="Email"> 
                      </div>
                      <div class="form-group col-md-6">
                          <input type="text" class="form-control py-3 rounded" placeholder="Subject"> 
                      </div> 
                  </div> 
                  <div class="form-row"> 
                       <div class="form-group col-md-12">
                           <textarea class="form-control py-3 rounded" placeholder="Message" rows="4"></textarea>
                      </div> 
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" class="btn technaus-second-background-color  white-color technaus-btn-rounded px-5 py-2 font-20">Send</button>
                    </div>
                  </div>
                </form>


            </div>

        </div>  -->

</div>
      
<!-- /End page content -->

<?php require_once 'includes/footer.php'; ?>
<script>
$(document).ready(function() {
    $('[data-countdown]').each(function() {
        var $this = $(this);
        var finalDate = $this.data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<div class="row"><div class="col-6 col-lg-3 mb-3 mb-lg-0 comming-soon-counter">%D <br> <span>Days</span></div>  <div class="col-6 col-lg-3 comming-soon-counter"> %H <br> <span>Hours</span> </div> <div class="col-6 col-lg-3 mb-3 mb-lg-0 comming-soon-counter">  %M <br> <span>Minutes</span></div> <div class="col-6 col-lg-3 mb-3 mb-lg-0 comming-soon-counter"> %S <br> <span>Seconds</span></div></div>'));
        });
    });
});
</script>
