<?php

include('dbh.inc.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //For city
    $cityName = $_POST['city'];
    $query = "SELECT cityId FROM cities WHERE cityName = ?";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $cityName, PDO::PARAM_STR);
    $stmt->execute();
    $city = $stmt->fetch(PDO::FETCH_ASSOC);
    $cityId = $city['cityId'];

    //For item
    $query = "SELECT itemName FROM items WHERE cityId = ?";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $cityId, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($item);
}
?>
