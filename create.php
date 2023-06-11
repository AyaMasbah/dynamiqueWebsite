<?php
$servername= "localhost";
$username= "root";
$password="";
$database="competition";

  //Create Connexion
  $connection = new mysqli($servername, $username , $password,$database );




$idComp="";
$nomPar="";
$prenomPar="";
$agePar="";
$emailPar="";
$telPar="";
$adrPar="";

$errorMessage = "";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idComp = $_POST["idComp"];    
    $nomPar = $_POST["nomPar"];
    $prenomPar = $_POST["prenomPar"];
    $agePar = $_POST["agePar"];
    $emailPar = $_POST["emailPar"];
    $telPar = $_POST["telPar"];
    $adrPar = $_POST["adrPar"];
    do {
        if ( empty($nomPar)|| empty($prenomPar)|| empty($agePar)||  empty($emailPar)|| empty($telPar)|| empty($adrPar)){
            $errorMessage = "tous les champs sont importants ";
            break;
        }

        //add neww client to databse

        $sql = "INSERT INTO participants (idComp,nomPar,prenomPar,agePar,emailPar,telPar,adrPar)" .
               "VALUES ('$idComp','$nomPar','$prenomPar','$agePar','$emailPar',' $telPar',' $adrPar')";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid Query ". $connection->error;
            break;
        }
        $idComp="";
        $nomPar="";
        $prenomPar="";
        $agePar="";
        $emailPar="";
        $telPar="";
        $adrPar="";

        $successMessage = "Client added correctly" ;

        header("location: /DynamiqueWebsite/index.php");
        exit;

    } while(false);
}
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


            <div class="row-mb-3">
                 <label class="col-sm-3 col-form-label">ID Competition</label>
                 <div class="col-sm-6">
                 <select name="idComp" id="idComp" class="form-control" value="<?php echo $idComp; ?>">
                 <option value="">version de Competition</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                 <option value="2020">2020</option>
                 <option value="2019">2019</option>
                    </select>
                 </div>
            </div>
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
                    <a class="btn btn-outline-primary" href="/mysql/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>