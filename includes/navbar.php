<body>
    <!-- Loading Screen -->
    <div id="ju-loading-screen">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>
    <!-- /End Top Header -->
    <div class="technaus-transparent py-3 py-lg-0">
        <nav class="navbar navbar-expand-md btco-hover-menu py-lg-2 custom-bg-color fixed-top">
            <div class="container">
                <a class="navbar technaus-logo pl-0" href="index">
                    <img src="assets/custom/images/site/Technaus-India-LogoR.png" alt="technaus Template"
                        style="height:45px;" class="technaus-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#technausNavDropdown"
                    aria-controls="technausNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="technaus-iconmenu-icon text-white font-16"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="technausNavDropdown">
                    <ul class="navbar-nav mx-auto technaus-nav">
                        <a class="nav-link" href="index" id="home">Home</a>
                        <a class="nav-link" href="about" id="about">About</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="coming-soon" id="sub-nav1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Services</a>
                            <ul class="dropdown-menu" aria-labelledby="sub-nav1">
                                <li><a class="dropdown-item" href="residential-solar" id="residential-solar">Residential
                                        Solar</a></li>
                                <li><a class="dropdown-item" href="commercial-solar" id="commercial-solar">Commercial
                                        Solar</a></li>
                                <li><a class="dropdown-item" href="battery" id="battery">Battery Storage</a></li>
                                <li><a class="dropdown-item" href="ev-charging" id="ev-charging">EV Charging</a></li>
                            </ul>
                        </li>
                        <a class="nav-link" href="gallery" id="gallery">Gallery</a>
                        <a class="nav-link" href="contactus" id="contact">Contact Us</a>
                        <a class="nav-link btn technaus-second-background-color technaus-second-border-color white-color rounded-0 mr-4 px-3 px-md-4 py-2 bg-hover-transparent technaus-second-hover-color"
                            href="survey" id="survey">Survey</a>
                            <a class="nav-link" href="admin_invoice" target="_blank" id="admin" 
                            onclick="return confirm('Are you sure you want to redirect to the admin portal?')">Login</a>


                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <script>
        // Get the current URL path
        var currentPath = window.location.pathname;
        var pathToMatch = currentPath.split('/').pop(); // Get the last part of the path

        // console.log("Current Path:", currentPath); // Check what the current path is
        // console.log("pathtomatch:", pathToMatch); // Check what the current path is

        // Define an object with mappings of URLs to corresponding nav item IDs
        var urlToNavId = {
            '': 'home',
            'index': 'home',
            'about': 'about',
            'residential-solar': 'sub-nav1',
            'commercial-solar': 'sub-nav1',
            'battery': 'sub-nav1',
            'ev-charging': 'sub-nav1',
            'gallery': 'gallery',
            'contactus': 'contact',
            'admin': 'admin',
        };


        // Check if the current URL path exists in the mappings and add the "active" class
        if (urlToNavId[pathToMatch]) {
            document.getElementById(urlToNavId[pathToMatch]).classList.add('active');
        }

    </script>