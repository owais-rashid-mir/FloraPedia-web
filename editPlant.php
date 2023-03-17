<?php
session_start();    //Starting Session.

    //Connecting with database.
    include 'plantService.php';

    
    //If user is trying to access this page by NOT providing an email(or by bypassing the login system), we will restrict the access and provide a message.
    if(!$_SESSION['email']) {
        $_SESSION['login_first'] = "Please login first.";
        //when user fails to get unrestricted access, he will be redirected to the login page.
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
            <button class="btn btn-outline-light bg-success sticky-top" id="toggler"> 
                <i class="fa fa-bars"> </i>
            </button>


            <!-- Code for main form/section -->
            <section id="main-form" class="mx-3 ">

                <!-- Displaying success or error messages - When a record is deleted. -->
                <?php
                        if(isset($_SESSION['delete'])){
                ?>
                             <h3  class="text-center text-danger">Deleted successfully.  </h3>
                <?php 
                        unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['edit'])){
                ?>
                             <h3  class="text-center text-danger">Updated successfully.  </h3>
                <?php
                        unset($_SESSION['edit']);
                        }
                ?>
                    

              

                <h2 class="text-center text-success font-weight-bold pb-3 pr-4"> Flora-Pedia </h2>

                <!-- Search form -->
                <div class="col-md-7 col-sm-7 col-12 m-auto py-2">
                    
                    <label class="pl-4">Search by common name, botanical name, genus, specie or family of a plant</label>
                    <form class="form-inline active-cyan-3 active-cyan-4">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input class="form-control form-control-sm ml-3 w-75 border border-primary" type="text" name="" id="myInput" autocomplete="off" placeholder="Search.." aria-label="Search" onkeyup="searchFun()" >
                    </form>
                </div>


                <div class="container-fluid bg-success pt-2 mb-1 pb-3" id="formsetting">
                    <h3 class="text-center text-white font-weight-bold pb-4 pt-2">Edit/Delete Plant Details</h3>
					

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12 m-auto">

                            <!-- table-responsive div starts. Create a separate div for table-responisve and keep it outside the <table> tag, otherwise the cells will automatically shrink as per the data in the cells. -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered bg-white">
                                    
                                        <tr class="header">
                                            <th style="width: 3%;">Serial No.</th> 
                                            <th style="width: 3%;">Action</th>
                                            <th style="width: 3%;">Image</th>
                                            <th style="width: 20%;">Common Name</th>
                                            <th style="width: 20%;">Botanical Name</th>
                                            <th style="width: 20%;">Genus</th>
                                            <th style="width: 20%;">Family</th>
                                            <th style="width: 20%;">Species</th>
                                            <th style="width: 3%;">Description & More Information</th>       
                                        </tr>
                                    

                                    <?php 
                                        // we need to use a loop to fetch all the data entries entered into the database.
                                        for($j=0; $j<sizeof($json_array); $j++)
                                        {   $row = $json_array[$j];
                                    ?>


                                    <!-- Table body. -->
                                        <tr>
                                            <!-- fname, lname, image etc are names of database fields. -->
                                            <!-- word-break:break-all - For text wrapping -->
                                            <td style="word-break:break-all;"> <?php echo $j+1; ?></td> 	<!-- For ID -->
                                            
                                            <!-- Editing and deleting plants. -->
                                            <!-- edit_plant n delete_plant are variables. id is the field name in DB. -->
                                            <td style="word-break:break-all;" >    
                                                <a id=<?php echo $j?> onClick="sendRec(this.id)" href="edit_plant_detail.php?edit_plant=<?php echo $row['id'];?>">Edit</a>  | <br>

                                                <a href="delete_plant_detail.php?delete_plant=<?php echo $row['id']; ?>"   onclick="return confirm('Are you sure you want to delete this record?')" >Delete</a>  
                                            </td>

                                                                                       
                                            <!-- Displaying images. upLoadedImages is the folder name.  -->
                                            <td style="word-break:break-all;" >
                                                <a href="uploadedImages/<?php echo $row['image']; ?>">
                                                    <img src="uploadedImages/<?php echo $row['image']; ?>" width="80" height="80">
                                                </a>
                                            </td>  
                                            <td style="word-break:break-all;"> <?php echo $row['cname']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['bname']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['genus']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['family']; ?></td>
                                            <td style="word-break:break-all;"> <?php echo $row['species']; ?></td>
                                            <td style="word-break:break-all;"> <a href="displayDescription.php?id=<?php echo $j?>">Click here</a></td>	
                                            
                                        </tr>

                                    <?php } ?>  <!-- this closing while loop brace won't be recognised until put inside a php tag. -->


                                </table>
                            </div>  <!-- table-responsive div ends. -->

                        </div>
                        

                    </div>





                </div>

            </section>

        </div>
    </div>

</body>
 
</html>


<script>


	//Solution - error or success messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
        // window.location.href='editPlant.php';
        
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
            var td3 = tr[i].getElementsByTagName("td")[3];  // [3] here is the index of 'Common Name' field of the table.
            var td4 = tr[i].getElementsByTagName("td")[4];
            var td5 = tr[i].getElementsByTagName("td")[5];
            var td6 = tr[i].getElementsByTagName("td")[6];
            var td7 = tr[i].getElementsByTagName("td")[7];  // [7] here is the index of 'Species' field

            if (td3 || td4 || td5 || td6 || td7) {
                //textContent - for printing text of table cell only. Will ignore the <td> tags surrounding the table data.
                txtValue3 = td3.textContent || td3.innerText;
                txtValue4 = td4.textContent || td4.innerText;
                txtValue5 = td5.textContent || td5.innerText;
                txtValue6 = td6.textContent || td6.innerText;
                txtValue7 = td7.textContent || td7.innerText;

                //If a string in table(or a part of string) matches with the user input, display it.
                if (txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1 || txtValue6.toUpperCase().indexOf(filter) > -1 || txtValue7.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } 

                //If a string in table body does not match with the user input, don't display it
                else {
                    tr[i].style.display = "none";
                }
            }   //End of if     
        }   //End of for loop

    }   //End of function.




    function sendRec(id){
        var x = plants[id];
            localStorage.setItem('xyz',JSON.stringify(x)); 
    }

</script>
