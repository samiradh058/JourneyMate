<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    try{
        require_once 'dbh.inc.php';
        require_once 'signup_modal.inc.php';
        require_once 'signup_controller.inc.php';

        $errors=[];

        if(is_input_empty($username, $email, $pwd)) {
            $errors['empty_input'] = "Fill in all fields!";
        }

        if(is_email_invalid($email)) {
            $errors['invalid_email'] = "Invalid email entered!";
        }

        if(is_username_taken($pdo, $username)) {
            $errors['username_taken'] = "Username already taken!";
        }

        if(is_email_registered($pdo, $email)) {
            $errors['email_used'] = "Email already registered!";
        }

        session_start();

        if($errors) {
            $_SESSION['error_signup'] = $errors;
            header('Location: ../signup_box.php');
            die();
        }
        else{
            $_SESSION['success'] = true;
            create_user($pdo, $username, $email, $pwd);
            header('Location: ../signup_box.php');
            die();
        }
    }catch(PDOException $e){
        die('Query failed: '. $e->getMessage());
    }
} else{
    header('Location: ../index.php');
    die();
}