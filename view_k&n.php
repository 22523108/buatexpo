<?php

@include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>view k&n | vacansheesh</title>
   <link rel="shortcut icon" href="images/vacansheesh.png" type="image/ico" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="quick-view">

    <h1 class="title"></h1>

    <?php  
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $select_products = mysqli_query($conn, "SELECT * FROM `k&n` WHERE id = '$pid'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
    ?>
    <form action="" method="POST">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="details"><?php echo $fetch_products['details']; ?></div>
         <input type="hidden" name="k&n_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="k&n_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="k&n_image" value="<?php echo $fetch_products['image']; ?>">
      </form>
    <?php
            }
        }else{
        echo '<p class="empty">no kuliner & nongki details available!</p>';
        }
    }
    ?>

    <div class="more-btn">
        <a href="home.php" class="option-btn">go to home page</a>
    </div>

</section>






<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>