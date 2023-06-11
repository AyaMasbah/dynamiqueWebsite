<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
   <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="nav">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
      Art Competition
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  
  <div class="nav-links">
         <a href="principalUser.php">principale</a>
         <a href="participant.php">Participants</a>
         <a href="loginAdmin.php">Login_admin</a>
         <a href="prix.php">prix</a>
         <a href="resultat.php">Resultat</a>
         <a href="gestion_participant.php">Formulaire candidature</a>

  </div>


<!-- <header class="header">
   
   <section class="flex">

      <a href="principalUser.php" class="logo">Logo.</a>

      <nav class="navbar">
         <a href="principaleUser.php">principale</a>
         <a href="participent.php">Participants</a>
         <a href="login.php">Login_admin</a>
         <a href="prix.php">prix</a>
         <a href="resultat.php">Resultat</a>
         <a href="gestion_participant.php">Formulaire candidature</a>

         </?php
            if($user_id != ''){
         ?>
         <div id="user-btn" class="far fa-user"></div>
         </?php }; ?>
      </nav> 

      </*?php
         if($user_id != ''){
      ?>
      <div class="profile">
         </*?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         </*?php if($fetch_profile['image'] != ''){ ?>
            <img src="uploaded_files/</*?= $fetch_profile['image']; ?>" alt="" class="image">
         </*?php }; ?>   
         <p></*?= $fetch_profile['name']; ?></p>
         <a href="update.php" class="btn">update profile</a>
         <a href="components/logout.php" class="delete-btn" onclick="return confirm('logout from this website?');">logout</a>
         </*?php }else{ ?>
            <div class="flex-btn">
               <p>please login or register!</p>
               <a href="login.php" class="inline-option-btn">login</a>
               <a href="register.php" class="inline-option-btn">register</a>
            </div>
         </*?php }; ?>
      </div>
      </*?php }; ?>

   </section>

</header> --> 
</body>
</html>

