<?php

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    try{
        require_once 'dbh.inc.php';
        require_once 'login_modal.inc.php';
        require_once 'login_controller.inc.php';

        $errors=[];

        if(is_input_empty($username, $pwd)) {
            $errors["empty_input"] = 'Fill in all fields!';
        }

        $result = get_user($pdo, $username);

        $_SESSION['user'] = $result;

        if (is_username_wrong($result)) {
            $errors['login_incorrect'] = 'Incorrect username';
        }

        if (!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd'])) {
            $errors['login_incorrect'] = 'Incorrect password';
        }

        if($errors) {
            $_SESSION['error_login'] = $errors;
            header('Location: ../login.php');
            die();
        }
        else{
            $_SESSION['loggedin'] = true;
            header('Location: ../homepage.php');
            die();
        }
    }catch(PDOException $e){
        die('Query failed: '. $e->getMessage());
    }
} else{
    header('Location: ../');
    die();
}

