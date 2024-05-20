const X = document.querySelector(".x-btn");
const modal = document.querySelector(".modal");
const formContainer = document.querySelector(".form-container");
const usernameField = document.getElementById("username");
const passwordField = document.getElementById("pwd");

if (X) {
  X.addEventListener("click", () => {
    window.location.href = "./";
  });
}

if (formContainer) {
  usernameField.value = "";
  passwordField.value = "";
  formContainer.addEventListener("click", function (e) {
    if (document.querySelector(".login-container")) {
      if (!modal.contains(e.target)) {
        window.location.href = "./";
      }
    }
    if (document.querySelector(".signup-container")) {
      if (!modal.contains(e.target)) {
        window.location.href = "./";
      }
    }
  });
}
