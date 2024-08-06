<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JourneyMate: My Plans</title>
    <link rel="stylesheet" href="./CSS/my_plans.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="plans_container">
      <div class="top">
        <img
          class="main-icon"
          src="./Images/Main-icon.png"
          alt="JourneyMate Icon"
        />
        <div class="create_city">+ Add New City</div>
      </div>

      <div class="bottom">
        <div class="list_cities">
          <div class="city_title">List of cities:</div>
          <ul class="cities">

<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ./login.php');
    exit();
}

$result = $_SESSION['user'];
$username = $result['username'];

include('./includes/dbh.inc.php');

//For user
$query = "SELECT id FROM users WHERE username = ?";
$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$userId = $user['id'];


//For city
$query = "SELECT cityName FROM cities WHERE userId = ?";
$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $userId, PDO::PARAM_STR);
$stmt->execute();
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($cities as $city) {
    echo "<li>". htmlspecialchars($city['cityName']) . "</li>";
}  ?>
        </ul>
        </div>
 
        <div class="items none_selected">
          <!-- <div class="pack">
            Pack your bags to go to &nbsp;<span id="selected_city"></span>
          </div>

          <div class="list_items">
            <div class="add_items">+ Add items</div>
            <div class="dynamic_items"></div>
          </div> -->
          Select a city first!
        </div>
      </div>
    </div>

    <script src="myplans.js"></script>
  </body>
</html>