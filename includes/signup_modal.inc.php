<?php

function get_username($pdo, $username) {
    $query = 'SELECT username FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email($pdo, $email){
    $query = 'SELECT email FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user($pdo, $username, $email, $pwd) {
    $query = 'INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd)';
    $stmt = $pdo->prepare($query);

    $pwd = sha1($pwd);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->execute();
}