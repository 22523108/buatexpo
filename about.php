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
   <title>about | vacansheesh</title>
   <link rel="shortcut icon" href="images/vacansheesh.png" type="image/ico" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/kelompok.jpeg" alt="">
        </div>

        <div class="content">
            <h1>Vacan<span>sheesh</span></h1>
            <p>adalah salah satu layanan web yang bertujuan untuk mempromosikan Daerah Istimewa Yogyakarta 
                baik dari sosial, budaya, atau sejarah, baik dari tempat wisata, kuliner, tempat nongki, penginapan, berita event dan lainnya. 
                Selain itu kami juga memberikan kesempatan yang begitu besar kepada masyarakat luas untuk 
                mengiklankan segala macam jenis umkmnya disini.</p>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h1>ingin mempromosikan produk anda?</h1>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/about-img-3.jpg" alt="">
        </div>

    </div>

</section>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>