// 1. Cookie consent

const consentPropertyName = "mallexpress_consent";

const shouldShowPopup = () => !localStorage.getItem(consentPropertyName);
const savetoStorage = () => localStorage.setItem(consentPropertyName, true);

window.onload = () => {
  if (shouldShowPopup()) {
    const consent = confirm("Agree to allow Mall Express collect cookies");
    if (consent) {
      savetoStorage();
    }
  }
};

// 2. Automatically Slider
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
// 3. Modal form
const overlay = document.getElementById("overlay");
const HuyDuong_content = document.getElementById("HuyDuong");
const Andrew_content = document.getElementById("Andrew");
const MinhNguyen_content = document.getElementById("Minh");
const LuanVo_content = document.getElementById("LuanVo");

function on() {
  overlay.classList.add("overlay-active");
}

function off() {
  overlay.classList.remove("overlay-active");
}

function openmodal(member) {
  switch (member) {
    case "LuanVo":
      LuanVo_content.classList.add("modal-active");
      on();
      break;
    case "HuyDuong":
      HuyDuong_content.classList.add("modal-active");
      on();
      break;
    case "Andrew":
      Andrew_content.classList.add("modal-active");
      on();
      break;
    case "MinhNguyen":
      MinhNguyen_content.classList.add("modal-active");
      on();
      break;
  }
}

function offmodal(member) {
  switch (member) {
    case "LuanVo":
      LuanVo_content.classList.remove("modal-active");
      off();
      break;
    case "HuyDuong":
      HuyDuong_content.classList.remove("modal-active");
      off();
      break;
    case "Andrew":
      Andrew_content.classList.remove("modal-active");
      off();
      break;
    case "MinhNguyen":
      MinhNguyen_content.classList.remove("modal-active");
      off();
      break;
  }
}

function overlay_turnoff() {
  off();
  if (MinhNguyen_content.classList.contains("modal-active")) {
    MinhNguyen_content.classList.remove("modal-active");
  } else if (LuanVo_content.classList.contains("modal-active")) {
    LuanVo_content.classList.remove("modal-active");
  } else if (Andrew_content.classList.contains("modal-active")) {
    Andrew_content.classList.remove("modal-active");
  } else if (HuyDuong_content.classList.contains("modal-active")) {
    HuyDuong_content.classList.remove("modal-active");
  }
}
overlay.addEventListener("click", overlay_turnoff);

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
    localStorage.setItem("validatedEmailAddress", emailAddress);
    return true;
  } else {
    alert("Login was unsuccessful, please check your email and password");
    return false;
  }
}
function displayUserInput() {
  let dataLocalStorage = document.getElementById("email");
  dataLocalStorage.value = localStorage.getItem("validatedEmailAddress");
  dataLocalStorage.disabled = true;
}

var previouslyEnteredEmail = getData("validatedEmailAddress");
if (previouslyEnteredEmail !== null) {
  alert("Hello " + previouslyEnteredEmail + ", welcome back!");
} else {
  alert("Incorrect Email and/or Password. Please try again!");
}

//6. Check validation for password

function validateOthers() {
  var errors = [];
  let firstname = document.getElementById("firstname").value;
  let lastname = document.getElementById("lastname").value;
  let address = document.getElementById("email").value;
  let city = document.getElementById("city").value;
  if (firstname.length <= 3) {
    errors.push("Your first name must have at least 3 character");
  }
  if (lastname.length <= 3) {
    errors.push("Your first name must have at least 3 character");
  }
  if (address.length <= 3) {
    errors.push("Your first name must have at least 3 character");
  }
  if (city.length <= 3) {
    errors.push("Your first name must have at least 3 character");
  }
  if(errors.length > 0) {
    alert(errors.join("\n"));
    return false;
  }
  else {
    return true;
  }
}

function validateRetypePassword() {
  let password = document.getElementById("password").value;
  let confirm = document.getElementById("confirm-password").value;
  if (password != confirm) {
    alert("Confirmed password is not matched");
    return false;
  }
  else {
    return true;
  }
}

function validatePassword() {
  let password = document.getElementById("password").value;
  var errors = [];
  if (password.length < 8) {
    errors.push("Your password must be at least 8 characters"); 
  }
  if (password.length > 20) {
    errors.push("Your password exceed maximum length");
  }
  if (password.search(/[a-z]/i) < 0) {
    errors.push("Your password must contain at least one lowercase letter.");
  }
  if (password.search(/[0-9]/) < 0) {
    errors.push("Your password must contain at least one digit."); 
  }
  if (password.search(/\s/) > 0) {
    errors.push("Your password must not have whitespace");
  }
  if (password.search(/[A-Z]/) < 0) {
    errors.push("Your password must contain at least one uppercase letter");
  }
  if (password.search(/[!@#$%^&*]/) < 0) {
    errors.push("Your password must contain at least one special character");
  }
  if (errors.length > 0) {
    alert(errors.join("\n"));
    return false;
  }
  return true;
}

function checkValidation() {
  var check;
  if((check = validatePassword()) == true) {
    if((check = validateRetypePassword()) == true) {
      if((check = validateOthers()) == true) {
        return true;
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  } else {
    return false;
  }
}