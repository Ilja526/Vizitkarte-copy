<?php
if(isset($_POST["Id"]) && !is_array($_POST["Id"]) &&
    isset($_POST["Name"]) && !is_array($_POST["Name"]) &&
    isset($_POST["Lastname"]) && !is_array($_POST["Lastname"]) &&
    isset($_POST["Age"]) && !is_array($_POST["Age"]) &&
    isset($_POST["Telephon"]) && !is_array($_POST["Telephon"]) &&
    isset($_POST["Gmail"]) && !is_array($_POST["Gmail"])
){
    $sql = "UPDATE registracija
 SET Name=:username, Lastname=:lastname, Age=:age, Telephon=:telephon, Gmail=:gmail WHERE Id = :userId";
    $pdo = require_once 'connection.php';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userId", $_POST["Id"]);
    $stmt->bindValue(":username", $_POST["Name"]);
    $stmt->bindValue(":lastname", $_POST["Lastname"]);
    $stmt->bindValue(":age", $_POST["Age"]);
    $stmt->bindValue(":telephon", $_POST["Telephon"]);
    $stmt->bindValue(":gmail", $_POST["Gmail"]);
    $stmt->execute();
    header("Location: admin1.php.php", true, 302);
}
else{
    echo 'Некорректные данные';
}