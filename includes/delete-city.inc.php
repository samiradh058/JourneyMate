<?php

include('dbh.inc.php');

session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cityName = $_POST['city'];
    $userId = $_SESSION['userId'];
    $cityId = $_SESSION['cityId'];

    $query = "DELETE FROM items WHERE cityId = ?";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $cityId, PDO::PARAM_STR);
    $stmt->execute();

    $query = "DELETE FROM cities WHERE cityName = ? and userId = ?";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $cityName, PDO::PARAM_STR);
    $stmt->bindParam(2, $userId, PDO::PARAM_STR);
    $stmt->execute();
}
?>
