<?php 

    //Connecting with database.
    include 'dbconnect.php';


    // 'submit' is the button name.
    if( isset( $_POST['submit']) ) {
        $name = mysqli_real_escape_string($conn , $_POST['name']);
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $feedbackOrReport = mysqli_real_escape_string($conn , $_POST['feedbackOrReport']);
        $subject = mysqli_real_escape_string($conn , $_POST['subject']);
        $description = mysqli_real_escape_string($conn , $_POST['description']);


        /* feedback_and_report is the table name. name, email etc are the fields in this table. $name, $email etc are the variable names. */
        $sql = "insert into feedback_and_report(name, email, feedbackOrReport , subject , description) values('$name' , '$email' , '$feedbackOrReport' , '$subject' , '$description')";

        $run = mysqli_query($conn , $sql);
        if($run){
            $success = "Message sent successfully.";
        }

        else{
            $error = "Unable to send message. Please try again.";
        }

			
    } //end of first 'if'
    
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
                    <i class="fa fa-info-circle text-success mr-1"></i>About The Developers
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
                        <a class="dropdown-item" href="aboutTheDev.html">About The Developers</a>
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

            <!-- For displaying error or success messages at the top. -->
            <h3 class="text-center text-danger font-weight-bold"><?php echo @$success; echo @$error?> </h3>
        
            <h1 class="text-center text-white font-weight-bold pb-1"> Flora-Pedia </h1>

            <!-- Code for Container div starts. -->
            <div class="container pt-2 mb-1 pb-3" id="formsetting">
                <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Feedback/Report</h3>


                <div class="py-3 mb-5" id="myContainer">
                    <h4 class="text-center text-white"> Before you proceed, please read the instructions:</h4>
                    <h5 class="text-center text-white">- You can send us a feedback/suggestion or you can report a problem/incorrect information with the website/website data.</h5>
                    <h5 class="text-center text-white">- While reporting a problem/incorrect information with the website data, please specify the name of the record or the data field(for example, Common Name of the plant) so that it will be easier for us to find and correct the problem.</h5>
                </div>


                <form method="post" action="" enctype="multipart/form-data">

                        <div class="row py-3" id="myContainer">   <!-- Row div starts -->

                            <div class="col-md-7 col-sm-7 col-12 m-auto pb-4">
                            

                                <div class="form-group">
                                    <label class="text-white">Name</label>
                                    <input type="text" name="name" placeholder="Enter your name" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Email (Optional)</label>
                                    <input type="email" name="email" placeholder="Enter your email (Optional)" class="form-control">
                                </div>

                                <div class="form-group pt-2">
                                    <label class="text-white">Are you giving us a feeback or reporting a problem?</label> <br>
                                    <input type="radio" name="feedbackOrReport" value="feedback" required="required" class="form-check-input ml-2">
                                    <label class="form-check-label text-white pl-4">Feedback</label>
                                      
                                    <input type="radio" name="feedbackOrReport" value="report" class="form-check-input ml-2">
                                    <label class="form-check-label text-white pl-4">Report a problem
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Subject</label>
                                    <input type="text" name="subject" placeholder="Describe briefly the topic you're writing about" class="form-control">
                                </div>
								
								<div class="form-group">
                                    <label class="text-white">Description</label>
                                    <!-- Do not leave a space at the closing </textarea> tag. Otherwise, the placeholder will not appear. -->
									<textarea style="height:200px;" name="description" class="form-control" required="required" placeholder="For example : Reporting incorrect information- The 'Genus' of the plant with the Common Name 'Blooming Ixora' is incorrect. "></textarea>
                                </div>
                            	

                                <input type="submit" name="submit" value="Submit" class="btn btn-success px-5 mt-4 mx-auto">
								
								

                            </div>


                        </div>  <!-- Row div ends. -->

                </form>





            </div>
            <!-- Code for Container div ends. -->

            
        </section>
        <!-- Code for main form/section ends -->



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
	//Solution - error or success messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}
</script>
