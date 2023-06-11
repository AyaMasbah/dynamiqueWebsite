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

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $verify_username = $db->prepare("SELECT * FROM `jury` WHERE username = ? LIMIT 1");
    $verify_username->execute([$username]);

    if ($verify_username->rowCount() > 0) {
        $fetch = $verify_username->fetch(PDO::FETCH_ASSOC);
        $verfiy_password = password_verify($password, $fetch['password']);
        if ($verfiy_password == 1) {
            setcookie('user_id', $fetch['id'], time() + 60*60*24*30, '/');
            header('location: all_posts.php');
            exit;
        } else {
            $warning_msg[] = 'Incorrect password!';
        }
    } else {
        $warning_msg[] = 'Incorrect username!';
    }
}
?>
