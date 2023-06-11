<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="style.css"> -->
  <title>view participant</title>
</head>
<body>
  <!-- header section starts  -->
<?php include 'header.php'; ?>
<!-- header section ends -->
 
<?php 
        $pdo = new PDO('mysql:host=localhost;dbname=competition','root','');
        $sqlState = $pdo->prepare('SELECT * FROM participant');
        $sqlState->execute();

        $participants = $sqlState->fetchAll(PDO::FETCH_ASSOC);
    ?>
<!-- 
<?php //$requete=$db->query('SELECT * FROM participant');?>
<p id="p1">


  <div class="col-md-6">
        <h3>Participants: </h3><br>
        <?php //while($row = $requete->fetch(PDO::FETCH_ASSOC)) :  ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Participant  <?php  //echo htmlspecialchars($row['prenom']).' '.htmlspecialchars($row['nom']); ?> </h5>
            
            <p class="card-text"><b>Informations sur le participant:</b>
              <label> Je suis <?php //echo  htmlspecialchars(//$row['prenom']).' '.htmlspecialchars($row['nom']); ?>. Mon id est: <?php //echo htmlspecialchars($row['id']); ?>. J'ai <?php //echo htmlspecialchars($row['age']); ?> et mon talent est:
  <?php //echo htmlspecialchars($row['talent']); ?></label>
            </p>
            <a href="#" class="btn btn-primary">Voir le profil</a>
          </div>
        </div>
      
   
   <br><br> <?php //endwhile; ?>
   </div>
</p> -->
 <table width="100%" border="1" >
        <thead>
            <tr>
                <th>id_participant</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>age</th>
                <th>talent</th>
                <th>image</th>
            </tr>
            <?php 
                foreach($participants as $participant){
                    ?>
                        <tr>
                            <td><?php  echo $participant['id']?></td>
                            <td><?php  echo $participant['nom']?></td>
                            <td><?php  echo $participant['prenom']?></td>
                            <td><?php  echo $participant['email']?></td>
                            <td><?php  echo $participant['age']?></td>
                            <td><?php  echo $participant['titre']?></td>
                            <td><img src="uploaded_files1/<?php echo $participant['image'] ?>" alt="" width="600" height="341" ></td>
                        </tr>
                    <?php
                }
            ?>
        </thead>
    </table> 




  <!-- ... Fin du code HTML ... -->
  <!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>   

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php include 'alers.php'; ?>
 </body>
</html>