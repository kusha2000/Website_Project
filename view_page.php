<?php

include 'config.php';

session_start();

$user_id=$_SESSION['user_id'];

if(isset($_GET['pid'])){
    $phone_id = $_GET['pid'];
}

if(isset($_POST['add_to_wishlist'])){

    $product_id = $phone_id ;
    

    

    $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE pid = '$product_id' AND user_id = '$user_id'") or die('query failed');

    $product_details = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('query failed');
    $fetch_product=mysqli_fetch_assoc($product_details);
    $product_name = $fetch_product['name'];;
    $product_price = $fetch_product['price'];;
    $product_image = $fetch_product['image'];;
    

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE pid = '$product_id' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_wishlist_numbers) > 0){
        $message[] = 'already added to wishlist';
    }elseif(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
        $message[] = 'product added to wishlist';
    }

}

if(isset($_POST['add_to_cart'])){

    $product_id = $phone_id;

    $product_quantity = $_POST['quantity'];;

  

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE pid = '$product_id' AND user_id = '$user_id'") or die('query failed');

    $product_details = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('query failed');
    $fetch_product=mysqli_fetch_assoc($product_details);
    $product_name = $fetch_product['name'];;
    $product_price = $fetch_product['price'];;
    $product_image = $fetch_product['image'];;

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{

        $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_wishlist_numbers) > 0){
            mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        }

        mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        //$message[] = 'product added to cart';
        include 'cart.php';
    }
    

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css" class="css">
    <link href="https://fonts.googleapis.com/family=poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>Product Details</title>
</head>
<body>

<!-- Header File -->
<?php include 'header.php';?>

        <?php
            $select_product=mysqli_query($conn,"SELECT * FROM `products` WHERE id='$phone_id' ") or die('query failed');
            $fetch_products=mysqli_fetch_assoc($select_product);
        ?>


<div class="small-container single-product" >
    <div class="row">
        <div class="col-2">
            <img src="uploaded_img\<?php echo $fetch_products['image']; ?>" width="700px" height="auto" id="ProductImg">
            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="uploaded_img\<?php echo $fetch_products['image']; ?>" width="200px" height="auto" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="uploaded_img\<?php echo $fetch_products['image1']; ?>" width="200px" height="auto"   class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="uploaded_img\<?php echo $fetch_products['image2']; ?>" width="200px" height="auto"  class="small-img">
                </div>
            </div>
        </div>

        <div class="col-2">
            <p>Home / <?php echo $fetch_products['category']; ?> / <?php echo $fetch_products['mini_name']; ?>  </p>
            <h1><?php echo $fetch_products['name']; ?><br></h1>
            <br>
            <div class="price">
                <div class="old-price"><span>Rs.<?php echo $fetch_products['old_price']; ?></span></div>
                <div class="new-price"><span>Price- Rs.<?php echo $fetch_products['price']; ?><br></span></div>
            </div>
            
            <div class="Product-rating">
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star-half"></span>
                <span>__4.7(21)</span>
            </div>
            <br>

            <form action="" method="POST">
                <select>
                    <option>Select Colour</option>
                    <option>Midnight</option>
                    <option>Starlight</option>
                    <option>(PRODUCT)RED</option>
                    <option>Blue</option>
                    <option>Purple</option>
                    <option>Yellow</option>
                </select>
                <div class="col-2">
                    <img src="uploaded_img\<?php echo $fetch_products['image_col']; ?>" width="400px" height="auto" id="ProductImg">
                </div> 
        
                <input type="number" value="1" class="inpu" name="quantity">
                <input type="hidden" name="pid" value="<?php echo $fetch_products['id']; ?>">
                <input type="submit" value="Add To Wishlist"  name="add_to_wishlist" class="btn-card btn-border-card add-to-cart" style="font-size:1.7rem;padding-right:14rem;">
                <input type="submit" value="Add To Cart"  name="add_to_cart" class=" btn-card btn-success-card" style="font-size:1.7rem;margin-left:1rem;padding-right:11rem;">

            </form>
            
        
        </div>
        <!-- Test -->

       
        <div class="col-3">
            <h3>Product Details <i class="fa fa-indent"></i> </i> 
            </h3>
            <br>
            <h4>Size and Weight  </i> </h4>
            <?php echo $fetch_products['size_text']; ?><br>
            
                            
            <h4>Display Resolution </i> </h4>
                         
                        <?php echo $fetch_products['display_text']; ?>
                    <h4>Chip  </i></h4>
                    <div class="col-2">
                        <img src="uploaded_img\<?php echo $fetch_products['chip_image']; ?>" width="300px" height="300px" id="ProductImg">
                    </div>    
                        <?php echo $fetch_products['chip_text']; ?>
                        <h4>Camera  </i></h4>              
                        <?php echo $fetch_products['camera_text']; ?>
                        <h4>USB_Type </i></h4> 
                        <?php echo $fetch_products['usb_text']; ?>
                        
                        <h4> Ram and Rom </i></h4> 
                        <?php echo $fetch_products['ram_text']; ?>
                        
                        <h4> External Buttons and Connectors </i></h4>  
                        <div class="col-2">
                            <img src="uploaded_img\<?php echo $fetch_products['btn_image']; ?>" width="500px" height="500px" id="ProductImg">
                        </div> 
                        <br>
                        <br>
                        <h4> Sim </i></h4> 
                        <?php echo $fetch_products['sim_text']; ?>
                        <h4> Sensors </i></h4> 
                        <?php echo $fetch_products['sensor_text']; ?>
                        <h4> Operating System </i></h4> 
                        <?php echo $fetch_products['os_text']; ?>
                        <h4> Battery </i></h4> 
                        <?php echo $fetch_products['battery_text']; ?>
                        <h4> In the Box </i></h4>                
                        <?php echo $fetch_products['box_text']; ?>
                        <div class="col-2">
                            <img src="uploaded_img\<?php echo $fetch_products['box_image']; ?>" width="300px" height="300px" id="ProductImg">
                        </div> 
            

        </div>

        <!-- Test finish -->


    
    </div>
</div>


    <!-- Footer File -->
    <?php include 'footer.php'?>

    <!-- JavaScript File -->
    <script src="js/script.js"></script>


<script>
    var ProductImg = document.getElementById("ProductImg");
    var smallimg = document.getElementsByClassName("small-img");

    smallimg[0].onclick = function()
    {
        ProductImg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function()
    {
        ProductImg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function()
    {
        ProductImg.src = smallimg[2].src;
    }
    
</script>
</body>
</html>