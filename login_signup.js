const signupModal = document.querySelector(".signup-container");
const loginModal = document.querySelector(".login-container");
const signupBtn = document.querySelector(".signup-btn");
const loginBtn = document.querySelector(".login-btn");
const signupX = document.querySelector(".signup-x");
const loginX = document.querySelector(".login-x");
const formContainer = document.querySelector(".form-container");

loginBtn.addEventListener("click", () => {
  formContainer.classList.add("visible-bg");
  loginModal.style.opacity = 1;
  loginModal.style.visibility = "visible";
});

loginX.addEventListener("click", () => {
  formContainer.classList.remove("visible-bg");
  loginModal.style.opacity = 0;
});

signupBtn.addEventListener("click", () => {
  formContainer.classList.add("visible-bg");
  signupModal.style.opacity = 1;
  signupModal.style.visibility = "visible";
});

signupX.addEventListener("click", () => {
  formContainer.classList.remove("visible-bg");
  signupModal.style.opacity = 0;
});

formContainer.addEventListener("click", function (e) {
  const checkInside =
    !signupModal.contains(e.target) && !loginModal.contains(e.target);
  const checkContain =
    signupModal.style.opacity == 1 || loginModal.style.opacity == 1;
  if (checkInside && checkContain) {
    signupModal.style.opacity = 0;
    loginModal.style.opacity = 0;
    formContainer.classList.remove("visible-bg");
  }
});
