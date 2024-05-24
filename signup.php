<?php
    session_start();
    require_once 'includes/signup_view.inc.php';
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
<a class='login-btn btn' href="./login.php">Login</a>
    <div class="signup-container modal">
      <div class="x-btn signup-x">&times</div>
        <h2>SignUp</h2>
        <form class='form' action="includes/signup.inc.php" method="POST">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input placeholder="Username" type="text" id='username' name='username'>
            </div>
            <div class="form-group">
                <i class="far fa-envelope"></i>
                <input  placeholder="Email" type="type" id='email' name='email'>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input  placeholder="Password" type="password" id='pwd' name='pwd'>
            </div>
            <?php if(isset($_SESSION['success']) && $_SESSION['success']): ?>
                <button class='submit' type='button' onclick="window.location.href='./'">Goto Mainpage</button>
            <?php else: ?>
                <button class='submit' type='submit'>Signup</button>
            <?php endif; ?>

        </form>
        <?php
        check_signup_error();
    ?>
    </div> 
    <div class="created-by">@ Samir Adhikari</div>
</div>
<script src="https://kit.fontawesome.com/59b7f1f633.js" crossorigin="anonymous"></script>
<script src="login_signup.js"></script>
</body>
</html>

<?php
session_unset();
session_destroy();
exit();
?>
