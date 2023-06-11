<?php

include 'connect.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $c_pass = password_verify($_POST['c_pass'], $pass);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

   $verify_email = $db->prepare("SELECT * FROM `jury` WHERE email = ?");
   $verify_email->execute([$email]);

   if($verify_email->rowCount() > 0){
      $warning_msg[] = 'Email already taken!';
   }else{
      if($c_pass == 1){
         $insert_user = $db->prepare("INSERT INTO `jury` VALUES(NULL,?,?,?)");
         $insert_user->execute([$name, $email, $pass]);
         $success_msg[] = 'Registered successfully!';
      }else{
         $warning_msg[] = 'Confirm password not matched!';
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
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'header.php'; ?>
<!-- header section ends -->

<section class="account-form">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>make your account!</h3>
      <p class="placeholder">your name <span>*</span></p>
      <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
      <p class="placeholder">your email <span>*</span></p>
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <p class="placeholder">your password <span>*</span></p>
      <input type="password" name="pass" required maxlength="50" placeholder="enter your password" class="box">
      <p class="placeholder">confirm password <span>*</span></p>
      <input type="password" name="c_pass" required maxlength="50" placeholder="confirm your password" class="box">
      <p class="link">already have an account? <a href="login.php">login now</a></p>
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>














<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

<?php include 'alers.php'; ?>

</body>
</html>