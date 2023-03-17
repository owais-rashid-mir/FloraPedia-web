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



    // 'submit' is the button name.
    if( isset( $_POST['submit']) ) {
        $cname = mysqli_real_escape_string($conn , $_POST['cname']);
        $bname = mysqli_real_escape_string($conn , $_POST['bname']);
        $genus = mysqli_real_escape_string($conn , $_POST['genus']);
        $family = mysqli_real_escape_string($conn , $_POST['family']);
        $species = mysqli_real_escape_string($conn , $_POST['species']);
        $description = mysqli_real_escape_string($conn , $_POST['description']);
        /* Problem : If multiple images have same image name, deleting one image will result in the deletion of all these images. 
           Solution : Appending/concatenating a unique ID and time to the image name - Ensuring every image file name is unique. 
        */
        $image = time().uniqid().$_FILES['image']['name'];

        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];

        
            //Validating image.
            if($_FILES['image']['error']==1) {  
                $size_error = "Image size is larger. Image size should be less than or equal to 2 MB.";
            }
            else if($image_type != 'image/jpg' and $image_type != 'image/png' and $image_type != 'image/jpeg') {
                $match_err = "Either you have not selected an image file or the image format is invalid (Please upload the image in jpg, jpeg or png format).";
            }

            else{
                // 'uploadedImages' is the folder name. Images will be moved to this folder after being uploaded.
                move_uploaded_file($image_tmp, "uploadedImages/$image");
                

                /* plant_detail is the table name. cname, bname etc are the fields in this table. $cname, $bname etc are the variable names. */
                $sql = "insert into plant_detail(cname, bname, genus, family, species, description, image) values('$cname' , '$bname' , '$genus' , '$family' , '$species' , '$description' , '$image')";

                $run = mysqli_query($conn , $sql);
                if($run){
                    $success = "Data submitted successfully.";
                }

                else{
                    $error = "Unable to submit data. Please try again.";
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

    <!-- Online TinyMCE code - For giving text editor functionalities(like making text bold, italic etc) to the TextAreas. -->
    <!--  e0zply1ukkupxqtlfo4ou0klgq0tes8dnhgkhr0ex11saucg    : This is the Tiny API key generated from TinyMCE site. -->
    <!-- <script src="https://cdn.tiny.cloud/1/e0zply1ukkupxqtlfo4ou0klgq0tes8dnhgkhr0ex11saucg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  -->
    <!-- Adding a TinyMCE text editor to the textareas. -->
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


    <!-- 'Font Awesome' icons - Copy the link from w3schools.com -->
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
              

            <!-- Code for main form/screen -->
            <section id="main-form">
			
                <!-- For displaying error messages (related to images) .-->
                <p class="text-center text-danger font-weight-bold"><?php echo @$size_error; echo @$match_err ?> </p>

                <!-- For displaying error and success messages. -->
                <h3 class="text-center text-danger font-weight-bold"><?php echo @$success; echo @$error?> </h3>

    
            
                <h2 class="text-center text-success font-weight-bold pb-3">Flora-Pedia</h2>

                <div class="container bg-success pt-2 mb-1 pb-3" id="formsetting">
                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Add Plant Details</h3>

                    <!-- enctype='multipart/form-data is an encoding type that allows files to be sent through a POST. Quite simply, without this encoding the files cannot be sent through POST.
                    If you want to allow a user to upload a file via a form, you must use this enctype. -->
                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="row">

                            <!--grid system is 12 units long, we will use 1 unit of length 7(for large and medium devices), and spare the rest of the units left for better padding-->
                            <!-- m-auto will bring the div to center -->
                                                          


                            <div class="col-md-7 col-sm-7 col-12 m-auto">
                            

                                <div class="form-group">
                                    <label class="text-white">Common Name</label>
                                    <input type="text" name="cname" placeholder="Enter the common name of the plant" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Botanical Name</label>
                                    <input type="text" name="bname" placeholder="Enter the botanical name of the plant" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Genus</label>
                                    <input type="text" name="genus" placeholder="Enter the Genus of the plant" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Family</label>
                                    <input type="text" name="family" placeholder="Enter the family of the plant" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="text-white">Species</label>
                                    <input type="text" name="species" placeholder="Enter the specie of the plant" class="form-control">
                                </div>
								
								<div class="form-group">
                                    <label class="text-white">Plant Description</label>
                                    <!-- Do not leave a space at the closing </textarea> tag. Otherwise, the placeholder will not appear. -->
									<textarea style="height:150px;" name="description" class="form-control" placeholder="Write the plant description"></textarea>
								</div>


                                <!-- Inserting an image into the database.-->
                                <div class="input-group pt-4">
                                    <label class="text-white pt-1 pr-1">Image</label> 
                                    <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div> 
                                         
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose File
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
								
								

                                <input type="submit" name="submit" value="Add Details" class="btn btn-danger px-5 mt-4 mx-auto">
								
								

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
</script>




