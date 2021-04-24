// 2. Automatically Slider
let email1 = "";
const productSlider = document.getElementById("product-slider");

function appendProductSlider() {
  const productCard = document.querySelector(".product-card");
  productSlider.appendChild(productCard);
}

function getProducts() {
  // Prior to getting products.
  shouldScroll =
    productSlider.scrollLeft + productSlider.clientWidth ===
    productSlider.scrollWidth;

  appendProductSlider();
  // After getting products.
  if (!shouldScroll) {
    scrollToRight();
  }
}

function scrollToRight() {
  productSlider.scrollLeft = productSlider.scrollWidth;
}

scrollToRight();

var theInterval = setInterval(getProducts, 500);

function startSlides(event) {
  theInterval = setInterval(getProducts, 500);
}

function pauseSlides(event) {
  clearInterval(theInterval); // Clear the interval we set earlier
}
// 5. Login validation
// function storeData(storageKey, myValueToStore) {
//   localStorage.setItem(storageKey, myValueToStore);
// }

// function getData(storageKey) {
//   localStorage.getItem(storageKey);
// }

function validateLogin() {
  "use strict";

  var email = document.loginForm.email.value;
  var pass = document.loginForm.pwd.value;

  var emailAddress = "email";
  var password = "password";
  if (email == emailAddress && pass == password) {
    email1 = email;
    localStorage.setItem("validatedEmailAddress", emailAddress);
    return true;
  } else {
    alert("Login was unsuccessful, please check your email and password");
    return false;
  }
}
let dataLocalStorage = document.getElementById("email");
dataLocalStorage.value = localStorage.getItem("validatedEmailAddress");
dataLocalStorage.disabled = true;

// Registration Data
var first_name = document.forms["regForm"]["first-name"];
var last_name = document.forms["regForm"]["last-name"];
var email = document.forms["regForm"]["email"];
var password = document.forms["regForm"]["password"];
var password_confirmation = document.forms["regForm"]["confirm-password"];

username.addEventListener("blur", nameVerify, true);
email.addEventListener("blur", emailVerify, true);
password.addEventListener("blur", passwordVerify, true);

const submitBtn = document.getElementById("submit-btn");

const validate = (e) => {
  e.preventDefault();
  //validate first name
  const firstName = document.getElementById("firstName");
  if (firstName.value === "") {
    alert("Please enter your first name.");
    firstName.focus();
    return false;
  }
  // validate last name
  const lastName = document.getElementById("lastName");
  if (lastName.value === "") {
    alert("Please enter your last name.");
    lastName.focus();
    return false;
  }

  // validate email
  const emailAddress = document.getElementById("email-address");
  if (emailAddress.value === "") {
    alert("Please enter your email address.");
    emailAddress.focus();
    return false;
  }
  if (!emailIsValid(emailAddress.value)) {
    alert("Please enter a valid email address.");
    emailAddress.focus();
    return false;
  }
  return true;
};
const emailIsValid = (email) => {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
};
submitBtn.addEventListener("click", validate);

var previouslyEnteredEmail = getData("validatedEmailAddress");
if (previouslyEnteredEmail !== null) {
  alert("Hello " + previouslyEnteredEmail + ", welcome back!");
} else {
  alert("Incorrect Email and/or Password. Please try again!");
}
