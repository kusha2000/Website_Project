<?php

include 'config.php';
session_start();

$user_id=$_SESSION['user_id'];

if(isset($_POST['add_to_wishlist'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    

    $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

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

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{

        $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_wishlist_numbers) > 0){
            mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        }

        mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Shop</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/font-awesome.min.css">


    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- Header File -->
    <?php include 'header.php';?>

    <!-- <section class="heading">
    <h3>Popular Smart Phones</h3>
    </section> -->

    

    <section class="containers hero row">
        <div class="content">

            <div class="text-box">
                <h1>PhoneX</h1>
            </div>
            <p>Smart range of collections</p>
            <a href="shop.php" class="btn-card btn-success-card hero-btn">Shop Now</a>

        </div>
        <div class="img">
            <img src="images/hero.png" alt="">

        </div>
    </section>

    <section class="headings">
    <h3 data-text="Latest Products">Latest_Products</h3>
    </section>

    

    <section class="phones" id="phones">
        <div class="swiper phones-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <img src="uploaded_img/iphone14_128.png">
                    <div class="content">
                        <h3>Iphone 14</h3>
                        <div class="price"><span>price: </span>Rs.289900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="view_page.php?pid=" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/samsungs22.png">
                    <div class="content">
                        <h3>Samsung s22</h3>
                        <div class="price"><span>price: </span>Rs.329000/-</div>
                        <p>256GB 6GB</p> 
                        <a href="view_page.php?pid=" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/Google_Pixel_7_Pro.png">
                    <div class="content">
                        <h3>Pixel 7 pro</h3>
                        <div class="price"><span>price: </span>Rs.229900/-</div>
                        <p>512GB 4GB</p> 
                        <a href="view_page.php?pid=" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/redmi_note12.png">
                    <div class="content">
                        <h3>Redmi Note 12</h3>
                        <div class="price"><span>price: </span>Rs.198900/-</div>
                        <p>256GB 6GB</p> 
                        <a href="view_page.php?pid=" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/huawei_nova8i.png">
                    <div class="content">
                        <h3>Nova 8i</h3>
                        <div class="price"><span>price: </span>Rs.209900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="view_page.php?pid=" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/Vivo_V25_Pro.png">
                    <div class="content">
                        <h3>Vivo v25 Pro</h3>
                        <div class="price"><span>price: </span>Rs.259900/-</div>
                        <p>1TB 6GB</p> 
                        <a href="view_page.php?pid=" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

            </div>

            <div class="swiper-pagination"></div>
        </div>

    </section>


    <section class="category">
        <div class="slider">
            <div class="line">
                <a href="search_page.php?searching=samsung" class="slide">
                    <img src="images/samsung.png">
                    <h3>Samsung</h3>
                </a> 
                <a href="search_page.php?searching=apple" class="slide">
                    <img src="images/apple.png">
                    <h3>Apple</h3>
                </a> 
                <a href="search_page.php?searching=huawei" class="slide">
                    <img src="images/huawei.png">
                    <h3>Huawei</h3>
                </a> 
                <a href="search_page.php?searching=xiaomi" class="slide">
                    <img src="images/xiaomi.png">
                    <h3>Xiaomi</h3>
                </a> 
                <a href="search_page.php?searching=nokia" class="slide">
                    <img src="images/nokia.jpeg">
                    <h3>Nokia</h3>
                </a> 
                <a href="search_page.php?searching=oppo" class="slide">
                    <img src="images/oppo.jpg">
                    <h3>Oppo</h3>
                </a> 
                <a href="search_page.php?searching=oneplus" class="slide">
                    <img src="images/oneplus.png">
                    <h3>OnePlus</h3>
                </a> 
                <a href="search_page.php?searching=vivo" class="slide">
                    <img src="images/vivo.svg">
                    <h3>Vivo</h3>
                </a> 
                <a href="search_page.php?searching=google" class="slide">
                    <img src="images/google.png">
                    <h3>Google</h3>
                </a> 
                
            </div>
        </div>
    </section>

    <!-- <section class="heading">
    <h3>Latest Products</h3>
    </section> -->

    <section class="headings">
    <h3 data-text="Popular Smart Phones">Popular_SmartPhones</h3>
    </section>
    

    <section class="slider-card">
           
        <?php
            $select_products=mysqli_query($conn,"SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_products)>0){
                while($fetch_products=mysqli_fetch_assoc($select_products)){
            ?>
            <form action="" method="POST" class="card">
            <div class="card-content">
                <span class="category-value"><?php echo $fetch_products['category']; ?></span>
                <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="card-img">
                <h1 class="card-title"><a href="view_page.php?pid=<?php echo $fetch_products['id'];?>"><?php echo $fetch_products['name']; ?></a></h1>
                <p class="card-title">Rs.<?php echo $fetch_products['price'];?></p>
                    
                <div class="card-footer">
                    <input type="submit" value="Add To Wishlist"  name="add_to_wishlist" class="btn-card btn-success-card">
                    <input type="submit" value="Add To Cart"  name="add_to_cart" class="btn-card btn-border-card add-to-cart">

                </div>
                        
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

            </div>
            </form>
            <?php
                }
            }else{
                echo '<p class="empty">no products addeed yet!</p>';
            
            }
        ?>
         
    </section>


    <!-- <section>
        <div class="card">
            <div class="card-content">
                <span class="category-value">Apple</span>
                <img src="uploaded_img/Apple-iPhone-12-Pro.png" alt="" class="card-img">
                <h1 class="card-title">Apple iPhone 14 128GB 4GB Ram E Sim</h1>
                <p class="card-title">Rs.2349000</p>
                            
                <div class="card-footer">
                    <button class="btn-card btn-success-card">Add To Wishlist</button>
                    <button class="btn-card btn-border-card add-to-cart">Add To Cart</button>
                    !--<input type="submit" value="Add To Wishlist"  name="add_to_wishlist" class="btn-card btn-success-card">
                    <input type="submit" value="Add To Cart"  name="add_to_cart" class="btn-card btn-border-card add-to-cart">--!
                </div> 
            </div>  
        </div>                  
    <section> -->
    

    <!-- Footer File -->
    <?php include 'footer.php'?>

    <!-- JavaScript File -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>