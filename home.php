<?php

include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Shop</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- Header File -->
    <?php include 'header.php';?>

    <section class="phones" id="phones">
        <h1 class="heading">Popular <span>Smart Phones</span></h1>
        <div class="swiper phones-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <img src="uploaded_img/iphone14_128.jpg">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"><span>price: </span>Rs.289900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="#" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/iphone14_128.jpg">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"><span>price: <span>Rs.289900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="#" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/iphone14_128.jpg">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"><span>price: <span>Rs.289900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="#" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/iphone14_128.jpg">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"><span>price: <span>Rs.289900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="#" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/iphone14_128.jpg">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"><span>price: <span>Rs.289900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="#" class="btn">check out</a>


                        </p>
                    </div>   
                </div>

                <div class="swiper-slide box">
                    <img src="uploaded_img/iphone14_128.jpg">
                    <div class="content">
                        <h3>new model</h3>
                        <div class="price"><span>price: <span>Rs.289900/-</div>
                        <p>128GB 4GB</p> 
                        <a href="#" class="btn">check out</a>


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
                <a href="#" class="slide">
                    <img src="images/samsung.png">
                    <h3>Samsung</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/apple.png">
                    <h3>Apple</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/huawei.png">
                    <h3>Huawei</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/xiaomi.png">
                    <h3>Xiaomi</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/nokia.jpeg">
                    <h3>Nokia</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/oppo.jpg">
                    <h3>Oppo</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/oneplus.png">
                    <h3>OnePlus</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/vivo.svg">
                    <h3>Vivo</h3>
                </a> 
                <a href="#" class="slide">
                    <img src="images/google.png">
                    <h3>Google</h3>
                </a> 
                
            </div>
        </div>
    </section>

    <section class="products">
        <h1 class="title">Latest Products</h1>
        <div class="box-container">
            <?php
                $select_products=mysqli_query($conn,"SELECT * FROM `products`") or die('query failed');
                if(mysqli_num_rows($select_products)>0){
                    while($fetch_products=mysqli_fetch_assoc($select_products)){
            ?>
            <form action="" method="POST" class="box">
                <a href="view_page.php?pid=<?php echo $fetch_products['id'];?>" class=""></a>
                <div class="price">Rs.<?php echo $fetch_products['price'];?>/-</div>
                <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" value="add to wishlist"  name="add_to_wishlist" class="option-btn">
                <input type="submit" value="add to cart"  name="add_to_cart" class="btn">

            </form>
            <?php
                }
            }else{
                echo '<p class="empty">no products addeed yet!</p>';
    
            }
            ?>
        </div>

    </section>

    

    <!-- Footer File -->
    <?php include 'footer.php'?>

    <!-- JavaScript File -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>