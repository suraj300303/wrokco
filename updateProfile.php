<?php
    require('connection.php');
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $addr = $_POST['address'];
    $pass = $_POST['pass'];
    $dob = $_POST['dob'];

    $query = "update user
    SET name = '$name', username= '$uname',email='$email',address='$addr',dob='$dob',password='$pass'
    WHERE email = '$email';";
    
    $goto = "myProfile.php";
    if(mysqli_query($conn,$query)){
        header("Location: $goto");
        echo "<script>alert('Profile Updated(Note: Keep in mind)');</script>";
    }
?>