<?php
    require('connection.php');
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $addr = $_POST['address'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $dob = $_POST['date'];
    
    $query = "insert into user(name,username,email,address,dob,password) values('$name','$uname','$email','$addr','$dob','$pass');";

    try{
        if(mysqli_query($conn,$query)){
            echo "<script>alert('Registration Successful (Note: Go to Login Page)')
            location.href = 'UserLogin.php'</script>";
        }
    }catch(mysqli_sql_exception $e){
        if ($e->getCode() == 1062) { 
            echo "<script>alert('Email already registered. (Note: One Email-> One Account)');location.href = 'UserLogin.php'</script>";
            die();
        } else {
            echo "Database error: " . $e->getMessage();
        }
    }
    finally{
        mysqli_close($conn);
    }
?>