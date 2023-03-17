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
                    <a class="nav-link text-white font-weight-bold" href="search.php">Go to Search</a>
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
        <section id="main-form" class="mx-3">

                <h2 class="text-center text-white font-weight-bold pb-3 pr-4"> Flora-Pedia </h2>
                
                <center> <label class="text-white">Search by common name, botanical name, genus, specie or family of a plant</label> </center>
                    
                <div class="input-group px-3 pb-4">
                    <i class="fa fa-search text-white pr-2 pt-2" aria-hidden="true"></i>
                    <input type="text" name="" id="myInput" autocomplete="off" class="form-control border border-primary" placeholder="Search.." onkeyup="searchFun()">
                </div>


                <!-- start of Container div -->
                <div class="container-fluid bg-success pt-2 mb-4 pb-3" id="formsetting">
                    <h3 class="text-center text-white font-weight-bold py-3">Plant Database</h3>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12 m-auto">

                            <!-- table-responsive div starts. Create a separate div for table-responisve and keep it outside the <table> tag, otherwise the cells will automatically shrink as per the data in the cells. -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered bg-white">
                                    
                                        <tr class="header">
                                        
                                            <th style="width: 3%;">Serial No.</th> 
                                            <th style="width: 5%;">Image</th>
                                            <th style="width: 20%;">Common Name</th>
                                            <th style="width: 20%;">Botanical Name</th>
                                            <th style="width: 20%;">Genus</th>
                                            <th style="width: 20%;">Family</th>
                                            <th style="width: 20%;">Specie</th>
                                            <th style="width: 3%;">Description & More Information</th>      
                                        </tr>
                                    

                                    <!-- fetching data from mysql using php code -->
                                    <?php 
                                    
                                        // we need to use a loop to fetch all the data entries entered into the database.
                                        for($j=0; $j<sizeof($json_array); $j++)
                                        {   $row = $json_array[$j];
                                    ?>


                                    <!-- Table body. -->
                                        <tr>
                                        
                                            <!-- fname, lname, image etc are names of database fields. -->
                                            <!-- word-break:break-all - For text wrapping -->
                                            <td style="word-break:break-all;"> <?php echo $j+1; ?></td> 	<!-- For ID-->

                                            <!-- Displaying images. upLoadedImages is the folder name.  -->
                                            <td style="word-break:break-all;">
                                                <a href="uploadedImages/<?php echo $row['image']; ?>">
                                                    <img src="uploadedImages/<?php echo $row['image']; ?>" width="80" height="80">
                                                </a>
                                            </td>  
                                            
                                            <td style="word-break:break-all;"> <?php echo $row['cname']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['bname']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['genus']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['family']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['species']; ?></td>
                                            <td style="word-break:break-all;"><a href="displayDescriptionUserEnd.php?id=<?php echo $j?>">Click here</a></td>	
                                            
                                        </tr>
                                        
                                    <?php } ?>  <!-- this closing while loop brace won't be recognised until put inside a php tag. -->


                                </table>
                            </div>  <!-- table-responsive div starts. -->
                            
                        </div>
                        

                    </div>


                </div>  <!-- End of Container div -->


            </section>


    </div>  <!-- Sidebar div end -->
    </div>  <!-- d-flex div end-->



    <!-- Footer starts -->
    <footer class="mt-5" id="footer">
		<p class="text-center bg-dark text-white"> Copyright © 2020 - Website developed and designed by Owais Rashid Mir. </p>
	</footer>
    <!-- Footer ends -->
    

    
</body>
 
</html>



<script>


	//Solution for - Error or success messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}


    //Search functionality.

    function searchFun() {
        var input, filter, table, tr, i, txtValue;

        // input will contain the data entered by the user in the search bar.
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        //storing <tr> of table in a variable of same name.
        tr = table.getElementsByTagName("tr");

        for (i = 0; i<tr.length; i++) {
            var td2 = tr[i].getElementsByTagName("td")[2];  // [2] here is the index of 'Common Name' field of the table.
            var td3 = tr[i].getElementsByTagName("td")[3];
            var td4 = tr[i].getElementsByTagName("td")[4];
            var td5 = tr[i].getElementsByTagName("td")[5];
            var td6 = tr[i].getElementsByTagName("td")[6];  // [6] here is the index of 'Species' field

            if (td2 || td3 || td4 || td5 || td6) {
                //textContent - for printing text of table cell only. Will ignore the <td> tags surrounding the table data.
                txtValue2 = td2.textContent || td2.innerText;
                txtValue3 = td3.textContent || td3.innerText;
                txtValue4 = td4.textContent || td4.innerText;
                txtValue5 = td5.textContent || td5.innerText;
                txtValue6 = td6.textContent || td6.innerText;

                //If a string in table(or a part of string) matches with the user input, display it.
                if (txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1 || txtValue6.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } 

                //If a string in table body does not match with the user input, don't display it
                else {
                    tr[i].style.display = "none";
                }
            }   //End of if     
        }   //End of for loop

    }   //End of function.

 
</script>