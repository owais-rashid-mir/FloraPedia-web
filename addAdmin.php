<?php
session_start();    //Starting Session

    include 'dbconnect.php';    

    //If user is trying to access this page by NOT providing an email(or by bypassing the login system), we will restrict the access and provide a message.
    if(!$_SESSION['email']) {
        $_SESSION['login_first'] = "Please login first.";

        //when user fails to get unrestricted access, he will be redirected to the login page(index.php).
        header('Location:index.php');
    }



    //Initializing variables
    $email_err = $success = $error = "";

    if( isset($_POST['submit']) ) {     //'submit' is the name of the Add Admin button.
        $email = $_POST['email'];
        $password = $_POST['password'];

        /*  Passwords in database should be encrypted and not visible in original characters. For security.
            If you open the database and view the data in 'password' and 'cpassword' rows, it will be encrypted(There will be various random letters/characters instead of actual password.)
        */
        $pass = password_hash($password, PASSWORD_BCRYPT);

        /* If a user has already registered with an email, we will have to stop him from registering
           again.'login' is the table name.
        */
        $query = "select * from login where email = '$email' ";
        $run = mysqli_query($conn,$query);  // $conn is defined in dbconnect.php . 
        $row = mysqli_num_rows($run);

        if($row>0) {
            $email_err ="Email ID already exists. Please register with another email.";
        }

        else{   //If user registers with a new email, proceed with registering the user.
            /* email and password etc are names of table rows. $email etc are above declared variables. Here, encrypted variables of 'Password' is sent.
             */
            $sql = "insert into login(email, password) values('$email' , '$pass')";
            $run = mysqli_query($conn, $sql);

            if($run){
                $success="Registered successfully.";
            }
            else{
                $error="Registration failed. Please try again.";
            }
        }

    }   //End of first if


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

    <!-- Linking Javascript file for client-side login validation. -->
    <script src="addAdminValidation.js"> </script>

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
            <button class="btn btn-outline-light bg-success mt-3 sticky-top" id="toggler"> 
                <i class="fa fa-bars"> </i>
            </button>



    <section>   
        <h2 class="text-center text-success font-weight-bold pb-3 pt-3"> Flora-Pedia </h2>

        <div class="container bg-success pt-2 mb-1 pb-3" id="formsetting"> <!--container starts here. This div will contain the Add Admin Panel.-->
            <h3 class="text-white text-center py-3"> Add Another Admin</h3>

            <!-- Displaying error and success messages -->
            <h5 class="text-danger text-center font-weight-bold pb-3"> <?php echo @$success; echo @$error; ?> </h5>

            <div class="row">  <!--row starts here-->

                <div class="col-md-7 col-sm-7 col-12 m-auto"> <!--start of column div-->

                    <div id="div1" class="mt-1">   
                        <form method="post" action="" onSubmit="return validateAddAdminForm();" >

                            <div class="form-group pb-2 px-5">
                                <label class="text-white">Email</label>
                                <!-- span will show error messages below the email area box -->
                                <span class="float-right text-danger font-weight-bold"> <?php echo @$email_err; ?> </span>
                                <!-- form-control pushes the input box to the next line--> 
                                <input type="email" name="email" id="email" placeholder="Enter your email. Ex: myname@example.com" class="form-control" required="required"> 
                            </div>

                            <div class="form-group pb-2 px-5">
                                <label class="text-white">Password (Password must be 8 characters or longer; must contain atleast one uppercase, lowercase and numeric character.)</label>
                                <!-- form-control pushes the input box to the next line--> 
                                <input type="text" name="password" id="password" placeholder="Enter your password" class="form-control" required="required" autocomplete="off"> 
                            </div>

                            <!-- We will not send the data entered by the user into this Confirm Password field to our table 'login'. Our table has only 2 fields- email and password. We'll just use this field to match the data in Password and Confirm Passwords fields by Javascript. -->
                            <div class="form-group pb-4 px-5">
                                <label class="text-white">Confirm Password</label>
                                <!-- form-control pushes the input box to the next line--> 
                                <input type="text" name="cpassword" id="cpassword" placeholder="Re-enter your password" class="form-control" required="required" autocomplete="off"> 
                            </div>

                            <div class="px-5">
                                <input type="submit" name="submit" value="Add Admin" class="btn btn-danger px-5 mt-2 mb-4">
                            </div>

                        </form>
                           
                    </div> 


                </div> <!-- End of column div-->

            </div> <!-- Row ends here -->

        </div> <!-- Container ends here -->

                        


    </section>

</body>

</html>


<script>
	//Solution for - Error or success messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}
</script>
