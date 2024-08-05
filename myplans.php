<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JourneyMate: My Plans</title>
    <link rel="stylesheet" href="./CSS/my_plans.css">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ:wght@100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="plans_container">
        <div class="top">
        <img class="main-icon" src="./Images/Main-icon.png" alt="JourneyMate Icon" />
        <div class="create_city">+ Add New City</div>
        </div>

        <div class="bottom">
            <div class="list_cities">
                <div class="city_title">List of cities: </div>
                <div class="cities">
                <li>Paris</li>
                <li>Kathmandu</li>
                <li>London</li>
                </div>
                
            </div>

            <div class="items">
                <div class="pack">Pack your bags to go to <span> "{Paris}"</span></div>

                <div class="list_items">
                    <div class="add_items">+ Add items</div>
                    <form class="packing_list" action="">
                        <div class="item">
                            <input type="checkbox">
                            <label for="">Item 1</label>
                        </div>
                        <div class="item">
                            <input type="checkbox">
                            <label for="">Item 2</label>
                        </div>
                        <div class="item">
                            <input type="checkbox">
                            <label for="">Item 3</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>