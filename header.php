<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<header class="header">
    <section class="flex">
        <div class="head">
        <h1>
            <span><a href="home.php">P</a></span>
            <span><a href="home.php">h</a></span>
            <span><a href="home.php">o</a></span>
            <span><a href="home.php">n</a></span>
            <span><a href="home.php">e</a></span>
            <span><a href="home.php">X</a></span>

        </h1>
        </div>
        <!-- <a href="home.php" class="logo"><span>Phone</span></a> -->
        
        <nav class="navbar">
            <a href=home.php>home</a>
            <a href="shop.php">Shop<a>
            <a href="about.php">about</a>
            <a href="contact.php">contact</a>
        </nav>

        <div class="icons">
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn">
            
            
                <img src="images/menu-items.svg">
            </div>
            <a href="search_page.php" class="fas fa-search"></a>
            <?php
                //Fot Testing
                $user_id=1;
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
            <i class="fa-solid fa-moon" id="icon-dark"></i>
        </div>

        <!-- <div class="account-box">
            <?php 
                $my_email=$_SESSION['user_email'];
                $select_profile = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$my_email'") or die('query failed');
                $my_profile = mysqli_fetch_assoc($select_profile);
            ?>
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="" class="option-btn">Edit Profile</a>
            <a href="logout.php" class="delete-btn">logout</a>
            
        </div> -->
        
    </section>
</header>