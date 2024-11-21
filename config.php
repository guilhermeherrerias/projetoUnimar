<?php
$host = 'localhost';
$db = 'garagem';
$user = 'root'; // Altere conforme necessário
$pass = ''; // Altere conforme necessário

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>