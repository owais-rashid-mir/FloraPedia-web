<!DOCTYPE html>

<html>

<head>

    <!-- For ensuring proper rendering and touch zooming in mobile devices, add below Bootstrap4 line -->
    <!-- Below Bootstrap line enables the page to automatically adapt to different device sizes -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Including Bootstrap4 -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- 'Font Awesome' icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    <!-- Linking CSS File. Copy all this to style.css -->
    <link rel="stylesheet" type="text/css" href="style.css">


    <style>
        /* Back-to-top button CSS */
        .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display:none;
        }


        /*  For keeping the footer at the bottom. */
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            display: table;
        }
        footer {
            background-color: grey;
            display: table-row;
            height: 0;
        }
    
    </style>


    <script>
        
        //For expanding and hiding the sidebar on clicling the hamburger icon.
        jQuery(document).ready(function($) {
            $('#toggler').click(function(event) {
                event.preventDefault();
                $('#wrap').toggleClass('toggled');
             });
        });



        //Back-to-top button JS
        $(document).ready(function(){

            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                $('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
            
            $('#back-to-top').tooltip('show');

        });

    </script>


</head>



<body> 

    <!-- Creating a sidebar with hamburger icon. 'toggled' keeps the sidebar collapsed.-->
    <div class="d-flex toggled" id="wrap">

        <div class="sidebar border-light">
            <div class="sidebar-heading">
                <p class="text-center text-success font-weight-bold"> Flora-Pedia </p>
            </div>

            <!-- sticky-top - for persistent/fixed sidebar -->
            <ul class="list-group list-group-flush sticky-top">
                <a href="index.php" class="list-group-item list-group-item-action">
                    <!-- Using 'Font Awesome' icons -->
                    <i class="fa fa-home text-success mr-1"></i>Home
                </a>

                <a href="search.php" class="list-group-item list-group-item-action">
                    <!-- fa-user is the icon name - Defined in FONT AWESOME.  -->
                    <i class="fa fa-search text-success mr-1"></i>Go to Search
                </a>

                <a href="browseAndDiscover.php" class="list-group-item list-group-item-action">
                    <!-- fa-user is the icon name - Defined in FONT AWESOME.  -->
                    <i class="fa fa-wpexplorer text-white bg-success mr-1"></i>Browse & Discover
                </a>

                <a href="viewGallery.html" class="list-group-item list-group-item-action">
                    <!-- fa-eye is the icon name. Creates an eye icon - Defined in FONT AWESOME.  -->
                    <i class="fa fa-eye text-success mr-1"></i>View Gallery
                </a>

				<a href="loginAsAdmin.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-sign-in text-success mr-1"></i>Login as Admin
                </a>
				
				<a href="about.html" class="list-group-item list-group-item-action">
                    <i class="fa fa-info-circle text-success mr-1"></i>About
                </a>


                <a href="aboutTheDev.html" class="list-group-item list-group-item-action">
                    <i class="fa fa-info-circle text-success mr-1"></i>About The Developer
                </a>

                <a href="addFeedbackAndReport.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-comments text-success mr-1"></i>Feedback/Report
                </a>

            </ul>

        </div>
        <!-- Sidebar ends -->


        <!-- Code for Hamburger icon button starts-->
        <div>
            <button class="btn btn-outline-light bg-success mt-3 sticky-top" id="toggler"> 
                    <i class="fa fa-bars"> </i>
            </button>
        </div>
        <!-- Code for Hamburger icon button ends-->
 

        <div class="myHeader">

            <!-- Making a Navbar in Bootstrap. -->
            <!-- navbar-expand-lg : for collapsing the navbar in smaller devices automatically. -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-success pb-3 m-1 sticky-top">

            <a class="navbar-brand" href="index.php">Flora-Pedia</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="search.php">Go to Search</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="browseAndDiscover.php">Browse & Discover</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="viewGallery.html">View Gallery</a>
                </li>
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="addFeedbackAndReport.php">Feedback/Report</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="about.html">About</a>
                        <a class="dropdown-item" href="aboutTheDev.html">About The Developer</a>
                    </div>
                </li>

                <li class="nav-item">
                    <button class="bg-success border border-white font-weight-bold mx-1 px-1"> <a class="nav-link text-white" href="loginAsAdmin.php">Login As Admin</a> </button>
                </li>

            </ul>

            
        </div>  <!-- End of myHeader div -->
        
        </nav>  <!-- End of Navbar -->
       

        <!-- Code for main form/section starts. -->
        <section class="main-form">
        
            <!-- Main container starts. -->
            <div class="container mt-4" id="formsetting">  
                
                <!-- Title starts. -->
                <div class="container-fluid pt-2"> 
                    <h1 class="text-center text-white font-weight-bold"> Flora-Pedia </h1>
                    <i> <h3 class="text-center text-white"> Know your green counterparts </h3> </i>
                    <hr class="w-25 mx-auto pb-3">
                </div>
                <!-- Title ends. -->


                <!-- Description starts. -->
                <div class="container-fluid mt-3"> 
                    <h4 class="text-center text-white"> Flora-Pedia is an online database of digitized plant specimens. </h4>
                    <hr class="w-35 mx-auto mb-4">
                </div>
                <!-- Description ends. -->


                <!-- Go To Search starts. -->
                <div class="container-fluid text-center pb-3">
                    <h3 class="text-white pb-2 font-weight-bold"> What are you looking for? </h3>
                  
                    <!-- <button class="bg-success p-1"> <a href="search.php" class="text-white text-center"> <h4> <i class="fa fa-search text-white" aria-hidden="true"></i> Go to Search </h4> </a> </button> -->

                    <a class="btn btn-success btn-rounded btn-lg px-5" href="search.php" role="button"> <i class="fa fa-search mr-1"> </i> Launch a Quick Search</a>

                    <hr class="w-35 mx-auto">
                </div>
                <!-- Go To Search ends. -->

                
                <!-- Browse and Discover starts. -->
                <div class="container-fluid text-center">
                    <h3 class="text-white pb-2 font-weight-bold">Want to browse our online repository of Botanical plants?</h3> 

                        <a class="btn btn-success btn-rounded btn-lg px-5" href="browseAndDiscover.php" role="button"> <i class="fa fa-wpexplorer mr-1"> </i> Browse & Discover</a>
                    
                    <hr class="w-35 mx-auto pb-4">
                </div>
                <!-- Browse and discover ends. -->


                <!-- View Gallery starts. -->
                <div class="container-fluid mb-4"> 

                    <div class="row mb-5">
				        <div class="col-lg-6 col-md-6 col-12">
                            <img src="images/homepagePic1.jpg" class="img-fluid">
				        </div>
				
                        <div class="col-lg-6 col-md-6 col-12 mb-5">
                            <h2 class="text-white font-weight-bold"> View Gallery  </h2>
                            <hr>
                            <h4 class="pt-3 pb-3"> We have handpicked some plants from our wide range of collections! Want to check out our plant gallery? </h4>
                        
                            <a class="btn btn-success btn-rounded btn-lg" href="viewGallery.html" role="button"> <i class="fa fa-eye mr-1"> </i> View Gallery</a>

                        </div>
                    </div>
                    
                    <hr class="w-35 mx-auto">
                </div>
                <!-- View Gallery ends. -->

                

            </div>  
            <!-- Main container ends. -->
            
        </section>
        <!-- Code for main form/section ends -->


        <!-- back to top button -->
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return to the top." data-toggle="tooltip" data-placement="left"> <i class="fa fa-chevron-up"></i>  </a>
	    

    </div>  <!-- Sidebar div end -->
    </div>  <!-- d-flex div end-->


    <!-- Footer starts -->
    <footer class="mt-5" id="footer">
		<p class="text-center bg-dark text-white">Copyright © 2020 - Website developed and designed by Owais Rashid Mir. </p>
	</footer>
    <!-- Footer ends -->

    
</body>
 
</html>
