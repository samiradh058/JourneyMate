<?php
    session_start();
    require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JourneyMate</title>
    <link rel="stylesheet" href="./CSS/front_page.css" />
  </head>
  <body>
  <div class="whole-container">
    <div class="main">
      <div class="navbar">
        <img class="main-icon" src="./Images/Main-icon.png" alt="JourneyMate Icon" />
        <div class="login-signup">
          <button class="login-btn">Login</button>
          <button class="signup-btn">SignUp</button>
        </div>
      </div>
      <div class="container">
        <div class="icons-left"><img class='icon' src="./Icons/cloudy.png" alt="Weather">
          <img class='icon' src="./Icons/dictionary.png" alt="Weather">
          <img class='icon' src="./Icons/exchange.png" alt="Weather"></div>

          <div class="description"><h1 class="heading">JourneyMate</h1>
        <p class="paragraph paragraph1">A complete Travel Companion</p>
        <p class="paragraph paragraph2">for all travel enthusiasts ...</p></div>
          
          <div class="icons-right"><img class='icon' src="./Icons/google-maps.png" alt="Weather">
          <img class='icon' src="./Icons/newspaper.png" alt="Weather">
          <img class='icon' src="./Icons/placeholder.png" alt="Weather"></div>
          
          
        
      </div>
      <div class="created-by">@ Samir Adhikari</div>
    </div>

      <!-- Form container -->

    <div class="form-container">
        
      <!-- Login -->
      <div class="login-container modal">
      <div class="x-btn login-x">&times</div>
        <h2>Login</h2>
        <form class='form' action="" method="POST">
            <div class="form-group">
              <i class="fas fa-user"></i>
              <input placeholder="Username" type="text" name='username'>
            </div>
            <div class="form-group"> 
              <i class="fas fa-key"></i> 
              <input placeholder="Password" type="pwd" name='pwd'>
            </div>
            <button class='submit' type='submit'>Login</button>
        </form>
      </div>

      <!-- Signup -->
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
                <input  placeholder="Password" type="pwd" id='pwd' name='pwd'>
            </div>
            <button class='submit' type='submit'>SignUp</button>
        </form>
      </div>
      
    </div> 
    <?php
      check_signup_error();
    ?>
  </div>

  <script src="login_signup.js"></script>
  <script src="https://kit.fontawesome.com/59b7f1f633.js" crossorigin="anonymous"></script>
  </body>
</html>
