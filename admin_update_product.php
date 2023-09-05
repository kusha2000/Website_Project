<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_product'];

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

   //$sql=mysqli_query($conn, "UPDATE `products` SET name = '$name', mini_name = '$s_name', old_price = '$o_price', price = '$n_price', category = '$category', size_text = '$size', display_text = '$display', chip_image = '$chip',camera_text = '$camera', usb_text = '$usb', ram_text = '$ram', sim_text = '$sim', sensor_text = '$sensor', os_text = '$os', battery_text = '$battery', box_text = '$box'  WHERE id = '$update_p_id' ") or die('query failed');
   // $sql=mysqli_query($conn, "UPDATE products SET name = '$name' WHERE id = '$update_p_id' ") or die('query failed');
   $sql = "UPDATE products SET name = '$name' WHERE id = '$update_p_id'";
   // $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, mini_name, old_price, price,category,size_text,display_text,chip_image,chip_text,camera_text,usb_text,ram_text,btn_image,sim_text,sensor_text,os_text,battery_text,box_text,box_image) VALUES('$name', '$s_name', '$o_price', '$n_price', '$m_image_image ', '$category', '$image1', '$image2', '$image_c', '$size', '$display', '$chip_i_image', '$chip', '$camera', '$usb', '$ram', '$btn_i_image', '$sim', '$sensor', '$os', '$battery', '$box', '$box_i_image')") or die('query failed');

   
   if ($conn->query($sql) === TRUE) {
      $message[] = 'product updated successfully!';
   } else {
      // echo "Error updating record: " . $conn->error;
      $message[] = 'product updated unsuccessfully!' . $conn->error;
 }

   if(!empty($image1) ){
      if($image1_size > 2000000){
         $message[] = 'image1 file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image1 = '$image1' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($image1_tmp_name, $image1_folter);
         unlink('uploaded_img/'.$old_image);
         //$message[] = 'main updated successfully!';
      }
   }else{
      // $message[] = 'image1 updated Error';
   }

   if(!empty($m_image_image)){
      if($m_image_image_size > 2000000){
         $message[] = 'main image file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$m_image_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($m_image_image_tmp_name, $m_image_image_folter);
         //unlink('uploaded_img/'.$old_image);
         //$message[] = 'image updated successfully!';
      }
   }else{
      // $message[] = 'main image updated Error';
   }

   if(!empty($image2)){
      if($image2_size > 2000000){
         $message[] = 'image2 file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image2 = '$image2' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($image2_tmp_name, $image2_folter);
         unlink('uploaded_img/'.$old_image);
         //$message[] = 'image updated successfully!';
      }
   }else{
      // $message[] = 'image2 updated Error';
   }
   if(!empty($image_c)){
      if($image_c_size > 2000000){
         $message[] = 'image_colour file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image_col = '$image_c' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($image_c_tmp_name, $image_c_folter);
         unlink('uploaded_img/'.$old_image);
         //$message[] = 'image colours updated successfully!';
      }
   }else{
      // $message[] = 'image colours updated Error';
   }
   if(!empty($box_i_image)){
      if($box_i_image_size > 2000000){
         $message[] = 'image box file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `products` SET box_image = '$box_i_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($box_i_image_tmp_name, $box_i_image_folter);
         unlink('uploaded_img/'.$old_image);
         //$message[] = 'image updated successfully!';
      }
   }else{
      // $message[] = 'image box updated Error';
   }
   if(!empty($chip_i_image)){
      if($chip_i_image_size > 2000000){
         $message[] = 'image chip file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `products` SET chip_image = '$chip_i_image_size' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($chip_i_image_tmp_name, $chip_i_image_folter);
         unlink('uploaded_img/'.$old_image);
         //$message[] = 'image updated successfully!';
      }
   }else{
      // $message[] = 'image chip updated Error';
   }
   if(!empty($btn_i_image)){
      if($btn_i_image_size > 2000000){
         $message[] = 'image btn file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `products` SET btn_image = '$btn_i_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($btn_i_image_tmp_name, $btn_i_image_folter);
         unlink('uploaded_img/'.$old_image);
         //$message[] = 'image updated successfully!';
      }
   }else{
      // $message[] = 'image button updated Error';
   }

   
   // header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update product</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

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

<section class="update-product">


