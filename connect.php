<?php 


$host = 'localhost';
$dbname = 'competition';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur de PDO à Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


if(isset($_COOKIE['jury_id'])){
   $jury_id = $_COOKIE['jury_id'];
 }else{
    $jury_id = '';
    
}
if (isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];
} else {
    $get_id = '';
    
}

?>