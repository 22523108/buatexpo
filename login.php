<?php

@include 'config.php';

session_start();

if(isset($_POST['sublog'])){

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');


   if(mysqli_num_rows($select_users) > 0){
      
      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }else{
         $message[] = 'no user found!';
      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

if(isset($_POST['subreg'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));
   $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login | vacansheesh</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body class="bodylogin">

<?php
@include 'header.php';

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

<div class="loggiinn"></div>  
       <div class="bglogin"></div>
    <div class="login">
      <div class="content">
        <div class="text-sci">
          <h1>Hello!</h1>
          <p>Log in to your <br> account and start your journey <br><br><br>“The lush, verdant forest teemed with diverse 
            flora and fauna, creating a harmonious tapestry 
            of life in nature's exquisite embrace.”</p><br><br><br><br><br><br>

            <br><br><a class="linkabout" href="about.php">About Us</a>
        </div>
      </div>

      <div class="logreg-box">
        <div class="form-box log">
          <form action="#" method="post">
            <h2>Login</h2>
            <div class="input-box">
              <span class="loggg"><box-icon color='white' name='user' ></box-icon></span>
              <input type="email" name="email" id="" required>
              <label for="uname">Email</label>
            </div>
            <div class="input-box">
              <span class="loggg"><box-icon color='white' name='lock-alt' ></box-icon></span>
              <input type="password" name="pass" id="" required>
              <label for="pass">Password</label>
            </div>
            <input type="submit" name="sublog" class="buttoonn" value="Login">
            <div class="log-regist">
              <p>Don't have an account? <a href="#" class="regist-link">Sign Up</a></p>
            </div>
          </form>
        </div>

        <div class="form-box regist">
          <form action="#" method="post">
            <h2>Sign Up</h2>
            <div class="input-box">
              <span class="loggg"><box-icon color='white' name='user' ></box-icon></span>
              <input type="text" name="name" id="">
              <label for="uname">Name</label>
            </div>
            <div class="input-box">
              <span class="loggg"><box-icon color='white' name='user' ></box-icon></span>
              <input type="email" name="email" id="">
              <label for="uname">Email</label>
            </div>
            <div class="input-box">
              <span class="loggg"><box-icon color='white' name='flag' ></box-icon></span> 
              <input type="password" name="pass" id="">
              <label for="uname">Password</label>
            </div>
            <div class="input-box">
              <span class="loggg"><box-icon color='white' name='lock-alt' ></box-icon></span>
              <input type="password" name="cpass" id="">
              <label for="pass">Confirm Password</label>
            </div>
            <input type="submit" name="subreg" class="buttoonn" value="Sign up">
            <div class="log-regist">
              <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="js\script.js"></script>
</body>
</html>