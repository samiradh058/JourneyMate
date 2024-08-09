const parent = document.querySelector(".cities");
const listCities = parent.querySelectorAll("li");
const items = document.querySelector(".items");
const removeCity = document.querySelector(".remove-city");

const form = document.querySelector(".form");

items.classList.add("none_selected");

let cityName;

listCities.forEach((city) => {
  city.addEventListener("click", function (e) {
    if (e.target.classList.contains("city-name")) {
      cityName = e.target.textContent.trim();

      fetch("./includes/fetch_items.inc.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          city: cityName,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          items.classList.remove("none_selected");

          const packDiv = document.createElement("div");
          packDiv.className = "pack";
          packDiv.innerHTML = `
          Pack your bags to go to &nbsp;<span id="selected_city"></span>
        `;

          const listItemsDiv = document.createElement("div");
          listItemsDiv.className = "list_items";
          listItemsDiv.innerHTML = `
          <div class="add_items">+ Add items</div>
          <div class="dynamic_items"></div>
        `;

          items.innerHTML = "";
          items.appendChild(packDiv);
          items.appendChild(listItemsDiv);

          const selectedCity = document.getElementById("selected_city");

          selectedCity.textContent = cityName;

          const dynamicItems = document.querySelector(".dynamic_items");

          if (data.length > 0) {
            data.forEach((item) => {
              dynamicItems.innerHTML += `<div class="item"><input type="checkbox" /> <label>${item.itemName}</label></div>`;
            });
          } else {
            dynamicItems.innerHTML =
              '<p style="color: white; font-size: 24px;">No items found for this city.</p>';
            dynamicItems.style.gridTemplateColumns = "none";
          }
        });
    }
    if (e.target.classList.contains("remove-city")) {
      if (cityName === undefined) {
        showMessage("First select the city");
      } else {
        fetch("./includes/delete-city.inc.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            city: cityName,
          }),
        });
        location.reload();
      }
    }
  });
});

function showMessage(message) {
  const messageDiv = document.createElement("div");
  messageDiv.className = "message";
  messageDiv.textContent = message;

  messageDiv.style.position = "fixed";
  messageDiv.style.top = "20px";
  messageDiv.style.left = "50%";
  messageDiv.style.transform = "translateX(-50%)";
  messageDiv.style.backgroundColor = "#ff4d4d";
  messageDiv.style.color = "white";
  messageDiv.style.padding = "10px";
  messageDiv.style.borderRadius = "5px";

  document.body.appendChild(messageDiv);

  setTimeout(() => {
    document.body.removeChild(messageDiv);
  }, 2000);
}

// Make add item and add city division visible

let hasEnteredCity = true;
let hasEnteredItem = true;

const addItem = document.querySelector(".add_item");
const addCity = document.querySelector(".add_city");

const cityButton = document.querySelector(".create_city");
// const itemButton = document.querySelector(".add_items");

const outerDiv = document.querySelector(".plans_container");

cityButton.addEventListener("click", function () {
  addCity.classList.add("visible");
  if (hasEnteredCity) {
    hasEnteredCity = false;
  }
});

document
  .querySelector(".plans_container")
  .addEventListener("click", function (event) {
    if (event.target.classList.contains("add_items")) {
      addItem.classList.add("visible");
      if (hasEnteredItem) {
        hasEnteredItem = false;
      }
    }
  });

outerDiv.addEventListener("click", function () {
  if (addCity.classList.contains("visible")) {
    if (hasEnteredCity) {
      addCity.classList.remove("visible");
    }
    hasEnteredCity = true;
  }
  if (addItem.classList.contains("visible")) {
    if (hasEnteredItem) {
      addItem.classList.remove("visible");
    }
    hasEnteredItem = true;
  }
});
