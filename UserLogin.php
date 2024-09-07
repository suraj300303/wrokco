<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="userlogin.css">
    <link rel="shortcut icon" href="images/user.png" type="image/x-icon">
    <script src="script.js"></script>
</head>

<body onload="setDate()" >
    <div class="full-page">
        <header>
            <h3>Welcome to Railway Reservation System</h3>
        </header>
        <div id='login-form' class='login-page' >
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button' onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button' onclick='register()'class='toggle-btn'>Register</button>
                </div>
                <form id='login' class='input-group-login' action="Login.php" method="POST">
                    <input type='text'class='input-field' placeholder='Email' name="email" required >
                    <input type='password' class='input-field' placeholder='Enter Password' name="password" required>
                    <input type='checkbox'  class='check-box' ><span>Remember Password</span>
                    <button type='submit'class='submit-btn'>Log in</button>
                    <footer>
                        <a href="AdminLogin.php" style="font-weight: bold;">Admin Login</a>
                        <a href="/" style="font-weight: bold;">forget password</a>
                    </footer>
		        </form>
                <form id='register' class='input-group-register'>
                    <input type='text' class='input-field' placeholder='Name' name="name" id="name" onkeypress="return onlyLetter(event)" required>
                    <input type='text' class='input-field' placeholder='Username' name="uname" id="uname" onkeypress="onlyLetter(event)"  required>
                    <input type='email' class='input-field' placeholder='Email Id' name="email" id="email" required>
                    <input type='date' class='input-field' name="date" id="date" required>
                    <input type='text' class='input-field' placeholder='Address' name="address" id="address"  required>
                    <input type='password' class='input-field' placeholder='Enter Password' name="password" id="password" required>
                    <input type='password' class='input-field' placeholder='Confirm Password' name="cpassword" id="cpassword" required>
                    <input type='checkbox' class='check-box' required><span>I agree to the terms and conditions</span>
                    <input type='submit' onclick="return validate()" onsubmit="alert('Registration Successful')" class='submit-btn'>
                </form>
            </div>
        </div>
    </div>
	
    <script>
       	var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register(){
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login(){
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
        function setDate(){
            let today = new Date();
            let d = today.getDate().toString();
            let m = (today.getMonth()+1).toString();
            let y = today.getFullYear()-14;
            if(parseInt(d) < 10)
                d = '0'+d;
            if(parseInt(m)<10)
                m = '0'+m;
            const max_date = y+'-'+m+'-'+d;
            document.getElementById('date').max = max_date;
        }
        function validate(){
            var invalid = false;
        	var name = document.getElementById('name');
        	var uname = document.getElementById('uname');
        	var email = document.getElementById('email');
        	var pass = document.getElementById('password');
            var cpass = document.getElementById('cpassword');
        	var addr = document.getElementById('address');
        	if(pass.value != cpass.value || (pass.value == cpass.value && pass.value.length < 3)){
        		document.getElementById('password').style.border = "1px solid red";
        		document.getElementById('cpassword').style.border = "1px solid red";
                alert('check Password Fields');
                invalid = true;
        	}else{
                invalid = false;
                document.getElementById('password').style.border = "1px solid green";
        		document.getElementById('cpassword').style.border = "1px solid green";
            }
            if(invalid==false){
                document.getElementById('register').action = "registration.php";
                document.getElementById('register').method = "POST";
            }
            return true;
        }
	</script>
</body>
</html>