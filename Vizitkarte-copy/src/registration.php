<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montana</title>
    <link rel="stylesheet" href="../css/error1.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
</html>
<?php
$parameters = ['name', 'Lastname', 'Age', 'Telephon', 'Gmail'];
$errors = [];
if (isset($_POST['submit'])) {
    foreach ($parameters as $param) {
        if (!isset($_POST[$param]) || is_array($_POST[$param]) || trim($_POST[$param]) === '') {
            $errors[] = sprintf('<h1>Wrong or empty %s</h1>', $param);
        }
    }
    if (!$errors){
        $pdo = new PDO('mysql:host=localhost;dbname=vizitkarte;charset=utf8', 'root', 'root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        $name = $_POST['name'];
        $lastname = $_POST['Lastname'];
        $age = $_POST['Age'];
        $telephon = $_POST['Telephon'];
        $gmail = $_POST['Gmail'];
        $selectStatement = $pdo->prepare("SELECT COUNT(*) AS qty FROM `registracija` 
        WHERE `Name` = ? OR `Lastname` = ? OR `Age` = ? OR `Telephon` = ? OR `Gmail` = ?");
        $selectStatement->execute([$name, $lastname, $age, $telephon, $gmail]);
        if ($row = $selectStatement->fetch()){
            if ($row['qty'] > 0) {
                echo '<h1 class="error">Error,This user already exists<h1>';
                echo '<a href="../Galvena_lapa.html"><button type="button" class="btn btn-secondary left-button" data-bs-dismiss="modal">Back</button></a>';
                die;
            }
        }
        $statement = $pdo->prepare("INSERT INTO `registracija` (`Name`,`Lastname`,`Age`,`Telephon`,`Gmail`) VALUES(?, ?, ?, ?, ?)");
        $statement->execute([$name, $lastname, $age, $telephon, $gmail]);
        header('Location: Registracija.html', true, 302);
    } else {
        echo implode('<br>', $errors);
    }
}
?>
