<?php
session_start();
    session_destroy();

    //After Logout, user will be redirectet to the login page(index.php).
    header('Location:index.php');


?>