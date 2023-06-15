<?php

@include 'config.php';

session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// };
$user_id=1;

if(isset($_POST['order'])){

    $select_user_details = mysqli_query($conn, "SELECT * FROM `users` WHERE id='$user_id' ") or die('query failed');
    $fetch_user_details = mysqli_fetch_assoc($select_user_details);
    $user_id = $_SESSION['user_id'];
    $name = $fetch_user_details['name'];
    $number = $fetch_user_details['t_no'];
    $email = $fetch_user_details['email'];
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn,$_POST['flat'].', '. $_POST['street'].', '. $_POST['state'].', '. $_POST['city']);
    $e_date=mysqli_real_escape_string($conn, $_POST['date']);
    $amount=$_POST['amount'];
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products = 0;

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed-28');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $event_product_id=$cart_item['pid'];
            $event_product_pack=$cart_item['event_type'];

            $select_pack_price = mysqli_query($conn, "SELECT * FROM `packages` WHERE product_id='$event_product_id' AND type='$event_product_pack'") or die('query failed-34');
            $fetch_pack_price = mysqli_fetch_assoc($select_pack_price);

            $select_event_planner = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$event_product_id' ") or die('query failed-37');
            $fetch_event_planner = mysqli_fetch_assoc($select_event_planner);
            $planner_id = $fetch_event_planner['planner_id'];

            $cart_products +=1;
            $sub_total = $fetch_pack_price['price'];
            $cart_total += $sub_total;
        }
    }


    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$cart_products' AND total_price = '$cart_total'") or die('query failed-45');

    if($cart_total == 0){
        $message[] = 'your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'order placed already!';
    }else{

        
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address,event_date,participants, total_products, total_price, placed_on,planner_id,pid,package) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address','$e_date','$amount', '$cart_products', '$cart_total', '$placed_on','$planner_id','$event_product_id','$event_product_pack')") or die(mysqli_error($conn));
        //mysqli_query($conn, "INSERT INTO `orders`(name) VALUES('$name')") or die('query failed-52');
        //mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$cart_products', '$cart_total', '$placed_on')") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        $message[] = 'order placed successfully!';
        header('location:thanks.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Confirm and Pay</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact_style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>





<section class="checkout" id="checkout">

    <form action="" method="POST">

        <h3>Place your Order</h3>
        <?php
            //For Testing
            $user_id=1;
            $select_user_details = mysqli_query($conn, "SELECT * FROM `users` WHERE id='$user_id' ") or die('query failed');
            $fetch_user_details = mysqli_fetch_assoc($select_user_details);
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>Name :</span>
                <input type="text" name="name" placeholder="Enter your name" value="<?=$fetch_user_details['name'] ?>" disabled>
            </div>
            <div class="inputBox">
                <span>Tel No :</span>
                <input type="number" name="number" min="0" placeholder="Enter your telephone number">
            </div>
            <div class="inputBox">
                <span>Email :</span>
                <input type="email" name="email" placeholder="Enter your email" value="<?=$fetch_user_details['email'] ?>" disabled>
            </div>
            <div class="inputBox">
                <span>Payment Method :</span>
                <select name="method">
                    <option value="cash_on">Cash on delivery</option>
                    <option value="credit card">Credit Card</option>
                    <option value="paypal">Paypal</option>
                    <option value="paytm">Paytm</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Address Line 01 :</span>
                <input type="text" required name="flat" placeholder="e.g. flat no.">
            </div>
            <div class="inputBox">
                <span>Address Line 02 :</span>
                <input type="text" required name="street" placeholder="e.g.  street name">
            </div>
            <div class="inputBox">
                <span>State :</span>
                <input type="text" required name="state" placeholder="e.g. Kottawa">
            </div>
            <div class="inputBox">
                <span>City :</span>
                <input type="text" required name="city" placeholder="e.g. Colombo">
            </div>
            <div class="inputBox">
                <span>Event Date :</span>
                <input type="date" required name="date" placeholder="Enter your event date">
            </div>
            <div class="inputBox">
                <span>Participants :</span>
                <input type="text" required name="amount" placeholder="Enter the amount of participants">
            </div>
        </div>

        <input type="submit" name="order" value="Order Now" class="btn" >

    </form>

</section>



<div class="container">
      <span class="big-circle"></span>
      
      <img src="images/shape.png" class="square" alt="" />
      <div class="form">

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="index.html" autocomplete="off">
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
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" class="btn" />
          </form>
        </div>
      </div>
    </div>






<?php @include 'footer.php'; ?>

<script src="js/contact_app.js"></script>

<script src="js/script.js"></>


</body>
</html>