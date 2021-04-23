// 2. Automatically slider
const flavoursContainer = document.getElementById("flavoursContainer");
const flavoursScrollWidth = flavoursContainer.scrollWidth;

window.addEventListener("load", () => {
  self.setInterval(() => {
    if (flavoursContainer.scrollLeft !== flavoursScrollWidth) {
      flavoursContainer.scrollTo(flavoursContainer.scrollLeft + 1, 0);
    }
  }, 15);
});

// 5. Login validation
function storeData(storageKey, myValueToStore) {
  localStorage.setItem(storageKey, myValueToStore);
}

function getData(storageKey) {
  localStorage.getItem(storageKey);
}

var previouslyEnteredUserName = getData("validatedUserName");
if (previouslyEnteredUserName !== null) {
  alert("Hello " + previouslyEnteredUserName + ", welcome back!");
} else {
  alert("Incorrect Username and/or Password. Please try again!");
}

function validateLogin() {
  var user = document.loginForm.usr.value;
  var pass = document.loginForm.pwd.value;
  var username = "username";
  var password = "password";
  if (user == username && pass == password) {
    storeData("validatedUserName", user); // Store the user with key "validatedUserName"
    return true;
  } else {
    alert("Login was unsuccessful, please check your username and password");
    return false;
  }
}

// Registration Data
var first_name = document.forms["regForm"]["first-name"];
var last_name = document.forms["regForm"]["last-name"];
var email = document.forms["regForm"]["email"];
var password = document.forms["regForm"]["password"];
var password_confirmation = document.forms["regForm"]["confirm-password"];
var profile = document.forms["regForm"]["profile"];
var address = document.forms["regForm"]["address"];
var city = document.forms["regForm"]["city"];
var zip_code = document.forms["regForm"]["zip-code"];
var country = document.forms["regForm"]["country"];

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