<?php

   $update_id = $_GET['update'];
   $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
   if(mysqli_num_rows($select_products) > 0){
      while($fetch_products = mysqli_fetch_assoc($select_products)){
?>

<form action="" method="POST" enctype="multipart/form-data">
      <h3>Update product</h3>
      <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" class="image"  alt="">
      
      <div class="flex">

         <input type="text" class="box" value="<?php echo $fetch_products['name']; ?>"  required placeholder="enter product name" name="name">
         <input type="text" class="box" value="<?php echo $fetch_products['mini_name']; ?>"  required placeholder="enter product Small name" name="s_name">
         <input type="number" min="0" class="box" value="<?php echo $fetch_products['old_price']; ?>"  required placeholder="enter Old Price" name="o_price">
         <input type="number" min="0" class="box" value="<?php echo $fetch_products['price']; ?>"   required placeholder="enter New price" name="n_price">
         <input type="text" class="box" value="<?php echo $fetch_products['size_text']; ?>"  required placeholder="Enter Phone size" name="size">
         <input type="text" class="box" value="<?php echo $fetch_products['display_text']; ?>"  required placeholder="Enter Phone Display Details" name="display">
         <input type="text" class="box" value="<?php echo $fetch_products['chip_text']; ?>"  required placeholder="Enter Phone Chip Details" name="chip">
         <input type="text" class="box" value="<?php echo $fetch_products['camera_text']; ?>" required placeholder="Enter Phone Camera Details" name="camera">
         <input type="text" class="box" value="<?php echo $fetch_products['usb_text']; ?>" required placeholder="Enter Phone USB Details" name="usb">
         <input type="text" class="box" value="<?php echo $fetch_products['ram_text']; ?>" required placeholder="Enter Phone RAM Details" name="ram">
         <input type="text" class="box" value="<?php echo $fetch_products['sim_text']; ?>" required placeholder="Enter Phone Sim Details" name="sim">
         <input type="text" class="box" value="<?php echo $fetch_products['sensor_text']; ?>" required placeholder="Enter Phone Sensor Details" name="sensor">
         <input type="text" class="box" value="<?php echo $fetch_products['os_text']; ?>" required placeholder="Enter Phone OS Details" name="os">
         <input type="text" class="box" value="<?php echo $fetch_products['battery_text']; ?>" required placeholder="Enter Phone Battery Details" name="battery">
         <input type="text" class="box" value="<?php echo $fetch_products['box_text']; ?>" required placeholder="Enter Phone Box Details" name="box">
         
         <select name="category" class="cat" value="<?php echo $fetch_products['category']; ?>" >
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
            <input type="file" value="<?php echo $fetch_products['image']; ?>" accept="image/jpg, image/jpeg, image/png" class="img_box" name="m_image">
            <label>Insert Phone Image 1:</label>
            <input type="file" value="<?php echo $fetch_products['image1']; ?>" accept="image/jpg, image/jpeg, image/png" class="img_box" name="image1">
         </div>
         <div class="row">
            <label>Insert Phone Image 2:</label>
            <input type="file" value="<?php echo $fetch_products['image2']; ?>" accept="image/jpg, image/jpeg, image/png" class="img_box" name="image2">
            <label>Insert Phone Colours Image:</label>
            <input type="file" value="<?php echo $fetch_products['image_col']; ?>" accept="image/jpg, image/jpeg, image/png" class="img_box" name="c_image">
         </div>   
         <div class="row">
            <label>Insert Chip Image:</label>
            <input type="file" value="<?php echo $fetch_products['chip_image']; ?>" accept="image/jpg, image/jpeg, image/png" class="img_box" name="chip_i">
            <label>Insert Box Image:</label>
            <input type="file" value="<?php echo $fetch_products['box_image']; ?>" accept="image/jpg, image/jpeg, image/png" class="img_box" name="box_i">
         </div> 
         <div class="row">    
            <label>Insert Button Image:</label>
            <input type="file" value="<?php echo $fetch_products['btn_image']; ?>" accept="image/jpg, image/jpeg, image/png" class="img_box" name="btn_i">
         </div>
         
         
      
         <input type="submit" value="update product" name="update_product" class="btn">
         <a href="admin_products.php" class="option-btn">go back</a>
   </form>



<?php
      }
   }else{
      echo '<p class="empty">no update product select</p>';
   }
?>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>