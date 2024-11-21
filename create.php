<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];

    $stmt = $pdo->prepare("INSERT INTO carros (modelo, marca, ano, placa) VALUES (?, ?, ?, ?)");
    $stmt->execute([$modelo, $marca, $ano, $placa]);

    header("Location: index.php");
}
?>