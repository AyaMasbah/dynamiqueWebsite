<?php

// class User {
//     protected $name;
//     protected $age;   

//     public function __construct($name,$age){
//         $this->name = $name;
//         $this->age = $age;
//     }
//     public function getName(){
//         return $this->name;
//     }



// }
// class Jody extends User{
//     private $tall;
//     public function __construct($name,$age,$tall ){
//     parent::__construct($name,$age) ;
//         $this->tall = $tall;
//     }


// }
// $jody = new Jody('jody',30,2);
// echo $jody->getName();
// //-----------------
// // Connexion à la base de données
// $servername = "localhost";
// $username = "votre_nom_utilisateur";
// $password = "votre_mot_de_passe";
// $dbname = "University";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     die("Connexion échouée: " . $e->getMessage());
// }

// // Traitement du formulaire d'ajout d'un nouvel étudiant
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'ajouter') {
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $age = $_POST['age'];

//     // Insertion des données dans la table "Etudiant"
//     $sql = "INSERT INTO Etudiant (Nom, Prenom, Age) VALUES (:nom, :prenom, :age)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':nom', $nom);
//     $stmt->bindParam(':prenom', $prenom);
//     $stmt->bindParam(':age', $age);

//     try {
//         $stmt->execute();
//         echo "Nouvel étudiant ajouté avec succès.";
//     } catch(PDOException $e) {
//         echo "Erreur lors de l'ajout de l'étudiant: " . $e->getMessage();
//     }
//  } 
$x = "PHP7";
$a[] = &$x; //$a[0] = "PHP7"
// foreach($a as $a){
//     echo $a."<br>";}
$y = "7e version de PHP";
$z = $y*10; //$z = 70;
$x.=$y; //$x = "PHP77e version de PHP";
$y=$y *$z; //$y = 490
$a[0] = "MySQL"; //$x = "MySQL"

echo $y."\n"; //490
echo $z."\n"; //70
echo $a[0]."\n"; //MySQL
echo "$x"; //MySQL


?>