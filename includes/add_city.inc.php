<?php

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['userId'];
    $cityName = $_POST['city_name'];

    $errors=[];

    try{
        if(empty($cityName)) {
            $errors['empty_input'] = "Fill in the field!";
        }

        if($errors) {
            header('Location: ../myplans.php');
            die();
        }
        else{
            include('./dbh.inc.php');

            $query = 'INSERT INTO cities (cityName, userId) VALUES (:cityName, :userId)';
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':cityName', $cityName);
            $stmt->bindParam(':userId', $userId);
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