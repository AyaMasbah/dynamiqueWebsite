<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Gestion Participants</title>

</head>
 <body>
<!-- header section starts  -->
<?php include 'header.php'; ?>
<!-- header section ends -->
<?php include 'connect.php'; ?>
<div class="account-form">
    <form method="POST" enctype="multipart/form-data">
        <h3>Remplissez ce formulaire pour participer</h3>
        <p class="placeholder"><label>Nom:</label></p>
        <input type="text" class="box" name="nomPar">
        <p class="placeholder"><label>Prénom:</label></p>
        <input type="text" class="box" name="prenomPar">
        <p class="placeholder"><label>Email:</label></p>
        <input type="text" class="box" name="emailPar">
        <p class="placeholder"><label>Age:</label></p>
        <input type="number" class="box" name="agePar">
        <p class="placeholder"><label>Titre:</label></p>
        <input type="text" class="box" name="titre">
        <p class="placeholder">Photo de profil:</p>
        <input type="file" name="image" class="box" accept="image/*">
        <button type="submit" class="btn">Ajouter</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nomPar'];
    $prenom = $_POST['prenomPar'];
    $email = $_POST['emailPar'];
    $age = $_POST['agePar'];
    $titre = $_POST['titre'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = $nom.'.'.$ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_files1/' . $rename;

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $warning_msg[] = 'La taille de l\'image est trop grande !';
        } else {
            move_uploaded_file($image_tmp_name, $image_folder);
        }
    } else {
        $rename = '';
    }
    
    $sqlStatement = $db->prepare('INSERT INTO participant VALUES(null,?,?,?,?,?,?)');
    $sqlStatement->execute([$nom, $prenom, $email, $age, $titre, $rename]);
}

?>




<!-- ... Fin du code HTML ... -->
        
  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
</html>