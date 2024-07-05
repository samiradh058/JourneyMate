<?php


function get_user($pdo, $username) {
    $query = 'SELECT *  FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    // Fetch means one row
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Associative array
    return $result;
}