<?php
session_start();    //Starting Session.

    //Connecting with database.
    include 'plantService.php';

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

    <style>
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
                <p class="text-center text-dark font-weight-bold">Flora-Pedia</p>
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


            <!-- Code for main form/section -->
            <section id="main-form">


                <!-- Displaying other details -->
                <u> <h3 class="text-center font-weight-bold pb-1 ">Details:</h3> </u>
                <div class="container bg-success text-center text-white pb-2 pt-4">
                    
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


                <hr class="w-35 mx-auto border border-dark mt-4 mb-3">


                <!-- Displaying Description -->
                <u> <h3 class="text-center font-weight-bold pb-1 pb-2">Description:</h3> </u>
                <div class="container bg-success text-white p-4 h5">  

                    <?php
                        //Newlines don't show by default on an HTML page. We need to convert them to line breaks by using nl2br().
                        //nl2br() function - For displaying the exact indentation of data entered by the user in input boxes during the addition of data.
                        echo nl2br( $json_array[$_GET['id']]['description'] ), "<br>"; 
                    ?>

                </div>


                <hr class="w-35 mx-auto border border-dark mt-4 mb-4">


                <!-- Displaying Image -->
                <u> <h3 class="text-center font-weight-bold pb-1 pb-2">Image:</h3> </u>
                <div class="container bg-success text-white text-center p-4 mb-5">
                    <a href="uploadedImages/<?php echo $json_array[$_GET['id']]['image']; ?>">
                        <img src="uploadedImages/<?php echo $json_array[$_GET['id']]['image']; ?>" class="responsive" width="400" height="400">
                    </a>
                                            
                </div>
                
                
                
            </section>

        </div>
    </div>

</body>
 
</html>



<script>

    //Solution  - messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}
    
</script>