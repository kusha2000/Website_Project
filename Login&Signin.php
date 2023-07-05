<?php

include 'config.php';

session_start();

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn, $_POST['lemail']);
    $password = mysqli_real_escape_string($conn, $_POST['lpass']);

  
    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password='$password'") or die('query failed');
  
    if(mysqli_num_rows($select_user) > 0){
        $message[] = 'Login successfully!';
        header('location:home.php');
    }else{
       
        $message[] = 'incorrect email or password!';
    }
  
  }
  if(isset($_POST['register'])){

    $fname = mysqli_real_escape_string($conn, $_POST['rfname']);
    $lname = mysqli_real_escape_string($conn, $_POST['rlname']);
    $remail = mysqli_real_escape_string($conn, $_POST['remail']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['rpass']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['rcpass']));


 
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$remail'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
       $message[] = 'user already exist!';
    }else{
       if($pass != $cpass){
          $message[] = 'confirm password not matched!';
       }else{
          $insert_product=mysqli_query($conn, "INSERT INTO `users`(first_name,last_name,email,password) VALUES('$fname','$lname','$remail','$pass')") or die(mysqli_error($conn));
          $message[] = 'registered successfully!';
          header('location:home.php');
       }
    }
 
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Sign in </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!---we had linked our css file----->
</head>
<body>
    <!-- Header File -->

    <?php include 'header.php';?>
    <div class="full-page">
        
        
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
                </div>
                <form id='login' class='input-group-login' method="POST">
                    <input type='text'class='input-field'placeholder='Email Id' name="lemail" required >
		    <input type='password'class='input-field'placeholder='Enter Password' name="lpass" required>
		    <input type='checkbox'class='check-box'><span>Remember Password</span>
		    <button type='submit'class='submit-btn' name="login">Log in</button>
		 </form>
		 <form id='register' class='input-group-register' method="POST">
		     <input type='text'class='input-field' placeholder='First Name' name="rfname" required>
		     <input type='text'class='input-field' placeholder='Last Name ' name="rlname" required>
		     <input type='email'class='input-field' placeholder='Email Id' name="remail" required>
		     <input type='password'class='input-field' placeholder='Enter Password' name="rpass" required>
		     <input type='password'class='input-field' placeholder='Confirm Password' name="rcpass"  required>
		     <input type='checkbox'class='check-box'><span>I agree to the terms and conditions</span>
                    <button type='submit'class='submit-btn' name="register">Register</button>
	         </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>

    

    
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
	
    <script src="js/script.js"></script>
    
</body>
</html>