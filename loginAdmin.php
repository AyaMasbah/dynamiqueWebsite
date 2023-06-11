<!DOCTYPE html>
<html>
<head>
  <title>LOGIN ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
</head>
<body>
<!-- header section starts  -->
<?php include 'header.php'; ?>
<!-- header section ends -->
<br>
<br>
<div class="container">
  <h2>Login Admin</h2>
  <form action="verification.php" method="POST">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="principalUser.php" class="btn btn-primary">Retour au site d'acceuil</a>
  </form>
</div>

</body>
</html>






</body>
</html>