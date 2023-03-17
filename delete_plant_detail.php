<?php
session_start();    //Starting Session.

    //Connecting with database.
    include 'dbconnect.php';

    $_SESSION['delete']=1;

    //If user is trying to access this page by NOT providing an email(or by bypassing the login system), we will restrict the access and provide a message.
    if(!$_SESSION['email']) {
        $_SESSION['login_first'] = "Please login first.";

        //when user fails to get unrestricted access, he will be redirected to the login page(index.php).
        header('Location:index.php');
    }


    
    if(isset($_GET['delete_plant'])) {     //delete_plant is a variable name defined in editPlant.php

        $delete = $_GET['delete_plant'];


        //For deleting the picture from file directory after it is deleted from the database.
		$query = "select * from plant_detail where id='$delete' ";
		$rs = mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($rs)) {
			$image = $row['image'];
			
		}
		unlink('uploadedImages/'.$image);

        
         $sql = "delete from plant_detail where id = '$delete' " ;
         $run = mysqli_query($conn , $sql);

         if($run){
             // _self : Window opens in the same tab.
             echo "<script>window.open('editPlant.php' , '_self') </script>";
         }

    }

?>