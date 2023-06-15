<?php

include 'config.php';

//For Testing
$user_id=1;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>About Us </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
    <!-- Header File -->
    <?php include 'header.php';?>
    
    <section class="about">
      <div class="wrapper">
        <h1> About Us</h1>
        <div class="aboutus">
          <img src="images/hello.png" />
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel nam harum fuga adipisci facilis pariatur reiciendis dicta distinctio, beatae laudantium nemo dolor? Quia, quibusdam ex doloribus illum ipsa earum odio repudiandae eligendi dicta commodi dolores.
            <br />
            <button>Read More..</button>
            
          </p>
        </div>
      </div>
    </section>

    <!-- Footer File -->
    <?php include 'footer.php'?>

    <script src="js/script.js"></script>

  </body>
</html>
