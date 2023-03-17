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
    <link rel="stylesheet" type="text/css" href="styleForSearch.css">


    <style>
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

        /*  For making the images of plants responsive. */
        .responsive {
            width: 100%;
            max-width: 400px;
        }

    </style>


    <!-- For expanding and hiding the sidebar on clicling the hamburger icon. -->
    <script>

        jQuery(document).ready(function($) {
            $('#toggler').click(function(event) {
                event.preventDefault();
                $('#wrap').toggleClass('toggled');
             });
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
       

        <!-- Code for main form/section -->
            <section id="main-form">

                <!-- Displaying other details -->
                <div class="container text-center text-white pt-4">
                    <u> <h3 class="text-center font-weight-bold pb-1">Details:</h3> </u>


                    <table style="width:100%" class="table text-center text-white table-bordered table-hover table-sm">

                        <tr>
                            <th style="width:30%">Common Name:</th>
                            <td style="width:70%"><?php echo $json_array[$_GET['id']]['cname']; ?> </td>
                        </tr>

                        <tr>
                            <th style="width:30%">Botanical Name:</th>
                            <td style="width:70%"><?php echo $json_array[$_GET['id']]['bname']; ?> </td>
                        </tr>

                        <tr>
                            <th style="width:30%">Genus:</th>
                            <td style="width:70%"><?php echo $json_array[$_GET['id']]['genus']; ?> </td>
                        </tr>

                        <tr>
                            <th style="width:30%">Family:</th>
                            <td style="width:70%"><?php echo $json_array[$_GET['id']]['family']; ?> </td>
                        </tr>

                        <tr>
                            <th style="width:30%">Specie:</th>
                            <td style="width:70%"><?php echo $json_array[$_GET['id']]['species']; ?> </td>
                        </tr>

                    </table>

                </div>


                <hr class="w-35 mx-auto border border-gray mt-4 mb-1">


                <!-- Displaying Description -->
                <div class="container text-white p-4 h5">
                        
                    <u> <h3 class="text-center font-weight-bold pb-1">Description:</h3> </u>

                    <?php
                        //Newlines don't show by default on an HTML page. We need to convert them to line breaks by using nl2br().
                        //nl2br() - For displaying the exact indentation of data entered by the user in input boxes during the addition of data.
                        echo nl2br( $json_array[$_GET['id']]['description'] ) , "<br>"; 
                    ?>
                    
                </div>


                <hr class="w-35 mx-auto border border-gray mt-4 mb-1">


                <!-- Displaying Image -->

                <div class="container text-white text-center p-4 mb-5">
                    <u> <h3 class="text-center font-weight-bold pb-1">Image:</h3> </u>
                    <a href="uploadedImages/<?php echo $json_array[$_GET['id']]['image']; ?>">
                        <img src="uploadedImages/<?php echo $json_array[$_GET['id']]['image']; ?>" class="responsive" width="400" height="400">
                    </a>
                                            
                </div>
                
                
                
            </section>



    </div>  <!-- Sidebar div end -->
    </div>  <!-- d-flex div end-->



    <!-- Footer starts -->
    <footer id="footer">
		<p class="text-center bg-dark text-white">Copyright © 2020 - Website developed and designed by Owais Rashid Mir. </p>
	</footer>
    <!-- Footer ends -->

    
    
</body>
 
</html>


<script>

    //Solution  - messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}
    
</script>