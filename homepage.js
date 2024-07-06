///Map

let map;

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;

  map = L.map("map").setView([lat, long], 12);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution:
      '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);

  var marker = L.marker([lat, long]).addTo(map);
  getTemperature(lat, long);
}

function showError(error) {
  const seeWeather = document.getElementById("see-weather");
  seeWeather.innerHTML = "Allow location access!";
  seeWeather.style.color = "red";
  seeWeather.style.fontSize = "20px";
  seeWeather.style.textAlign = "right";

  var mapDiv = document.getElementById("map");
  mapDiv.style.backgroundColor = "#939090";
  mapDiv.style.color = "white";
  mapDiv.style.display = "flex";
  mapDiv.style.justifyContent = "center";
  mapDiv.style.alignItems = "center";
  mapDiv.style.fontSize = "24px";

  switch (error.code) {
    case error.PERMISSION_DENIED:
      mapDiv.innerHTML = "User denied the request for Geolocation.";
      break;
    case error.POSITION_UNAVAILABLE:
      mapDiv.innerHTML = "Location information is unavailable.";
      break;
    case error.TIMEOUT:
      mapDiv.innerHTML = "The request to get user location timed out.";
      break;
    case error.UNKNOWN_ERROR:
      mapDiv.innerHTML = "An unknown error occurred.";
      break;
  }
}
getLocation();

//Temperature

function getTemperature(lat, long) {
  const tempDiv = document.getElementById("temp");
  const seeWeather = document.getElementById("see-weather");

  const API = "ff5dfb3c329d845417fa0ff48cb7f36d";
  var url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&appid=${API}&units=metric`;
  fetch(url)
    .then((res) => res.json())
    .then((data) => {
      var temp = data.main.temp;
      tempDiv.innerHTML = temp + " °C";
      seeWeather.innerHTML = `
        <a
          href="https://www.google.com/search?q=weather"
          target="_blank"
        >
          See details
        </a>
      `;
      seeWeather.style.textAlign = "right";
    })
    .catch((err) => {
      seeWeather.innerHTML = "Error fetching temperature!";
      seeWeather.style.textAlign = "right";
      seeWeather.style.color = "red";
      seeWeather.style.fontSize = "20px";
    });
}

async function fetchTourismNews() {
  const apiKey = "8db731c4227d45d8a5178b1dfeed85a5";
  const url = `https://newsapi.org/v2/everything?q=tourism&sortBy=relevancy&apiKey=${apiKey}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
    const newsArticles = data.articles;

    function displayNews(newsArticles) {
      const newsContainer = document.getElementById("newsContainer");

      for (let i = 0; i < 6 && i < newsArticles.length; i++) {
        const news = newsArticles[i];

        const newsDiv = document.createElement("a");
        newsDiv.href = news.url;
        newsDiv.className = "eachNews";

        const newsTitle = document.createElement("h4");
        newsTitle.textContent = news.title;

        const newsDescription = document.createElement("p");
        newsDescription.textContent = news.description;

        newsDiv.appendChild(newsTitle);
        newsDiv.appendChild(newsDescription);

        newsContainer.appendChild(newsDiv);
      }
    }
    displayNews(newsArticles);
  } catch (error) {
    alert("Error fetching tourism news:" + error);
  }
}

fetchTourismNews();

// Blurring the bottom half when clicking on hamburger

const ham = document.querySelector(".fa-bars");
const buttomHalf = document.querySelector(".bottom-to-be-blurred-container");
const upperHalf = document.querySelector(".top-container");
const sideBar = document.querySelector(".side-bar");

ham.addEventListener("click", function (e) {
  e.stopPropagation();
  if (buttomHalf.classList.contains("blur")) {
    buttomHalf.classList.remove("blur");
    document.body.style.overflowY = "auto";
    sideBar.classList.remove("make-visible");
    if (map) {
      map.dragging.enable();
      map.scrollWheelZoom.enable();
    }
  } else {
    buttomHalf.classList.add("blur");
    document.body.style.overflowY = "hidden";
    sideBar.classList.add("make-visible");
    if (map) {
      map.dragging.disable();
      map.scrollWheelZoom.disable();
    }
  }
});

upperHalf.addEventListener("click", function () {
  if (buttomHalf.classList.contains("blur")) {
    buttomHalf.classList.remove("blur");
    document.body.style.overflowY = "auto";
    sideBar.classList.remove("make-visible");
    if (map) {
      map.dragging.enable();
      map.scrollWheelZoom.enable();
    }
  }
});

sideBar.addEventListener("click", function (e) {
  e.stopPropagation();
});
