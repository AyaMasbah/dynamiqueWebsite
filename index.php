<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
     <div class="container my-5"></div>
        <h2>Listes des participants</h2>
        <a class="btn btn-primary" href="/DynamiqueWebsite/create.php" role="button" >New Particpant</a>
        <br>
        <table class="table">
          <thead>
            <tr>
               <th>ID Competition</th>
               <th>ID</th>
               <th>NOM</th>
               <th>Prenom</th>
               <th>Age</th>
               <th>Email</th>
               <th>Telephone</th>
               <th>Adresse</th>
               <th>Created_at</th>
               <th>Action</th>
               
              </tr>
          </thead>
          <tbody>
               <?php
               $servername = "localhost";
               $username = "root";
               $password = "";
               $database = "competition";

               //create connection 
               $connection = new mysqli($servername, $username , $password,$database );
               
               // check connection
               if ($connection->connect_error){
                   die("connection failed" .$connection->connect_error) ;
               }

               // read all row from database table
               $sql= "SELECT * FROM participants";
               $result= $connection->query($sql);

               if (!$result){
                    die("invalid query:".$connection->error);
               }
               // read data of each row 
               while($row = $result->fetch_assoc()){
                    echo"
                    
                    <tr>
                        <td>$row[idComp]</td>
                        <td>$row[idPar]</td>
                        <td>$row[nomPar]</td>
                        <td>$row[prenomPar]</td>
                        <td>$row[agePar]</td>
                        <td>$row[emailPar]</td>
                        <td>$row[telPar]</td>
                        <td>$row[adrPar]</td>
                        <td>$row[created_at]</td>
                             <td>
                                  <a class='btn btn-primary btn-sm' href='/siphpmysql/edit.php?idPar=$row[idPar]'>Edit</a>
                                  <a class='btn btn-danger btn-sm' href='/siphpmysql/delete.php?idPar=$row[idPar]'>Delete</a>
                              </td>
                    </tr>
                    ";
               }
               
               
               ?>
     

          </thead>
        </table>
</body>
</html>