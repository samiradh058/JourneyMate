<?php

function check_signup_error() {
    if(isset($_SESSION['error_signup'])) {
        $errors= $_SESSION['error_signup'];

        echo '<br>';
        echo 'hello';

        foreach($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['error_signup']);
    }
    // } else if(isset($_GET['signup']) && $_GET['signup'] === 'success') {
    //     echo '<br>';
    //     echo '<p>SignUp Success</p>';
    // }
    else if(isset($_SESSION['success'])){
        echo '<br>';
        echo '<p>SignUp Successful</p>';
    }
}