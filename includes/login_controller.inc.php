<?php

function is_input_empty($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        return true;
    }
    else {
        return false;
    }
}

function is_username_wrong(bool | array $result) {
    if(!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong($pwd, $hashedPwd) {
        $pwd = sha1($pwd);
        if ($pwd !== $hashedPwd) {
        return true;
    } else {
        return false;
    }
}