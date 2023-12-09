<?php

@include 'config.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Vacansheesh - Website of Indonesia Tourism</title>
   <link rel="shortcut icon" href="images/vacansheesh.png" type="image/ico" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3><b>Start your journey now</b></h3><br>
      <p>
"As the sun slowly sets on the western horizon, the warm hues of twilight sweep across the sky, signaling a farewell to the day in this beautifully adorned realm of nature."</p><br>
      <a href="#destination" class="btn">see destinations</a>
   </div>

</section>

<section class="products" id="destination">

   <h1 class="title">destination</h1>

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST" class="box">
         <a href="view_destination.php?pid=<?php echo $fetch_products['id']; ?>" class="">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="uploadimage">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         </a>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="destination.php" class="option-btn">load more</a>
   </div>

</section>

<section class="products" id="event">

   <h1 class="title">event</h1>

   <div class="box-container">

      <?php
         $select_event = mysqli_query($conn, "SELECT * FROM `event` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_event) > 0){
            while($fetch_event = mysqli_fetch_assoc($select_event)){
      ?>
      <form action="" method="POST" class="box">
         <a href="view_event.php?pid=<?php echo $fetch_event['id']; ?>" class="">
         <img src="uploaded_img/<?php echo $fetch_event['image']; ?>" alt="" class="uploadimage">
         <div class="name"><?php echo $fetch_event['name']; ?></div>
         <input type="hidden" name="event_id" value="<?php echo $fetch_event['id']; ?>">
         <input type="hidden" name="event_name" value="<?php echo $fetch_event['name']; ?>">
         <input type="hidden" name="event_image" value="<?php echo $fetch_event['image']; ?>">
         </a>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no event added yet!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="event.php" class="option-btn">load more</a>
   </div>

</section>

<section class="products" id="event">

   <h1 class="title">kuliner & nongki</h1>

   <div class="box-container">

      <?php
         $select_event = mysqli_query($conn, "SELECT * FROM `k&n` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_event) > 0){
            while($fetch_event = mysqli_fetch_assoc($select_event)){
      ?>
      <form action="" method="POST" class="box">
         <a href="view_k&n.php?pid=<?php echo $fetch_event['id']; ?>" class="">
         <img src="uploaded_img/<?php echo $fetch_event['image']; ?>" alt="" class="uploadimage">
         <div class="name"><?php echo $fetch_event['name']; ?></div>
         <input type="hidden" name="event_id" value="<?php echo $fetch_event['id']; ?>">
         <input type="hidden" name="event_name" value="<?php echo $fetch_event['name']; ?>">
         <input type="hidden" name="event_image" value="<?php echo $fetch_event['image']; ?>">
         </a>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no event added yet!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="k&n.php" class="option-btn">load more</a>
   </div>

</section>

<section class="products" id="event">

   <h1 class="title">penginapan</h1>

   <div class="box-container">

      <?php
         $select_event = mysqli_query($conn, "SELECT * FROM `penginapan` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_event) > 0){
            while($fetch_event = mysqli_fetch_assoc($select_event)){
      ?>
      <form action="" method="POST" class="box">
         <a href="view_penginapan.php?pid=<?php echo $fetch_event['id']; ?>" class="">
         <img src="uploaded_img/<?php echo $fetch_event['image']; ?>" alt="" class="uploadimage">
         <div class="name"><?php echo $fetch_event['name']; ?></div>
         <input type="hidden" name="event_id" value="<?php echo $fetch_event['id']; ?>">
         <input type="hidden" name="event_name" value="<?php echo $fetch_event['name']; ?>">
         <input type="hidden" name="event_image" value="<?php echo $fetch_event['image']; ?>">
         </a>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no event added yet!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="penginapan.php" class="option-btn">load more</a>
   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>ingin mempromosikan produk anda?</h3>
      <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio officia aliquam quis saepe? Quia, libero.</p> -->
      <a href="contact.php" class="btn">contact us</a>
   </div>

</section>




<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>