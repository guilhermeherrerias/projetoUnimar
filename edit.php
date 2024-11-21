<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];
    $placa = $_POST['placa'];

    $stmt = $pdo->prepare("UPDATE carros SET modelo = ?, marca = ?, ano = ?, placa = ? WHERE id = ?");
    $stmt->execute([$modelo, $marca, $ano, $placa, $id]);

    header("Location: index.php");
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM carros WHERE id = ?");
    $stmt->execute([$id]);
    $carro = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
</head>
<body>
    <h1>Editar Carro</h1>

    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $carro['id'] ?>">
        <input type="text" name="modelo" value="<?= $carro['modelo'] ?>" required>
        <input type="text" name="marca" value="<?= $carro['marca'] ?>" required>
        <input type="number" name="ano" value="<?= $carro['ano'] ?>" required>
        <input type="text" name="placa" value="<?= $carro['placa'] ?>" required>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>