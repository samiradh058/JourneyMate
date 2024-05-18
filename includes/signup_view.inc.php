<?php

function check_signup_error() {
    if(isset($_SESSION['error_signup'])) {
        $errors= $_SESSION['error_signup'];

        echo '<br>';

        foreach($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['error_signup']);
    }

    else if(isset($_SESSION['success'])){
        echo '<br>';
        echo '<p>SignUp Successful</p>';
        unset($_SESSION['success']);
    }
}