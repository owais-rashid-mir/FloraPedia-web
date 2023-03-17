<?php
    //Connecting MySql database with our PHP file.
    
    // 'root' is the default username, password is empty by default, 'botany_db' is the name of the database.
    // If you are using the default port(3306), then : $conn = mysqli_connect("localhost" , "root" , "", "botany_db");
    // If you are using some another port(like here in my case - 3308), then : $conn = mysqli_connect("localhost:3308" , "root" , "", "botany_db");
    $conn = mysqli_connect("localhost" , "root" , "", "botany_db");
    $sql = "SELECT *FROM plant_detail ORDER BY cname";    //ORDER BY cname - for arranging data alphabetically (acc. to Common Name)
    $result = mysqli_query($conn , $sql);
    $json_array = array();
    while($row=mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }
        $json = json_encode($json_array);
        
        
?>


<script>
    var plants= <?= $json?>;
    
</script>