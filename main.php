<?php
session_start();    //Starting Session.

    //Including database file.
    include 'dbconnect.php';

    //If user is trying to access this page by NOT providing an email(or by bypassing the login system), we will restrict the access and provide a message.
    if(!$_SESSION['email']) {
        $_SESSION['login_first'] = "Please login first.";

        //when user fails to get unrestricted access, he will be redirected to the homepage(index.php).
        header('Location:index.php');
    }

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

    <!-- Linking CSS File -->
    <link rel="stylesheet" type="text/css" href="styleForMain.css">


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

    </style>



    <!-- For expanding and hiding the sidebar on clicking the hamburger icon. -->
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
                <p class="text-center text-success font-weight-bold">Flora-Pedia</p>
            </div>

            <!-- sticky-top - for persistent/fixed sidebar -->
            <ul class="list-group list-group-flush sticky-top">
                <a href="main.php" class="list-group-item list-group-item-action">
                    <!-- Using 'Font Awesome' icons -->
                    <i class="fa fa-vcard-o text-success mr-2"></i>DashBoard
                </a>

                <a href="addPlant.php" class="list-group-item list-group-item-action">
                    <!-- fa-user is the icon name - Defined in FONT AWESOME.  -->
                    <i class="fa fa-plus text-success mr-2"></i> Add Plant
                </a>

                <a href="viewPlant.php" class="list-group-item list-group-item-action">
                    <!-- fa-eye is the icon name. Creates an eye icon - Defined in FONT AWESOME.  -->
                    <i class="fa fa-eye text-success mr-2"></i>View Plant
                </a>

                <a href="editPlant.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-pencil text-success mr-2"></i>Edit/Delete Plant
                </a>
				
				<a href="addAdmin.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-user text-success mr-2"></i>Add Admin
                </a>
				
				<a href="viewFeedbackAndReport.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-comments text-success mr-2"></i>View Feedback/Report
                </a>
				

                <a href="logout.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-sign-out text-success mr-2"></i>Logout
                </a>

            </ul>

        </div>

        <!-- Code for Hamburger icon button-->
        <div class="main-body">
            <button class="btn btn-outline-light bg-success sticky-top" id="toggler"> 
                <i class="fa fa-bars"> </i>
            </button>
        


            <!-- Code for main form/screen -->
            <section id="main-form">
            
                <h2 class="text-center text-success font-weight-bold mb-3"> Flora-Pedia </h2> 
                <h3 class="text-center text-success mb-3 font-weight-bold">Welcome To Admin Panel</h3>

                <!-- Container 1 starts -->
                <div class="container bg-success pt-3 pb-2" id="formsetting">
                    <h2 class="text-center text-white font-weight-bold pb-4"> <u>Manage Plant Database</u> </h2>

                    <div class="row">   <!-- Row div starts -->
                        
                        <div class="col-md-4 col-sm-4 col-12 m-auto icon pb-3">
                            <a href="addPlant.php" class="text-white text-center"><i class="fa fa-plus"></i>
                                <h3>Add Plant Details </h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon pb-3">
                            <a href="viewPlant.php" class="text-white text-center"><i class="fa fa-eye"></i>
                                <h3>View Plant Details </h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon pb-3">
                            <a href="editPlant.php" class="text-white text-center"><i class="fa fa-pencil"></i>
                                <h3>Edit/Delete Plant Details </h3>
                            </a>
                        </div>

                    </div>  <!-- Row div ends -->

                </div>  <!-- Container 1 ends -->



                <!-- Container 2 starts -->
                <div class="container bg-success pt-4 pb-2" id="formsetting">
                    <h2 class="text-center text-white font-weight-bold pb-4"> <u>Other Options</u> </h2>

                    <div class="row">   <!-- Row div 2 starts -->
                        
                        <div class="col-md-4 col-sm-4 col-12 m-auto icon pb-3">
                            <a href="addAdmin.php" class="text-white text-center"><i class="fa fa-user"></i>
                                <h3>Add Admin </h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon pb-3">
                            <a href="viewFeedbackAndReport.php" class="text-white text-center"><i class="fa fa-comments"></i>
                                <h3>View Feedback/Report </h3>
                            </a>
                        </div>

                        <div class="col-md-4 col-sm-4 col-12 m-auto icon pb-3">
                            <a href="logout.php" class="text-white text-center"><i class="fa fa-sign-out"></i>
                                <h3>Logout </h3>
                            </a>
                        </div>

                    </div>  <!-- Row div 2 ends -->

                </div>  <!-- Container 2 ends -->



            </section>


        </div>
    </div>

    

    <!-- Footer starts -->
    <footer id="footer">
		<p class="text-center bg-dark text-white mt-4">Copyright © 2020 - Website developed and designed by Owais Rashid Mir. </p>
	</footer>
    <!-- Footer ends -->



</body>
 
</html>