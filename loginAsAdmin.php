<?php

    //Starting Session 
    session_start();

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

        /*  For transparent/translucent container. */
        #formsetting {
        background: rgb(60, 60, 60);
        background: rgba(60, 60, 60, 0.4);
        }
        #formsetting a {
        color: #fff;
        }
    </style>


    <!-- Linking Javascript file for client-side login validation. -->
    <script src="loginValidation.js"> </script>

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
       

        <section>

            <!-- Displaying messages. -->
            <h5 class="text-center text-white font-weight-bold"> <?php echo @$_SESSION['login_first']; ?> </h5>

            <h1 class="text-center text-white pt-4 font-weight-bold"> Flora-Pedia </h1>
            <i> <h3 class="text-center text-white pt-1 pb-3"> Know your green counterparts </h3> </i>
            

            <!-- Container starts here. This div will contain the Login Panel. -->
            <div class="container mb-5" id="formsetting"> 
                <h3 class="text-white text-center py-3"> <u> Admin Login Panel </u> </h3>

                <div class="row p-2 pb-5"> <!-- Row starts here -->

                    <div class="col-md-7 col-sm-7 col-12 m-auto pb-5">
                        <form method="post" action="" onSubmit="return validateForm();">

                            <div class="form-group pb-2 px-5">
                                <label class="text-white">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email. Ex: myname@example.com" class="form-control">
                            </div>

                            <div class="form-group pb-4 px-5">
                                <label class="text-white">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control">
                            </div>

                            <div class="px-5">
                                <input type="submit" name="submit" value="login" class="btn btn-success px-5">
                            </div>
                            

                        </form>

                        <!-- The below line will show a message below LOGIN button if the login details are incorrect -->
                        <h5 id="test" class="text-center text-danger font-weight-bold mt-4">Username or password is incorrect.</h5>
                    </div>

                </div> <!-- Row ends here -->

            </div> <!-- Container ends here --> 

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
	//Solution for - 'Username or password is incorrect' message remains on the page even after reloading the page.
    // window.history.replaceState - to prevent a resubmit on refresh and back button.
	document.getElementById('test').style.display='none';
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}
</script>



<?php
//Code for 'login' panel starts.

    //session_start(); - Written on top

    //Including database file.
    include 'dbconnect.php';

    // 'submit' is the button name.
    if( isset($_POST['submit']) ) {

        // Session - Helps to avoid unrestricted access. Login system can't be bypassed now by simply navigating to a particular file/address.
        $email = $_SESSION['email'] = $_POST['email'];
        $pwd = $_POST['password'];

        $sql = "select * from login where email= '$email' ";  //email(without quotes) im this line is a row in the table.
        $run = mysqli_query($conn,$sql);    // $conn is defined in dbconnect.php .
        $row = mysqli_fetch_assoc($run);

        @$pwd_fetch = $row['password'];
        // password_verify : for verifying hashed passwords. Verifying with '==' won't work.
        $pwd_decode = password_verify($pwd , $pwd_fetch);

        if($pwd_decode) {
        //If login is successful, we'll be redirected to main.php(Admin panel) and a success message will be given.
            echo "<script>window.open('main.php?success=Logged In Successfully' , '_self')</script> "; 
        }
        else{
            //If login is unsuccessful, an error message will be displayed.
            echo "<script>document.getElementById('test').style.display='block';</script> ";
            
        }


        /* .
           .
           .
        //For matching unencrypted passwords.
        $row = mysqli_fetch_assoc($run);
        @$pwd_fetch = $row['password'];

        if($pwd == $pwd_fetch) {
        //If login is successful, we'll be redirected to main.php(Admin panel) and a success message will be given.
            echo "<script>window.open('main.php?success=Logged In Successfully' , '_self')</script> "; 
        }
        else{
            //If login is unsuccessful, an error message will be displayed.
            echo "<script>document.getElementById('test').style.display='block';</script> ";
        }
            
        }*/


    } //end of if


//Code for 'login' panel starts.
?>





