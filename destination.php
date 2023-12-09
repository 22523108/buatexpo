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
   <title>destination | vacansheesh</title>
   <link rel="shortcut icon" href="images/vacansheesh.png" type="image/ico" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<div class="fullbody">
<section class="products">

   <h1 class="title">destination</h1>

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
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

</section>




</div>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>