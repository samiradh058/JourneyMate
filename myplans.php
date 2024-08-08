<?php
session_start();
?>

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
  <div class="add_city modal">
        <div class="x-btn city-x">&times</div>
        <h2>Add City</h2>
        <form class='form' action="includes/add_city.inc.php" method="POST">
            <div class="form-group">
              <label for="city_name">Enter City Name</label>
              <input placeholder="Name of city" type="text" name='city_name' id='city_name'>
            </div>
            <div class="submit-wrapper">
            <button class='submit' type='submit'>Add</button>
            </div>  
        </form>
    </div>

    <div class="add_item modal">
        <div class="x-btn item-x">&times</div>
        <h2>Add Item</h2>
        <form class='form' action="includes/add_item.inc.php" method="POST">
        <div class="form-group">
              <label for="item_name">Enter the name of item</label>
              <input placeholder="Name of item" type="text" name='item_name' id='item_name'>
            </div>
            <div class="submit-wrapper">
            <button class='submit' type='submit'>Add</button>
            </div>
            
        </form>
    </div>

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

$_SESSION['userId'] = $userId;


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