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
  // show_cart();
};

// 3. Modal form

function on() {
  let overlay = document.getElementById("overlay");
  overlay.classList.add("overlay-active");
}

function off() {
  let overlay = document.getElementById("overlay");
  overlay.classList.remove("overlay-active");
}

function openmodal(member) {
  let HuyDuong_content = document.getElementById("HuyDuong");
  let Andrew_content = document.getElementById("Andrew");
  let MinhNguyen_content = document.getElementById("Minh");
  let LuanVo_content = document.getElementById("LuanVo");
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
  let HuyDuong_content = document.getElementById("HuyDuong");
  let Andrew_content = document.getElementById("Andrew");
  let MinhNguyen_content = document.getElementById("Minh");
  let LuanVo_content = document.getElementById("LuanVo");
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
  let HuyDuong_content = document.getElementById("HuyDuong");
  let Andrew_content = document.getElementById("Andrew");
  let MinhNguyen_content = document.getElementById("Minh");
  let LuanVo_content = document.getElementById("LuanVo");
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

// 5. Login validation

function validateLogin() {
  "use strict";

  let email = document.loginForm.email.value;
  let pass = document.loginForm.pwd.value;

  let emailRegex =
    /(?:[a-z0-9!#$%&'+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/g;
  if (emailRegex.test(email)) {
    localStorage.setItem("validatedEmailAddress", email);
    return true;
  } else {
    alert("Login was unsuccessful, please check your email and/or password");
    return false;
  }
}

function displayUserInput() {
  const dataLocalStorage = document.getElementById("email");
  dataLocalStorage.value = localStorage.getItem("validatedEmailAddress");
  dataLocalStorage.disabled = true;
}

var previouslyEnteredEmail = getData("validatedEmailAddress");
if (previouslyEnteredEmail !== null) {
  alert("Hello " + previouslyEnteredEmail + ", welcome back!");
} else {
  alert("Incorrect Email and/or Password. Please try again!");
}

// 6. Function check sign-up validation

function validateOthers() {
  let errors = [];
  let firstname = document.getElementById("first-name").value;
  let lastname = document.getElementById("last-name").value;
  let address = document.getElementById("address").value;
  let city = document.getElementById("city").value;
  if (firstname.length < 3) {
    errors.push("Your first name must have at least 3 characters");
  }
  if (lastname.length < 3) {
    errors.push("Your last name must have at least 3 characters");
  }
  if (address.length < 3) {
    errors.push("Your address name must have at least 3 characters");
  }
  if (city.length < 3) {
    errors.push("Your city name must have at least 3 characters");
  }
  if (errors.length > 0) {
    alert(errors.join("\n"));
    return false;
  } else {
    return true;
  }
}

function validateRetypePassword() {
  let password = document.getElementById("password").value;
  let confirm = document.getElementById("confirm-password").value;
  if (password != confirm) {
    alert("Confirmed password is not matched");
    return false;
  } else {
    return true;
  }
}

function validatePhoneNumber() {
  let phoneNumber = document.getElementById("phonenumber").value;
  const phoneRegex = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;
  if (phoneRegex.test(phoneNumber)) {
    return true;
  } else {
    alert("Invalid phone number, please type another");
    return false;
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
  let check;
  if ((check = validatePassword()) == true) {
    if ((check = validateRetypePassword()) == true) {
      if ((check = validateOthers()) == true) {
        if ((check = validateEmail()) == true) {
          if ((check = validatePhoneNumber()) == true) {
            if ((check = validateZipCode()) == true) {
              if ((check = validateAdditionalField()) == true) {
                return true;
              } else {
                return false;
              }
            } else {
              return false;
            }
          } else {
            return false;
          }
        } else {
          return false;
        }
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function validateEmail() {
  const emailRegex =
    /(?:[a-z0-9!#$%&'+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/g;
  let emailAddress = document.getElementById("email-address").value;
  if (emailRegex.test(emailAddress)) {
    return true;
  } else {
    alert("Your email is invalid, please type another");
    return false;
  }
}

function additionalField() {
  document.getElementById("store-name").style.display = "block";
}

function hideAdditionalField() {
  document.getElementById("store-name").style.display = "none";
}

function validateAdditionalField() {
  const rbs = document.querySelectorAll('input[name="account-type"]');
  let selectedValue;
  for (const rb of rbs) {
    if (rb.checked) {
      selectedValue = rb.value;
      break;
    }
  }
  if (selectedValue == "store-owner") {
    validation = document.getElementById("store-name").value;
    if (validation.length < 1) {
      alert("Please type your store name");
      return false;
    } else {
      return true;
    }
  } else {
    return true;
  }
}

function validateZipCode() {
  const regex_1 = /\b\d{4}\b/g;
  const regex_2 = /\b\d{5}\b/g;
  const regex_3 = /\b\d{6}\b/g;
  let zipcode = document.getElementById("zip-code").value;
  if (
    regex_1.test(zipcode) == true ||
    regex_2.test(zipcode) == true ||
    regex_3.test(zipcode) == true
  ) {
    return true;
  } else {
    alert("Invalid zip code, please type zipcode 4~6 digits");
    return false;
  }
}