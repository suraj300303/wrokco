<?php
    require('connection.php');
    $email = $_POST['email'];
    $pass = $_POST['password'];
    session_start();
    $query = "select password from user where email='$email'";
    
    $result = mysqli_query($conn,$query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['password']===$pass){
            $_SESSION['email'] = $email;
            header("Location: UserHome.php");
            echo "<script>alert('Login Successful: $email')</script>";
        }else{
            echo "<script>alert('Invalid Credentials (Note: check password)')
            location.href = 'UserLogin.php'</script>";
            die();
        }
    } else {
        echo "<script>alert('Invalid Credentials (Note: check Email)')
        location.href = 'UserLogin.php'</script>";
        die();
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form >
        <input type="hidden" name="email" value="<?php echo $email ?>">
    </form> 
</body>
</html>