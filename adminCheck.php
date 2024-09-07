<?php
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    if($name === "admin" && $pass==="admin@123"){
        session_start();
        echo "<script>alert('Logging you in');
        location.href = 'AdminHome.php';</script>";
    }else{
        echo "<script>alert('Invalid Credentials');
        location.href = 'AdminLogin.php';</script>";
    }
?>