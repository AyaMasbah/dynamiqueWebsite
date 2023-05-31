<?php

$servername= "localhost";
$username= "root";
$password="";
$database="competition";

  //Create Connexion
  $connection = new mysqli($servername, $username , $password,$database );


$idPar="";
$nomPar="";
$prenomPar="";
$agePar="";
$emailPar="";
$telPar="";
$adrPar="";

$errorMessage="";
$successMessage="";


if($_SERVER['REQUEST_METHOD'] == 'GET'){


    if(!isset($_GET['idPar'])){
        header("location:/siphpmysql/index.php");
        exit; 
    }
    $idPar = $_GET["idPar"];
    
    //read the row of the selected participant from database table
     $sql= "SELECT * FROM participants WHERE idPar=$idPar " ;
     $result= $connection->query($sql);
     $row = $result->fetch_assoc( ); //read from database


     if(!$row){
        header("location: /siphpmysql/index.php");
        exit;
     }
     $nomPar = $row["nomPar"];
     $prenomPar = $row["prenomPar"];
     $agePar = $row["agePar"];
     $emailPar = $row["emailPar"];
     $telPar = $row["telPar"];
     $adrPar = $row["adrPar"];

}
    else
    {    // update data of the participant
    $idPar = $_POST['idPar'];
    $nomPar = $_POST['nomPar'];
    $prenomPar = $_POST['prenomPar'];
    $agePar = $_POST['agePar'];
    $emailPar = $_POST['emailPar'];
    $telPar = $_POST['telPar'];
    $adrPar = $_POST['adrPar'];

       // do {
        if ( empty($idPar)|| empty($nomPar)|| empty($prenomPar)|| empty($agePar)||  empty($emailPar)|| empty($telPar)|| empty($adrPar)){
            $errorMessage = "tous les champs sont importants ";
           // break;
     }
 //   $sql = "UPDATE `participants` SET `nomPar`=\'[value-1]\',`prenomPar`=\'[value-2]\',`agePar`=18,`emailPar`=\'[value-4]\',`telPar`=8755456,`adrPar`=\'[value-6]\' WHERE 1;";

    $sql = "UPDATE `participants` SET `nomPar` = '$nomPar',`prenomPar`= '$prenomPar',`agePar`= '$agePar',`emailPar`= '$emailPar',`telPar`= '$telPar',`adrPar`= '$adrPar' WHERE idPar = $idPar ";
            $result = $connection->query($sql);
    if(!$result){
        $errorMessage = "invalid query : " .$connection->error ;
       // break ;
    }
    $successMessage = "Client updated correctly";

    header("location: /siphpmysql/index.php");


}
 

       // }while (false);
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Participant</h2>

        <?php
        if (!empty($errorMessage)){
        echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong> $errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>

        ";

        }
        ?>


        <form action="" method="POST">
            <input type="hidden" name="idPar" value="<?php echo $idPar; ?>">
            <div class="row-mb-3">
                 <label class="col-sm-3 col-form-label">NomParticipant</label>
                 <div class="col-sm-6">
                    <input type="text" class="form-control" name="nomPar" value="<?php echo $nomPar; ?>">
                 </div>
            </div>
            <div class="row-mb-3">
                 <label class="col-sm-3 col-form-label">PrenomParticipant</label>
                 <div class="col-sm-6">
                    <input type="text" class="form-control" name="prenomPar" value="<?php echo $prenomPar; ?>">
                 </div>
            </div>
            <div class="row-mb-3">
                 <label class="col-sm-3 col-form-label">ageParticipant</label>
                 <div class="col-sm-6">
                    <input type="number" class="form-control" name="agePar" value="<?php echo $agePar; ?>">
                 </div>
            </div>
            <div class="row-mb-3">
                 <label class="col-sm-3 col-form-label">emailParticipant</label>
                 <div class="col-sm-6">
                    <input type="text" class="form-control" name="emailPar" value="<?php echo $emailPar; ?>">
                 </div>
            </div>
            <div class="row-mb-3">
                 <label class="col-sm-3 col-form-label">telParticipant</label>
                 <div class="col-sm-6">
                    <input type="tel" class="form-control" name="telPar" value="<?php echo $telPar; ?>">
                 </div>
            </div>
            <div class="row-mb-3">
                 <label class="col-sm-3 col-form-label">adressePartipant</label>
                 <div class="col-sm-6">
                    <input type="text" class="form-control" name="adrPar" value="<?php echo $adrPar; ?>">
                 </div>
            </div>
            <?php

                if (!empty($successMessage)){
                   echo "
                       <div class='row-mb-3'>
                            <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong> $successMessage</strong>
                                         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                             </div>
                        </div>
                          ";

                       }

            ?>


            <br>
   


            <div class="row mb-3">
                <div class=" col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class=" col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/siphpmysql/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>