<?php
    session_start();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header('Location: ./homepage.php');
        die();
    }

    require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JourneyMate</title>
    <link rel="stylesheet" href="./CSS/login_signup.css">
</head>
<body>
<div class="form-container">
<img class="main-icon" src="./Images/Main-icon.png" alt="JourneyMate Icon" />
<a class='signup-btn btn' href="./signup_box.php">SignUp</a>
    <div class="login-container modal">
        <div class="x-btn login-x">&times</div>
        <h2>Login</h2>
        <form class='form' action="includes/login.inc.php" method="POST">
            <div class="form-group">
              <i class="fas fa-user"></i>
              <input placeholder="Username" type="text" name='username' id='username'>
            </div>
            <div class="form-group"> 
              <i class="fas fa-key"></i> 
              <input placeholder="Password" type="password" name='pwd' id='pwd'>
            </div>
            <button class='submit' type='submit'>Login</button>
        </form>
        <?php
        check_login_error();
    ?>
    </div>
    <div class="created-by">@ Samir Adhikari</div>
</div>
<script src="https://kit.fontawesome.com/59b7f1f633.js" crossorigin="anonymous"></script>
<script src="login_signup.js"></script>
</body>
</html>

