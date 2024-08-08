const parent = document.querySelector(".cities");
const listCities = parent.querySelectorAll("li");
const items = document.querySelector(".items");

const form = document.querySelector(".form");

items.classList.add("none_selected");

listCities.forEach((city) => {
  city.addEventListener("click", function () {
    const cityName = this.textContent;

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
  });
});

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
