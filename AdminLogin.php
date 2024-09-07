<?php
    if(isset($_SESSION)){
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="https://w7.pngwing.com/pngs/339/876/png-transparent-login-computer-icons-password-login-black-symbol-subscription-business-model-thumbnail.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="adminLogin.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <header>
                <h3>Login</h3>
            </header>
            <div class="loginBody">
                <form action="adminCheck.php" method="post">
                    <i class="fas fa-user"></i>
                    <input type="text" id="uname" name="name" placeholder="Username" required> <br>
                    <i class="fas fa-lock"></i>
                    <input type="password" id="upass" name="pass" placeholder="Password" required>
                    <input type="submit" value="Login">
                </form>
                <footer>
                    <a href="UserLogin.php" > User Login Page</a> <br>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>