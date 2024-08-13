<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JourneyMate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/front_page.css" />
  </head>
  <body>
  <div class="whole-container">
    <div class="main">
      <div class="navbar">
        <img class="main-icon" src="./Images/Main-icon.png" alt="JourneyMate Icon" />
        <div class="login-signup">
          <a class='login-btn' href="./login.php">Login</a>
          <a class='signup-btn' href="./signup.php">SignUp</a>
        </div>
      </div>
      <div class="container">
        <div class="icons-left"><img class='icon' src="./Images/cloudy.png" alt="Weather">
          <img class='icon' src="./Images/dictionary.png" alt="Weather">
          <img class='icon' src="./Images/exchange.png" alt="Weather"></div>

          <div class="description"><h1 class="heading">JourneyMate</h1>
        <p class="paragraph paragraph1">A complete Travel Companion</p>
        <p class="paragraph paragraph2">for all travel enthusiasts ...</p></div>
 
          <div class="icons-right"><img class='icon' src="./Images/google-maps.png" alt="Weather">
          <img class='icon' src="./Images/newspaper.png" alt="Weather">
          <img class='icon' src="./Images/placeholder.png" alt="Weather"></div>    
      </div>
      <div class="created-by">@ Samir Adhikari</div>
    </div>
  </div>

  <!-- <script src="login_signup.js"></script> -->
  <script src="https://kit.fontawesome.com/59b7f1f633.js" crossorigin="anonymous"></script>
  </body>
</html>

<?php
session_start();
unset($_SESSION['homepage_enter']);
die();
?>