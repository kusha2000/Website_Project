<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// };



if(isset($_POST['order'])){

    // $select_user_details = mysqli_query($conn, "SELECT * FROM `users` WHERE id='$user_id' ") or die('query failed');
    // $fetch_user_details = mysqli_fetch_assoc($select_user_details);
    // $user_id = $_SESSION['user_id'];

    

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn,$_POST['add1'].', '. $_POST['add2'].', '. $_POST['state'].', '. $_POST['city']);
    $amount=$_GET['amount'];
    $placed_on = date('d-M-Y');


    $cart_products = 0;

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed-28');
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products +=1;

        }
    }


    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$cart_products' AND total_price = '$amount'") or die('query failed-45');

    if($amount == 0){
        $message[] = 'your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        $message[] = 'order placed already!';
      
    }else{

        
        mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on,payment_status) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$cart_products','$amount', '$placed_on','pending')") or die(mysqli_error($conn));

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


</head>
<body>
   
<?php @include 'header.php'; ?>





<section class="checkout" id="checkout">

    <form action="" method="POST">
        
        <h3>Place your Order</h3>
        <?php
            
            $select_user_details = mysqli_query($conn, "SELECT * FROM `users` WHERE id='$user_id' ") or die('query failed');
            $fetch_user_details = mysqli_fetch_assoc($select_user_details);
        ?>
        <div class="flex">
            <span class="big-circle"></span>
            <span class="circle one"></span>
            <span class="circle two"></span>

            <div class="input-container">
                <input type="text" name="name" class="input" />
                <label for="">Name</label>
                <span>Name</span>
            </div>
            <div class="input-container">
                <input type="text" name="email" class="input" />
                <label for="">Email</label>
                <span>Email</span>
            </div>
            <div class="input-container">
                <input type="text" name="number" class="input" />
                <label for="">Tel No</label>
                <span>Tel No</span>
            </div>

            <div class="input-container">
                <label for="">Payment Method </label>
                <span>Payment Method </span>
                <select name="method" class="input">
                    <option value=""></option>
                    <option value="cash_on">Cash on delivery</option>
                    <option value="credit card">Credit Card</option>
                    <option value="paypal">Paypal</option>
                    <option value="paytm">Paytm</option>
                </select>
            </div>

            <div class="input-container">
                <input type="text" name="add1" class="input" />
                <label for="">Address Line 01</label>
                <span>Address Line 01</span>
            </div>
            <div class="input-container">
                <input type="text" name="add2" class="input" />
                <label for="">Address Line 02</label>
                <span>Address Line 02</span>
            </div>
            <div class="input-container">
                <input type="text" name="state" class="input" />
                <label for="">State</label>
                <span>State</span>
            </div>
            <div class="input-container">
                <input type="text" name="city" class="input" />
                <label for="">City</label>
                <span>City</span>
            </div>

            
        </div>
        <br>

        <input type="submit" name="order" value="Order Now" class="btn">
        

    </form>
    

</section>
<!-- <button type="button" onclick="openPopup()">submit</button> -->

<div class="popup" id="popup">
    <img src="images/tick.png">
    <h2>Thank You!</h2>
    <p>Your order has been successfully submitted. Thanks!</p>
    <button type="button" onclick="closePopup()">OK</button>
</div>




<script>
let popup=document.getElementById("popup");

function openPopup(){
 popup.classList.add("open-popup")
}
function closePopup(){
 popup.classList.remove("open-popup");
 
}
</script>



<?php @include 'footer.php'; ?>

<script src="js/contact_app.js"></script>

<script src="js/script.js"></>


</body>
</html>