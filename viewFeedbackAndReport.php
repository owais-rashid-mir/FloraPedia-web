<?php
session_start();    //Starting Session.

    //Connecting with database.
    include 'dbconnect.php';

    //If user is trying to access this page by NOT providing an email(or by bypassing the login system), we will restrict the access and provide a message.
    if(!$_SESSION['email']) {
        $_SESSION['login_first'] = "Please login first.";

        //when user fails to get unrestricted access, he will be redirected to the login page(index.php).
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

                <!-- Displaying success or error messages - When a record is deleted. -->
                <?php
                    // delfed : Delete feedback. This variable is declared in delete_feedback_report.php file.
                    if(isset($_SESSION['delfed'])){     
                ?>

                <h3 class="text-center text-danger"> Deleted successfully.</h3>

                <?php
                        unset($_SESSION['delfed']);
                    }   //end of If
                ?>

            
                <h2 class="text-center text-success font-weight-bold mb-4"> Flora-Pedia </h2> 
                <!-- Container div starts -->
                <div class="container-fluid bg-success" id="formsetting">
                    <h3 class="text-center text-white font-weight-bold py-4">View Feedback/Report </h3>

                        
                        <div class="col-md-12 col-sm-12 col-12 m-auto h4 text-white">

                            <!-- fetching data from mysql using php code -->
                            <?php 
                                $sql = "select * from feedback_and_report";
                                $run = mysqli_query($conn , $sql);

                                // $i is a variable which will keep track of the serial number.
                                /* If you don't use this variable, the serial number will be displayed acc. to the id's in the database (Database IDs are non-consecutive if you have deleted some fields.) */
                                $i=1;

                                // we need to use a loop to fetch all the data entries entered into the database.
                                while($row = mysqli_fetch_assoc($run))
                                {  //Closing tag is placed after Table body.

                            ?>

                                    <!-- table-responsive div starts. Create a separate div for table-responisve and keep it outside the <table> tag, otherwise the cells will automatically shrink as per the data in the cells. -->
                                    <div class="table-responsive">
                                        <table style="width:100%" class="table text-white table-bordered table-hover h5">

                                            <!-- name, email etc are names of database fields. -->

                                            <tr>
                                                <th style="width:30%"> Serial No. : </th>
                                                <td style="width:70%"> <?php echo $i++; ?> </td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%"> Name : </th>
                                                <td style="width:70%"> <?php echo $row['name']; ?> </td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%"> Email : </th>
                                                <td style="width:70%"> <?php echo $row['email']; ?> </td>
                                            </tr>    

                                            <tr>
                                                <th style="width:30%"> Feedback or Report? : </th>
                                                <td style="width:70%"> <?php echo $row['feedbackOrReport']; ?> </td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%"> Subject : </th>
                                                <td style="width:70%"> <?php echo $row['subject']; ?> </td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%"> Description : </th>
                                                <!-- Newlines don't show by default on an HTML page. We need to convert them to line breaks by using nl2br().
                                                nl2br() - For displaying the exact indentation of data entered by the user in input boxes during the addition of data. -->
                                                <td style="width:70%"> <?php echo nl2br( $row['description'] ); ?> </td>
                                            </tr>

                                            <tr>
                                                <th style="width:30%"> Delete this feedback/Report : </th>

                                                <!-- del_fb_rep : Delete feedback/Report. -->
                                                <td style="width:70%"> <a class="btn btn-danger btn-rounded" href="delete_feedback_report.php?del_fb_rep=<?php echo $row['id']; ?>" role="button" onclick="return confirm('Are you sure you want to delete this record?')" >Delete</a> </td>
                                            </tr>


                                        </table>
                                    </div>  <!-- table-responsive div ends -->
                                    <hr class="border border-dark mb-5 mt-5">	
                                    
                                    
                            <?php } ?>  <!-- this closing while loop brace won't be recognised until put inside a php tag. -->

                            
                        </div>




                </div>
                <!-- Container div ends. -->

            </section>


        </div>
    </div>

    

</body>
 
</html>



<script>
	//Solution - messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}
</script>