<!-- 46 Write scritpt using mysqli_connect function. -->

<?php
    $server="localhost";
    $password="";

    $conn = mysqli_connect($server, $username, $password);

    $sql= "CREATE DATABASE Shyam1";
    mysqli_query($conn,$sql);


    if($conn){
        echo "connection secured";
    }else{
    die("sorry we failed to connect".mysqli_connect_error());
    }  


    ?>
