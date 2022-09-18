
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ruet transport management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/BUS.jpg">
    <!---we had linked our css file----->
</head>
<body>

    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (array_key_exists('Login', $_POST)) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) ;

        //adsghdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjg
        //-----------------------------------------------------------------------
        


        // or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['email'] = $email;
            // Redirect to user dashboard page
            header("Location: page.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Email or password.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else if(array_key_exists('Register', $_POST)){
        $first_name    = stripslashes($_REQUEST['first_name']);
        $first_name    = mysqli_real_escape_string($con, $first_name);
        
        $last_name    = stripslashes($_REQUEST['last_name']);
        $last_name    = mysqli_real_escape_string($con, $last_name);

        $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
        $email = mysqli_real_escape_string($con, $email);

      


        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        
        $confirm_password = stripslashes($_REQUEST['password']);
        $confirm_password= mysqli_real_escape_string($con, $confirm_password);  


        $create_datetime = date("Y-m-d H:i:s");


         if ($_POST["password"] === $_POST["confirm_password"]) {
             // success!
             $query    = "INSERT into `users` (first_name,last_name, password,email, create_datetime)
                     VALUES ('$first_name','$last_name', '" . md5($password) . "','$email', '$create_datetime')";
        
        $result   = mysqli_query($con, $query);
        if ($result) {
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>registration</a> again.</p>
                  </div>";
        }
          }
          else {
             echo "<div class='form'>
             <h3>Password and confirm Password are not same.</h3><br/>
             <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
             </div>";

          }




        
    }
    
    
    else {
?>
     <div class="full-page">
        <div class="navbar">
            <div>
                <!---a href='website.html'>Ruet Transfort System</a--->
                <h1 style="color:white;">Ruet Transport System</h1>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='home.php'><i class="fa-solid fa-house-chimney "></i>Home</a></li>
                    <li><a href='AboutUs.php'><i class="fa fa-user "></i>About Us</a></li>
                    <li><a href='#'><i class="fa fa-clone "></i>Services</a></li>
                    <li><a href='contact.php'><i class="fa fa-phone "></i>Contact</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
                </ul>
            </nav>
        </div>
        
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button' value="Login"  onclick='login()'class='toggle-btn'>Login</button>
                    <button type='button' value="Register" onclick='register()'class='toggle-btn'>Register</button>
                </div>

            <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->        



        <form id='login' method="post" name="Login" class='input-group-login'>
            <input type='text' name="email" class='input-field'placeholder='Email Id' required >
		    <input type='password'name="password"  class='input-field'placeholder='Password' required>
		    <input type='checkbox'class='check-box'><span>Remember Password</span>
		    <button type='submit' name="Login"  class='submit-btn'>Login</button>
		    </form>
       



            <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->

            <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->

             
		 <form id='register' method="post" class='input-group-register'>
		     <input type='text' name="first_name" class='input-field'placeholder='First Name' required>
		     <input type='text' name="last_name" class='input-field'placeholder='Last Name ' required>
		     <input type='email' name="email" class='input-field'placeholder='Email Id' required>
		     <input type='password' name="password" class='input-field'placeholder='Password' required>
		     <input type='password' name="confirm_password" class='input-field'placeholder='Confirm Password'  required>
		     <input type='checkbox'class='check-box'><span>I agree to the terms and                                                   conditions</span>
             <button type='submit' name="Register" class='submit-btn'>Register</button>
	         </form>
            </div>
        </div>
    </div>
    <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
             <!---a href='website.html'>Ruet Transfort System</a--->
    
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>

<?php
    }
?>

</body>
</html>
