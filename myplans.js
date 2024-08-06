const parent = document.querySelector(".cities");
const listItems = parent.querySelectorAll("li");
const items = document.querySelector(".items");

items.classList.add("none_selected");

listItems.forEach((item) => {
  item.addEventListener("click", function () {
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
