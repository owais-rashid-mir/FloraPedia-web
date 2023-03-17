<?php
    //Connecting with database.
    include 'plantService.php';

?>


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

    <!-- 'Font Awesome' icons - Copy the link from w3schools.com-->
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


        /*  For transparent/translucent container or div. */
        #myContainer {
        background: rgb(60, 60, 60);
        background: rgba(60, 60, 60, 0.4);
        }
        #myContainer a {
        color: #fff;
        }


        /*  For making the images of plants responsive. */
        .responsive {
            width: 100%;
            max-width: 400px;
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

    <!-- Creating a sidebar with hamburger icon. -->
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
            <!-- sticky-top - for persistent/fixed navbar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-success pb-3 m-1 sticky-top">

            <a class="navbar-brand" href="index.php">Flora-Pedia</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">

		        <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="search.php">Go to Search</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="browseAndDiscover.php">Browse & Discover</a>
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
       

        <!-- Code for main form/section -->
        <section id="main-form" class="mx-3 ">

                <h2 class="text-center text-white font-weight-bold pb-2 pr-4"> Flora-Pedia </h2>

                <div class="container-fluid pt-2 mb-1 pb-3" id="formsetting">
                    <h3 class="text-center text-white text-underline">Browse & Discover</h3>
                    
                    <div class="py-3 mb-4 mt-4" id="myContainer">
                        <p class="text-center text-white pt-1">- Click on the images to view them in full size.</p>
                        <p class="text-center text-white">- Plants are ordered alphabetically by their Common Names. </p>
                    </div>
                    <hr class="border">

                        <center>
                        <div class="col-md-12 col-sm-12 col-12 m-auto h4 text-white">

                            <!-- fetching data from mysql using php code -->
                            <?php
                                // we need to use a loop to fetch all the data entries entered into the database.
                                for($j=0; $j<sizeof($json_array); $j++)
                                {   $row = $json_array[$j];
                            ?>
                            
                                    <!-- fname, lname, image etc are names of database fields. -->
                                    <u> <b> Plant No. : </b>  <?php echo $j+1; ?> </u> <br> <br> <!-- For ID-->

                                    <!-- Displaying images. upLoadedImages is the folder name.  -->
                                    <a href="uploadedImages/<?php echo $row['image']; ?>">
                                        <img src="uploadedImages/<?php echo $row['image']; ?>" class="responsive" width="400" height="400">
                                    </a> <br> <br>
                                    

                                    <!-- table-responsive div starts. Create a separate div for table-responisve and keep it outside the <table> tag, otherwise the cells will automatically shrink as per the data in the cells. -->
                                    <div class="table-responsive">
                                        <table style="width:100%" class="table text-white text-center table-bordered table-hover h5">
                                            <tr>
                                                <th style="width:30%">Common Name:</th>
                                                <td style="width:70%"><?php echo $row['cname']; ?></td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%">Botanical Name:</th>
                                                <td style="width:70%"><?php echo $row['bname']; ?> </td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%">Genus:</th>
                                                <td style="width:70%"><?php echo $row['genus']; ?></td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%">Family:</th>
                                                <td style="width:70%"><?php echo $row['family']; ?></td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%">Specie:</th>
                                                <td style="width:70%"><?php echo $row['species']; ?></td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%">Description & More Information:</th>
                                                <td style="width:70%"><a href="displayDescriptionUserEnd.php?id=<?php echo $j?>">Click here</a></td>
                                            </tr>

                                        </table>
                                    </div>  <!-- table-responsive div ends -->
                                    <hr class="border border-gray mb-5 mt-5">
                                    
                            <?php } ?>  <!-- this closing while loop brace won't be recognised until put inside a php tag. -->


                        
                        </div>
                        </center>


                </div>

            </section>



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

