<?php

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cityId = $_SESSION['cityId'];

    $itemName = $_POST['item_name'];

    $errors=[];

    try{
        if(empty($itemName)) {
            $errors['empty_input'] = "Fill in the field!";
        }

        if($errors) {
            header('Location: ../myplans.php');
            die();
        }
        else{
            include('./dbh.inc.php');

            $query = 'INSERT INTO items (itemName, cityId) VALUES (:itemName, :cityId)';
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':itemName', $itemName);
            $stmt->bindParam(':cityId', $cityId);
            $stmt->execute();
            header('Location: ../myplans.php'); 
            die();

        }
    } catch(PDOException $e) {
        die('City Adding Failed' . $e->getMessage());
    }
} else {
    die();
}