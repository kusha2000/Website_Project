<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['logout'])){
   session_start();
   session_unset();
   session_destroy();
   header('location:Login&Signin.php');
};




if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $s_name = mysqli_real_escape_string($conn, $_POST['s_name']);
   $o_price = mysqli_real_escape_string($conn, $_POST['o_price']);
   $n_price = mysqli_real_escape_string($conn, $_POST['n_price']);
   $category = mysqli_real_escape_string($conn, $_POST['category']);
   $size = mysqli_real_escape_string($conn, $_POST['size']);
   $display = mysqli_real_escape_string($conn, $_POST['display']);
   $chip = mysqli_real_escape_string($conn, $_POST['chip']);

   $chip_i_image = $_FILES['chip_i']['name'];
   $chip_i_image_size = $_FILES['chip_i']['size'];
   $chip_i_image_tmp_name = $_FILES['chip_i']['tmp_name'];
   $chip_i_image_folter = 'uploaded_img/'.$chip_i_image;

   $camera = mysqli_real_escape_string($conn, $_POST['camera']);
   $usb = mysqli_real_escape_string($conn, $_POST['usb']);
   $ram = mysqli_real_escape_string($conn, $_POST['ram']);

   $btn_i_image = $_FILES['btn_i']['name'];
   $btn_i_image_size = $_FILES['btn_i']['size'];
   $btn_i_image_tmp_name = $_FILES['btn_i']['tmp_name'];
   $btn_i_image_folter = 'uploaded_img/'.$btn_i_image;


   $sim = mysqli_real_escape_string($conn, $_POST['sim']);
   $sensor = mysqli_real_escape_string($conn, $_POST['sensor']);
   $os = mysqli_real_escape_string($conn, $_POST['os']);
   $battery = mysqli_real_escape_string($conn, $_POST['battery']);
   $box = mysqli_real_escape_string($conn, $_POST['box']);

   

   $box_i_image = $_FILES['box_i']['name'];
   $box_i_image_size = $_FILES['box_i']['size'];
   $box_i_image_tmp_name = $_FILES['box_i']['tmp_name'];
   $box_i_image_folter = 'uploaded_img/'.$box_i_image;

   $m_image_image = $_FILES['m_image']['name'];
   $m_image_image_size = $_FILES['m_image']['size'];
   $m_image_image_tmp_name = $_FILES['m_image']['tmp_name'];
   $m_image_image_folter = 'uploaded_img/'.$m_image_image;

   $image1 = $_FILES['image1']['name'];
   $image1_size = $_FILES['image1']['size'];
   $image1_tmp_name = $_FILES['image1']['tmp_name'];
   $image1_folter = 'uploaded_img/'.$image1;

   $image2 = $_FILES['image2']['name'];
   $image2_size = $_FILES['image2']['size'];
   $image2_tmp_name = $_FILES['image2']['tmp_name'];
   $image2_folter = 'uploaded_img/'.$image2;

   $image_c = $_FILES['c_image']['name'];
   $image_c_size = $_FILES['c_image']['size'];
   $image_c_tmp_name = $_FILES['c_image']['tmp_name'];
   $image_c_folter = 'uploaded_img/'.$image_c;


   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already exist!';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, mini_name, old_price, price,image,category,image1,image2,image_col,size_text,display_text,chip_image,chip_text,camera_text,usb_text,ram_text,btn_image,sim_text,sensor_text,os_text,battery_text,box_text,box_image) VALUES('$name', '$s_name', '$o_price', '$n_price', '$m_image_image ', '$category', '$image1', '$image2', '$image_c', '$size', '$display', '$chip_i_image', '$chip', '$camera', '$usb', '$ram', '$btn_i_image', '$sim', '$sensor', '$os', '$battery', '$box', '$box_i_image')") or die('query failed');

      if($insert_product){
         if($image1_size > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($chip_i_image_tmp_name, $chip_i_image_folter);
            move_uploaded_file($btn_i_image_tmp_name, $btn_i_image_folter);
            move_uploaded_file($box_i_image_tmp_name, $box_i_image_folter);
            move_uploaded_file($m_image_image_tmp_name, $m_image_image_folter);
            move_uploaded_file($image1_tmp_name, $image1_folter);
            move_uploaded_file($image2_tmp_name, $image2_folter);
            move_uploaded_file($image_c_tmp_name, $image_c_folter);
            $message[] = 'product added successfully!';
         }
      }
   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
   mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>
   
<section class="heading">
    <h3>Admin</h3>
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="submit" value="Log Out" name="logout" class="btn">
   </form>
</section>

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>add new product</h3>
      <div class="flex">

         <input type="text" class="box" required placeholder="enter product name" name="name">
         <input type="text" class="box" required placeholder="enter product Small name" name="s_name">
         <input type="number" class="box" required placeholder="enter Old Price" name="o_price">
         <input type="number" min="0" class="box" required placeholder="enter New price" name="n_price">
         
         <input type="text" class="box" required placeholder="Enter Phone size" name="size">
         <input type="text" class="box" required placeholder="Enter Phone Display Details" name="display">
         <input type="text" class="box" required placeholder="Enter Phone Chip Details" name="chip">
         <input type="text" class="box" required placeholder="Enter Phone Camera Details" name="camera">
         <input type="text" class="box" required placeholder="Enter Phone USB Details" name="usb">
         <input type="text" class="box" required placeholder="Enter Phone RAM Details" name="ram">
         <input type="text" class="box" required placeholder="Enter Phone Sim Details" name="sim">
         <input type="text" class="box" required placeholder="Enter Phone Sensor Details" name="sensor">
         <input type="text" class="box" required placeholder="Enter Phone OS Details" name="os">
         <input type="text" class="box" required placeholder="Enter Phone Battery Details" name="battery">
         <input type="text" class="box" required placeholder="Enter Phone Box Details" name="box">
         
         <select name="category" class="cat">
            <option value="samsung">samsung</option>
            <option value="apple">apple</option>
            <option value="huawei">huawei</option>
            <option value="xiaomi">xiaomi</option>
            <option value="nokia">nokia</option>
            <option value="oppo">oppo</option>
            <option value="oneplus">oneplus</option>
            <option value="vivo">vivo</option>
            <option value="google">google</option>
         </select>
         </div>
         <div class="row">
            <label>Insert Main Image:</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" required class="img_box" name="m_image">
            <label>Insert Phone Image 1:</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" required class="img_box" name="image1">
         </div>
         <div class="row">
            <label>Insert Phone Image 2:</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" required class="img_box" name="image2">
            <label>Insert Phone Colours Image:</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" required class="img_box" name="c_image">
         </div>   
         <div class="row">
            <label>Insert Chip Image:</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" required class="img_box" name="chip_i">
            <label>Insert Box Image:</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" required class="img_box" name="box_i">
         </div> 
         <div class="row">    
            <label>Insert Button Image:</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" required class="img_box" name="btn_i">
         </div>
         
         
      
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

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
                    
                <div class="card-footer" style="margin-top:-2rem;">
                    
                    <a href="admin_update_product.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
                    <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>

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

<script src="js/admin_script.js"></script>

</body>
</html>