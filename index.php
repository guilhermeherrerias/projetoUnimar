<?php
include 'config.php';

$stmt = $pdo->query("SELECT * FROM carros");
$carros = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Carros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Carros</h1>

    <form action="create.php" method="POST">
        <input type="text" name="modelo" placeholder="Modelo" required>
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="number" name="ano" placeholder="Ano" required>
        <input type="text" name="placa" placeholder="Placa" required>
        <button type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Carros</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Placa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carros as $carro): ?>
                <tr>
                    <td><?= $carro['id'] ?></td>
                    <td><?= $carro['modelo'] ?></td>
                    <td><?= $carro['marca'] ?></td>
                    <td><?= $carro['ano'] ?></td>
                    <td><?= $carro['placa'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $carro['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $carro['id'] ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        