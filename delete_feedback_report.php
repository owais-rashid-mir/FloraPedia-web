<?php
session_start();    //Starting Session.

    //Connecting with database.
    include 'dbconnect.php';

    $_SESSION['delfed']=1;      // delfed : Delete feedback.

    //If user is trying to access this page by NOT providing an email(or by bypassing the login system), we will restrict the access and provide a message.
    if(!$_SESSION['email']) {
        $_SESSION['login_first'] = "Please login first.";

        //when user fails to get unrestricted access, he will be redirected to the login page(index.php).
        header('Location:index.php');
    }


    //del_fb_rep : Delete feedback/report.
    if(isset($_GET['del_fb_rep'])) {     //del_fb_rep is a variable name defined in viewFeedbackAndReport.php

        $delete = $_GET['del_fb_rep'];


        //For deleting the picture from file directory after it is deleted from the database.
		//$query = "select * from plant_detail where id='$delete' ";
		

        
         $sql = "delete from feedback_and_report where id = '$delete' " ;
         $run = mysqli_query($conn , $sql);

         if($run){
             // _self : Window opens in the same tab.
             echo "<script>window.open('viewFeedbackAndReport.php' , '_self') </script>";
         }

    }

?>


<script>
	//Solution - messages remains on the page even after reloading the page.
	if(window.history.replaceState) {
		window.history.replaceState(null ,null, window.location.href);
	}
</script>