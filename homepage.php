<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ./login.php');
    exit();
}

$_SESSION['homepage_enter'] = true;

require_once "./includes/login_modal.inc.php";

$result = $_SESSION['user'];

$user = $result['username'];
$gender = $result['gender'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./CSS/homepage.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="big-container">
        <div class="top-container">
            <div class="top-left">
            <div class="imgAndName">
                <img src="./Images/Main-icon.png" alt="JourneyMate Icon" class="main-icon">
                <h1>JourneyMate</h1>
            </div>
            <i class="fa-solid fa-bars"></i>
            </div>
            <div class="top-right">
                <h2>Welcome back,<span><?php echo ($gender == 'male'? " Mr.": " Ms.") . $user; ?></span></h2>
                <h1 id="temp"></h1>
                <div id="see-weather">
                </div>
            </div> 
        </div>

        <div class="bottom-to-be-blurred-container">
            <div class="side-bar">
                <div class="options">
                <div class="side-bar-item">
                <i class="fa-solid fa-dollar-sign" style="color: #ff8a65;"></i>
                    <a href="./homepage.php">Currency Convertor</a>
                </div>
                <div class="side-bar-item">
                <i class="fa-solid fa-book" style="color: #ff8a65;"></i>
                    <a href="./homepage.php">Dictionary</a>
                </div> 
                <div class="side-bar-item">
                <i class="fa-solid fa-plane-departure" style="color: #ff8165;"></i>
                    <a href="./homepage.php">My plans</a>
                </div> 
                </div>
                
                <div class="logout-button">
                    <i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i>
                    <form action="./includes/logout.inc.php" method="post">
                        <button type="submit">Logout Now</button>
                    </form>
                </div>     
            </div>
            <div class="mapContainer">
            <div id="map">
            </div>
            <a class="mapApp" href="https://www.bbc.com/news/topics/c0eledl9rlmt" target="_blank">Go to Map</a>

            </div>

            <div class="news">
                <h2>Tourism News:</h2>
                <div id="newsContainer">
                </div>
                <a class="moreNews" href="https://www.bbc.com/news/topics/c0eledl9rlmt" target="_blank">See more (BBC Tourism News)</a>
            </div>
            <div class="footer">
                <div class="footer-content">
                    <div class="details left">
                        <h3>JourneyMate</h3>
                        <a href="">About Us</a>
                        <a href="">Terms of Service</a>
                        <a href="">Privacy Policy</a>
                    </div>
                    <div class="details middle">
                        <h3>Other Services</h3>
                        <a href="">Travel TIps</a>
                        <a href="">FAQs</a>
                    </div>
                    <div class="details right">
                        <h3>Contact</h3>
                        <a href="mailto:samiradhikari058@gmail.com" target="_blank">Email</a>
                        <a href="">Facebook</a>
                        <a href="">Instagram</a>
                    </div>
                </div>
                <p class="copyright">&copy; 2024 JourneyMate. All rights reserved.</p>
            </div>
        </div>
    </div>
    

    <script src="https://kit.fontawesome.com/59b7f1f633.js" crossorigin="anonymous"></script>
    <script src="homepage.js"></script>
</body>
</html>






