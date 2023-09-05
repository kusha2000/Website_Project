<?php

include 'config.php';

//if(!isset($_SESSION['user_id'])){
  //     //header('location:login.php');
  //  }else{
  //     $user_id = $_SESSION['user_id'];
  //  }

session_start();
  

$user_id=$_SESSION['user_id'];

if(isset($_POST['send'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $number = mysqli_real_escape_string($conn, $_POST['phone']);
  $msg = mysqli_real_escape_string($conn, $_POST['message']);

  $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND phone = '$number' AND message = '$msg'") or die('query failed');

  if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
  }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, phone, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
  }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>

    
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/contact_style.css" />

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
     <!-- Header File -->
     <?php include 'header.php';?>

    <div class="container">
      <span class="big-circle"></span>
      
      <img src="images/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            We're here to help and answer any question you might have. We look forward to hearing from you
          </p>

          <div class="info">
            <div class="information">
              <img src="images/location.png" class="icon" alt="" />
              <p><br>351 R. A. De Mel Mawatha,<br> Colombo <br>00300</p>
            </div>
            <div class="information">
              <img src="images/email.png" class="icon" alt="" />
              <p>grproject@gmail.com</p>
            </div>
            <div class="information">
              <img src="images/phones.png" class="icon" alt="" />
              <p>0761234567</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" method="POST" >
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input" name="message"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" name="send" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <!-- Footer File -->
    <?php include 'footer.php'?>

    <script src="js/contact_app.js"></script>
  </body>
</html>