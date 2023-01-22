<?php
if(isset($_GET['id']) && !is_array($_GET['id']) && is_numeric($_GET['id'])){
    $pdo = require_once 'connection.php';
    $deleteStatement = $pdo->prepare('DELETE FROM `registracija` WHERE id = ?');
    $deleteStatement->execute([$_GET['id']]);
}
header('Location: admin1.php', true, 302);
?>
