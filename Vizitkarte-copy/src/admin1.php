<?php
$pdo = require_once 'connection.php';
$selectStatement = $pdo->prepare('SELECT * FROM `registracija`;');
$selectStatement->execute();
$regestracija = $selectStatement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservations</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/about1.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <table class="table table-bordered table-stripped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Telephon</th>
            <th>Gmail</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($regestracija as $regestracija): ?>
            <tr>
                <td><?= htmlspecialchars($regestracija['Name']) ?></td>
                <td><?= htmlspecialchars($regestracija['Lastname']) ?></td>
                <td><?= htmlspecialchars($regestracija['Age']) ?></td>
                <td><?= htmlspecialchars($regestracija['Telephon']) ?></td>
                <td><?= htmlspecialchars($regestracija['Gmail']) ?></td>
                <td class="text-center"><a href="edit1.php?id=<?= htmlspecialchars($regestracija['Id']) ?>" class="btn btn-primary">Edit</a></td>
                <td class="text-center"><a href="delete1.php?id=<?= htmlspecialchars($regestracija['Id']) ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="col">
    <a href="../Galvena_lapa.html"><button class="thg" type="submit" name="submit" id="submit">Back on Site</button></a>
</div>
</body>
</html>