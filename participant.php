<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Competition d'Arts</title>
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
          <a class="nav-link" href="principalUser.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Compétition</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Catégories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Participants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Œuvres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jury</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Prix</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Résultats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Commentaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Formulaire candidature</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">login Admin</a>
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
<?php $requete=$db->query('SELECT * FROM participant');?>
<p id="p1">


  <div class="col-md-6">
        <h3>Participants: </h3><br>
        <?php while($row = $requete->fetch(PDO::FETCH_ASSOC)) :  ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Participant  <?php  echo htmlspecialchars($row['prenom']).' '.htmlspecialchars($row['nom']); ?> </h5>
            
            <p class="card-text"><b>Informations sur le participant:</b>
              <label> Je suis <?php echo  htmlspecialchars($row['prenom']).' '.htmlspecialchars($row['nom']); ?>. Mon id est: <?php echo htmlspecialchars($row['id']); ?>. J'ai <?php echo htmlspecialchars($row['age']); ?> et mon talent est:
  <?php echo htmlspecialchars($row['talent']); ?></label>
            </p>
            <a href="#" class="btn btn-primary">Voir le profil</a>
          </div>
        </div>
      
   
   <br><br> <?php endwhile; ?>
   </div>
</p>


   <!-- ... Fin du code HTML ... -->
        

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>
</html>