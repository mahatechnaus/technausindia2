<?php
// Define unique page-specific SEO information
$page_title = "Gallery - Technaus Solar - Solar Power and Renewable Energy Solutions Specialists";
$page_description = "Explore our solar installations and projects through our gallery. View the beauty and functionality of 
solar power in action.";

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>


<!-- Start Header -->
<div class="technaus-header technaus-after-overlay bg-rules">
    <div class="container">
        <h2 class="technaus-page-title technaus-second-border-color">Gallery</h2>
    </div>
</div>
<!-- /End Header -->
<!-- Start page content -->

<div class="technaus-counter-no-background my-4 my-md-5 overflow-hidden">
    <div class="container">
        <div class="technaus-about-head-style">
            <div class="row wow fadeInDown" data-wow-delay=".5s">
                <div class="col-12 text-center">
                    <h3
                        class="technaus-about-top-head technaus-second-text-color font-15 semi-font d-inline-block bg-white position-relative">
                        <span class="mx-4">Latest Works</span>
                    </h3>
                    <p class="technaus-forth-text-color mb-2 mt-3  text-center"> Discover our most recent solar projects that showcase our commitment to sustainable energy
                    solutions. Each project reflects our dedication to innovation, quality, and environmental
                    responsibility. From residential rooftops to commercial complexes, our installations harness the
                    power of the sun to create a greener future.</p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mb-4 mb-md-5">  
    <div class="gallery-filter">
        <div class="portfolioFilter my-3 clearfix">
            <a href="#" data-filter="*" class="current">ALL</a>
            <a href="#" data-filter=".ResSolar" class="technaus-forth-text-color">Residential solar</a>
            <a href="#" data-filter=".ComSolar" class="technaus-forth-text-color">Commercial solar</a>
            <a href="#" data-filter=".BatteryStorage" class="technaus-forth-text-color">Battery storage</a>
            <a href="#" data-filter=".evCharging" class="technaus-forth-text-color">EV charging</a>
        </div>
        <div class="portfolioContainer row filter-masonry">
            <div class="drawings places col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/stage1.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/stage1.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>
            <div class="drawings places col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/stage2.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/stage2.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>

            <div class="ResSolar col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/residential1.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/residential1.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>
            <div class="BatteryStorage col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/battery1.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/battery1.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>
            <div class="ResSolar col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/residential2.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/residential2.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>

            </div>
            <div class="ComSolar col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/industry1.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/industry1.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>

            <div class="ResSolar col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/residential3.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/residential3.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>
            <div class="ResSolar col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/residential4.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/residential4.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>

            <div class="ComSolar col-sm-6 col-md-3 mb-2">
                <div class="filter-img-block position-relative image-container translate-effect-right">
                    <img src="assets/custom/images/site/industry2.jpg" alt="image" class="w-100">
                    <div class="img-filter-overlay technaus-main-color-transparent row m-0">
                        <a href="#" class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconlink"></span></a>
                        <a data-fancybox="gallery" href="assets/custom/images/site/industry2.jpg"
                            class="gallery-filter-icon white-color technaus-second-hover-color"><span
                                class="technaus-iconsearch-icon"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="#"
                class="btn technaus-main-border-color technaus-main-text-color mt-md-4 px-5 py-2 technaus-btn-rounded technaus-main-hover-background-color white-color-hover">Show
                All Projects</a>
        </div>
    </div>
</div>




<!-- /End page content -->

<?php require_once 'includes/footer.php'; ?>