<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Gestion Participants</title>
</head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Competition d'Arts</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="principale.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestion des Catégories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestion des Participants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestion des Œuvres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestion des Jury</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Résultat et prix</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">..</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">..</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">..</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <?php

$host='localhost';
$dbname='login';
$username='root';
$password='';
try{
    $db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    //Definir mode d'erreur de PDO a Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die('Erreur:'.$e->getMessage());
}
?>
<div class="col-md-6">
    <br>
        <h3>Ajout de participant:</h3><br>
<form method="POST" >
<div class="form-group">
<label>Id:</label>
<input type="text" class="form-control" name="idPar">
</div>
<div class="form-group">
<label>Nom:</label>
<input type="text" class="form-control" name="nomPar">
</div>
<div class="form-group">
<label>Prenom:</label>
<input type="text" class="form-control" name="prenomPar">
</div>
<div class="form-group">
<label>Age:</label>
<input type="number" class="form-control" name="agePar">
</div>
<div class="form-group">
<label>Email:</label>
<input type="email" class="form-control" name="emailPar">
</div>
<div class="form-group">
<label>Talent:</label>
<input type="text" class="form-control" name="talent">
</div>

<button type="submit" class="btn btn-primary">Ajouter</button>

</form>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['idPar'];
    $nom=$_POST['nomPar'];
    $prenom=$_POST['prenomPar'];
    $age=$_POST['agePar'];
    $email=$_POST['emailPar'];
    $talent=$_POST['talent'];
   

    $sth=$db->prepare("INSERT INTO participant(id,nom,prenom,email,age,talent) VALUES (:id,:nom,:prenom,:email,:age,:talent)");
    $sth->bindValue(':id',$id);
    $sth->bindValue(':nom',$nom);
    $sth->bindValue(':prenom',$prenom);
    $sth->bindValue(':email',$email);
    $sth->bindValue(':age',$age);
    $sth->bindValue(':talent',$talent);

    $sth->execute();


}
?>

  <!-- ... Fin du code HTML ... -->
        

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
</html>