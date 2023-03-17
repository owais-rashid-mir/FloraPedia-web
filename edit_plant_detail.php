<?php
session_start();    //Starting Session.

	//Connecting with database.
    include 'dbconnect.php';

    $_SESSION['edit']=1;
    //If user is trying to access this page by NOT providing an email(or by bypassing the login system), we will restrict the access and provide a message.
    if(!$_SESSION['email']) {
        $_SESSION['login_first'] = "Please login first.";
    //when user fails to get unrestricted access, he will be redirected to the login page(index.php).
        header('Location:index.php');
    }

?>



<?php 

// 'update' is the button name.
if( isset($_POST['update'])) {
    $edit_id = $_GET['edit_plant'];
    $cname = mysqli_real_escape_string($conn , $_POST['cname']);
    $bname = mysqli_real_escape_string($conn , $_POST['bname']);
    $genus = mysqli_real_escape_string($conn , $_POST['genus']);
    $family = mysqli_real_escape_string($conn , $_POST['family']);
    $species = mysqli_real_escape_string($conn , $_POST['species']);
    $description = mysqli_real_escape_string($conn , $_POST['description']);

    $flag=0;

    if($_FILES['image']['name']){
		
        /* Problem : If multiple images have same image name, deleting one image will result in the deletion of all these images. 
           Solution : Appending/concatenating a unique ID and time to the image name - Ensuring every image file name is unique. 
        */
        $image = time().uniqid().$_FILES['image']['name'];
		
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];

        
        $image_query = "select * from plant_detail where id='$edit_id' ";
        $run = mysqli_query($conn , $image_query);
        $row = mysqli_fetch_assoc($run);
        $img = $row['image'];
        $flag=1;
    }

    //Validating image.
    if($flag==1){
        if($_FILES['image']['error']==1) {  
            $error = "Image size is larger. Image size should be less than or equal to 2 MB.";
        }

        else if($image_type != 'image/jpg' and $image_type != 'image/png' and $image_type != 'image/jpeg') {
            $error = "Either you have not selected an image file or the image format is invalid (Please upload the image in jpg, jpeg or png format).";
        }
        
        else{ 
            //For deleting the picture from file directory after it is deleted from the database.
            unlink('uploadedImages/'.$img);
            // 'uploadedImages' is the folder name. Images will be moved to this folder after being uploaded.
            move_uploaded_file($image_tmp, "uploadedImages/$image");

            /* plant_detail is the table name. cname, bname etc are the fields in this table. $cname, $bname etc are the variable names. */
             $sql = "update plant_detail set cname='$cname' , bname='$bname' , genus='$genus' , family='$family' , species='$species' , description='$description' , image='$image' where id='$edit_id'";
            $run = mysqli_query($conn , $sql);

                if($run){
                    // _self : Window opens in the same tab.
                        echo "<script> window.open('editPlant.php' , '_self') </script>";
                }
                else{
                    echo "<script>window.open('edit_plant_detail.php?update_error=Unable to update data. Please try again.' , '_self') </script>" ;
                }
                
        }


    }

    else{
        $sql="SELECT *FROM plant_detail where id='$edit_id'";
        $run = mysqli_query($conn , $sql);
        $row = mysqli_fetch_assoc($run);
        $image = $row['image'];
        $sql = "update plant_detail set cname='$cname' , bname='$bname' , genus='$genus' , family='$family' , species='$species' , description='$description' , image='$image' where id='$edit_id'";
        $run = mysqli_query($conn , $sql);
        
        if($run){
            // _self : Window opens in the same tab.
            echo "<script> window.open('editPlant.php' , '_self') </script>" ;
        }

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

    <!-- Online TinyMCE code - For giving text editor functionalities(like making text bold, italic etc) to the TextArea. -->
    <!--  e0zply1ukkupxqtlfo4ou0klgq0tes8dnhgkhr0ex11saucg    : This is the Tiny API key generated from TinyMCE site. -->
    <!-- <script src="https://cdn.tiny.cloud/1/e0zply1ukkupxqtlfo4ou0klgq0tes8dnhgkhr0ex11saucg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
    <!-- Adding a text editor to the textareas. -->
    <!-- <script>tinymce.init({selector:'textarea'});</script>  -->

    <!-- Using offline TinyMCE editor for TextAreas.  -->
    <script src="tinymce_editor/tinymce.min.js"></script>
    <!-- Adding a TinyMCE text editor to the textareas. -->
    <script>tinymce.init({
        selector:'textarea',
        plugins: 'paste',
        toolbar: "undo redo | styleselect | fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | paste pastetext",
        fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
        content_style: "body { font-size: 16pt; }",
        paste_as_text: true,    // This line STOPS the editor from retaining font size, color etc of the copied text.

        //decreasing the breakline spacing in tinymce textarea.
        force_br_newlines : true,
        force_p_newlines : false,
        forced_root_block : '',  

        height: 250
        });
        
    </script>




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

            <ul class="list-group list-group-flush">
                <a href="main.php" class="list-group-item list-group-item-action">
                    <!-- Using 'Font Awesome' icons -->
                    <i class="fa fa-vcard-o text-success mr-2"></i>DashBoard
                </a>

                <a href="addPlant.php" class="list-group-item list-group-item-action">
                    <!-- fa-user is the icon name - Defined in FONT AWESOME.  -->
                    <i class="fa fa-user text-success mr-2"></i> Add Plant
                </a>

                <a href="viewPlant.php" class="list-group-item list-group-item-action">
                    <!-- fa-eye is the icon name. Creates an eye icon - Defined in FONT AWESOME.  -->
                    <i class="fa fa-eye text-success mr-2"></i>View Plant
                </a>

                <a href="editPlant.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-pencil text-success mr-2"></i>Edit Plant
                </a>
				
				<a href="addAdmin.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-plus text-success mr-2"></i>Add Admin
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
        


            <!-- Code for main form/screen -->
            <section id="main-form">
                
            <!-- Displaying error messages -->
                <h4 id='show' class="text-center text-danger font-weight-bold"><?php  echo @ $error;?> </h4>

                <h2 class="text-center text-success font-weight-bold pb-3"> Botanical Plants Database </h2>
                <div class="container bg-success pt-2 mb-1 pb-3" id="formsetting">
                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Edit Plant Details</h3>
					
                    <!-- enctype - for uploading photos to the database. -->
                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="row">

                            <!--grid system is 12 units long, we will use 1 unit of length 7(for large and medium devices), and spare the rest of the units left for better padding-->
                            <!-- m-auto will bring the div to center -->
                                                          


                            <div class="col-md-7 col-sm-7 col-12 m-auto">
                            

                                <div class="form-group">
                                    <label class="text-white">Common Name</label>
									
									<!-- value=... is used to fetch the data into the input fields for editing. The field name of the database table to be fetched is passed to $row -->
                                    <input type="text" id='cname' name="cname" placeholder="Enter the common name of the plant" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Botanical Name</label>
                                    <input type="text" id='bname' name="bname" placeholder="Enter the botanical name of the plant" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Genus</label>
                                    <input type="text" id='genus' name="genus" placeholder="Enter the Genus of the plant" class="form-control"  >
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Family</label>
                                    <input type="text" id='family' name="family" placeholder="Enter the family of the plant" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Species</label>
                                    <input type="text" id='species' name="species" placeholder="Enter the specie of the plant" class="form-control" >
                                </div>
								
								<div class="form-group">
									<label class="text-white">Plant Description</label>
									<textarea style="height:150px;" id="description" name="description" class="form-control">   </textarea>
								</div>


                                <!-- Inserting an image into the database.-->
                                <div class="input-group pt-4">
                                    <label class="text-white pt-1 pr-1">Image</label> 
                                    <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div> 
                                         
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image" value="uploadedImages\.<?php echo $row['image'];?>" >
                                        <label id='img' class="custom-file-label" for="inputGroupFile01">
                                        </label>
                                    </div>    
                                                                                                    
                                </div>
								
								
								<!-- For displaying the file name after the user has selected a file. -->
								<!-- This will work even if there are multiple file inputs on a page. -->
								<script type="text/javascript">

								$('.custom-file input').change(function (e) {
									var files = [];
									for (var i = 0; i < $(this)[0].files.length; i++) {
										files.push($(this)[0].files[i].name);
									}
									$(this).next('.custom-file-label').html(files.join(', '));
								});
								</script>
								
								
                                <input id='check' type="submit"  name="update" value="Update Details" class="btn btn-danger px-5 mt-4 mx-auto">
                                
								
								
                                

                            </div>


                        </div> 

                    </form>


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
	    }



        var mydata = localStorage['xyz']; 
        mydata = JSON.parse(mydata);
        document.getElementById('cname').value = mydata['cname']; 
        document.getElementById('bname').value = mydata['bname'];
        document.getElementById('genus').value = mydata['genus'];
        document.getElementById('family').value = mydata['family'];
        document.getElementById('species').value = mydata['species'];
        document.getElementById('description').innerHTML = mydata['description'];
        document.getElementById('img').innerHTML = mydata['image']; 

</script>