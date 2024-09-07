<?php
    session_start(); 
    require('connection.php');
    if (isset($_SESSION['email'])) { 
        $email = $_SESSION['email'];
        $query = "select * from user where email='$email';";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $uname = $row['username'];
        $addr = $row['address'];
        $email = $row['email'];
        $pass = $row['password']; 
        $dob = $row['dob'];  
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" type="image/x-icon">
    <style>
        .content{
            width: 100%;
            height: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contentBody{
            box-shadow: 3px 3px 3px rgb(81, 83, 216);
            text-align: center;
            width: 40%;
            padding: 10px;
        }
        .input-container{
            width: 100%;
            padding: 0px 3px;
            border-radius: 4px;
            margin-top: 10px;
        }
        label{
            text-align: left;
            display: inline-block;
            width: 100px;
        }
        input,select{
            width: 50%;
            padding: 5px 7px;
            border-radius: 5px;
            font-family: 'poppins';
        }
        #save{
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            background-color: rgb(97, 97, 219);
            color:white;
            font-weight: 600;
        }
        #save:hover{
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="Images/user.png" alt="">
            </div>
            <nav>
                <ul>
                    <li><a href="UserHome.php">Home</a></li>
                    <li><a href="MyBooking.php">My Bookings</a></li>
                    <li><a href="myProfile.php">My Profile</a></li>
                    <li><a href="UserLogin.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <form class="contentBody" method="POST" action="updateProfile.php">
                <div class="input-container">
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="<?php echo $name?>" required>
                </div>
                <div class="input-container">
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?php echo $email?>" required readonly>
                </div>
                <div class="input-container">
                    <label for="gender">Gender: </label>
                    <select id="gender" name="gender">
                        <option value="" disabled >--select gender--</option>
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="dob">DOB: </label>
                    <input type="date" name="dob" min="2008-01-01" value="<?php echo $dob?>" required>
                </div>
                <div class="input-container">
                    <label for="address">Address: </label>
                    <input type="text" name="address" value="<?php echo $addr?>" required>
                </div>
                <div class="input-container">
                    <label for="uname">Username: </label>
                    <input type="text" name="uname" value="<?php echo $uname?>" required readonly>
                </div>
                <div class="input-container">
                    <label for="password">Password: </label>
                    <input type="password" name="pass"  value="<?php echo $pass?>" required readonly>
                </div>
                <div class="input-container">
                <button type="submit" id="save" onclick="alert('Profile Updated')">Save</button></div>
                <span id="msg"></span>
            </div>
        </div>
    </div>
</body>
</html>