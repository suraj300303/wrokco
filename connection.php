<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "rrs";
    $conn = mysqli_connect($host,$user,$pass,$dbName);

    if(mysqli_connect_error()){
        echo "<script>alert('Database connection failed')</script>";
        die();
    }
?>