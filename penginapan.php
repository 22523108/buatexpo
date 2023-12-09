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
   <title>penginapan | vacansheesh</title>
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

   <h1 class="title">penginapan</h1>

   <div class="box-container">

      <?php
         $select_event = mysqli_query($conn, "SELECT * FROM `penginapan`") or die('query failed');
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

</section>




</div>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>