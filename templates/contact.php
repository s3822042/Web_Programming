<?php 
  // check session status and start session 
  if ( empty(session_id()) ) session_start();

	// detect install.php
	error_reporting(E_ERROR | E_PARSE);
	if (fopen('../php/install.php', 'r') != null) {
	exit("'install.php' still exists! Delete it to proceed!");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/contact.module.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- Navigation bar -->
    <header>
      <!-- Logo -->
      <div class="brand">
        <a href="../index.php"
          ><img
            src="https://i.imgur.com/mE6aWmB.png"
            alt="logo"
            class="logo-img"
          />
        </a>
      </div>
      <!-- Right menu -->
      <nav class="menu">
        <input type="checkbox" id="menuToggle" />
        <label for="menuToggle" class="menu-icon">
          <i class="fa fa-bars"></i>
        </label>
        <ul>
          <a href="about.php"><li>About us</li></a>
          <a href="fees.php"><li>Fees</li></a>
          <a href="account/account.php"><li>Account</li></a>
          <a href="browse-menu.php"><li>Browse</li></a>
          <a href="faq.php"><li>FAQs</li></a>
          <a href="contactphp"><li>Contact</li></a>
          <a href="login-form.php"><li>Sign in</li></a>
          <?php 
              $cartNum = 0;
              // if cart already exists
              if (isset($_SESSION['cart']))
              {
                  foreach ($_SESSION['cart'] as &$subCart) {
                      $cartNum += $subCart[3];
                  }
                  echo '<a href="cart.php" style="color:red;"><li>Cart: <span>'.$cartNum.'</span></li></a>';
              // if the array is empty
              } else {
                  echo '<a href="cart.php" ><li>Cart</li></a>';
              }
          ?>
        </ul>
      </nav>
    </header>
    <!-- End header -->

    <!-- Contact Form  -->
    <form id="form">
      <h2>CONTACT US</h2>
      <!-- Contact purpose -->
      <p id="choices-label" for="choices">Contact Purpose:</p>
      <br />
      <select name="purpose-list" id="choices">
        <option value="report-bug" selected>Report Bug</option>
        <option value="suggest-feature">Suggest Feature</option>
        <option value="other-feedback">Other Feedback</option></select
      ><br /><br />

      <!-- Name -->
      <label id="name-label" for="name">Name:</label><br />
      <input
        type="text"
        id="name"
        onblur="isValidName()"
        oninput="clearOnInput()"
        placeholder="Enter your name"
        required
      />
      <br />
      <p id="error-for-name" style="color: red; font-size: 10px"></p>

      <!-- Email -->
      <label id="email-label" for="email">Email:</label><br />
      <input
        type="text"
        id="email"
        onblur="checkFormatEmail()"
        oninput="clearOnInput()"
        placeholder="Enter your email"
        required
      />
      <br />
      <p id="error-for-email" style="color: red; font-size: 10px"></p>

      <!-- Phone -->
      <label id="phone-label" for="phone">Phone:</label><br />
      <input
        type="text"
        id="phone"
        onblur="checkFormatPhone()"
        oninput="clearOnInput()"
        placeholder="Enter your phone"
        required
      />
      <br />
      <p id="error-for-phone" style="color: red; font-size: 10px"></p>

      <!-- Contact method -->
      <p id="prefer-label">Prefer:</p>
      <br />
      <input
        type="radio"
        id="prefer-email"
        name="prefer-method"
        value="email"
      />
      <label for="prefer-email">Email</label>
      <input
        type="radio"
        id="prefer-phone"
        name="prefer-method"
        value="phone"
      />
      <label for="prefer-phone">Phone</label><br />

      <!-- Contact days-->
      <p id="contact-days">Contact Days:</p>
      <br />
      <div
        id="second-layer-contact-days"
        onmouseover="atLeastOneIsChecked()"
        onclick="clearOnInput()"
      >
        <input type="checkbox" id="monday" name="prefer-days" value="monday" />
        <label for="monday">&nbsp;Mon</label>

        <input
          type="checkbox"
          id="tuesday"
          name="prefer-days"
          value="tuesday"
        />
        <label for="tuesday">&nbsp;Tue</label>

        <input
          type="checkbox"
          id="wednesday"
          name="prefer-days"
          value="wednesday"
        />
        <label for="wednesday">&nbsp;Wed</label>

        <input
          type="checkbox"
          id="thursday"
          name="prefer-days"
          value="thursday"
        />
        <label for="thursday">&nbsp;Thu</label><br />

        <input type="checkbox" id="friday" name="prefer-days" value="friday" />
        <label for="friday">&nbsp;Fri&nbsp;&nbsp;&nbsp;</label>

        <input
          type="checkbox"
          id="saturday"
          name="prefer-days"
          value="saturday"
        />
        <label for="saturday">&nbsp;Sat&nbsp;</label>

        <input type="checkbox" id="sunday" name="prefer-days" value="sunday" />
        <label for="sunday">&nbsp;Sun</label><br />
      </div>
      <p id="error-for-contact-days" style="color: red; font-size: 10px"></p>

      <!-- Message -->
      <label id="msg-label" for="msg">Message:</label><br /><br />
      <textarea
        id="msg"
        name="msg-content"
        rows="6"
        minlength="50"
        maxlength="500"
        placeholder="What would you like to tell us?"
        onkeypress="checkFormatTextArea()"
        onblur="clearOnInput()"
        required
      ></textarea
      ><br />
      <p id="error-for-msg" style="color: red; font-size: 10px"></p>

      <!-- Button -->
      <button type="reset" class="reset">Clear All</button>
      <button type="submit" class="submit">Submit Information</button>
    </form>
    <!-- End Contact Form  -->

    <script>
      // check name: length >= 3 and only letters
      function isValidName() {
        var temp = document.getElementById("name").value;
        if (temp.length < 3) {
          document.getElementById("error-for-name").innerHTML =
            "At least 3 letters!";
        } else if (/^[ a-zA-Z]+$/.test(temp) == false) {
          document.getElementById("error-for-name").innerHTML = "Letters only!";
        } else {
          document.getElementById("error-for-name").innerHTML = "";
        }
      }

      // check phone
      function checkFormatPhone() {
        var phonestr = document.getElementById("phone").value;

        //check for length
        if (phonestr.length < 9 || phonestr.length > 11) {
          document.getElementById("error-for-phone").innerHTML =
            "Valid length: 9 to 11 digits";
        }

        // check if begin with valid characters
        if (
          phonestr[0] == " " ||
          phonestr[0] == "." ||
          phonestr[0] == "-" ||
          /\d/.test(phonestr[0]) == false
        ) {
          document.getElementById("error-for-phone").innerHTML =
            "Should start with a number!";
        }

        // check if end with valid characters
        var l = phonestr.length;
        if (
          phonestr[l - 1] == " " ||
          phonestr[l - 1] == "." ||
          phonestr[l - 1] == "-" ||
          /\d/.test(phonestr[l - 1]) == false
        ) {
          document.getElementById("error-for-phone").innerHTML =
            "Should end with a number!";
        }

        // check if there is other character than space + dot + dash and only digits
        if (/^[ \-\.0-9]+$/.test(phonestr) == false) {
          document.getElementById("error-for-phone").innerHTML =
            "Valid characters: spaces, dots, dashes, 0-9!";
        }

        // check if two valid char are next to each other
        for (let i = 0; i < phonestr.length; i++) {
          if (phonestr[i] == "." && phonestr[i] == phonestr[i - 1]) {
            document.getElementById("error-for-phone").innerHTML =
              "Consecutive non-digit characters: " + phonestr[i];
          }
        }
      }

      // check at least 1 checkbox is check
      function atLeastOneIsChecked() {
        var count = 0;
        for (x = 0; x < document.getElementsByTagName("input").length; x++) {
          if (
            document.getElementsByTagName("input").item(x).type == "checkbox"
          ) {
            if (
              document.getElementsByTagName("input").item(x).checked == false
            ) {
              count++;
            }
          }
        }
        if (count == 8) {
          document.getElementById("error-for-contact-days").innerHTML =
            "At least one must be checked!";
        } else {
          document.getElementById("error-for-contact-days").innerHTML = "";
        }
      }

      // check email
      function checkFormatEmail() {
        var temp = document.getElementById("email").value;
        if (/\S+@\S+/.test(temp) == false) {
          document.getElementById("error-for-email").innerHTML =
            "Valid form: [name]@[domain]";
          return;
        }

        var arrTemp = temp.split("@");
        // //HANDLE THE NAME
        if (arrTemp[0].length < 3) {
          document.getElementById("error-for-email").innerHTML =
            "The name must at least 3 characters!";
          return;
        }
        if (
          arrTemp[0].charAt(0) == "." ||
          arrTemp[0].charAt(arrTemp[0].length - 1) == "."
        ) {
          document.getElementById("error-for-email").innerHTML =
            "Name cannot start or end with: '.'";
          return;
        }
        // check if two valid char are next to each other
        for (let i = 0; i < arrTemp[0].length; i++) {
          if (
            arrTemp[0].charAt(i) == "." &&
            arrTemp[0].charAt(i) == arrTemp[0].charAt(i - 1)
          ) {
            document.getElementById("error-for-email").innerHTML =
              "Consecutive non-digit characters in name: '.'";
            return;
          }
        }
        if (/[.a-zA-Z0-9]/.test(arrTemp[0]) == false) {
          document.getElementById("error-for-email").innerHTML =
            "Valid charaters for name: letters, 0-9, '.'";
          return;
        }

        // HANDLE THE DOMAIN
        if (arrTemp[1].includes(".") == false) {
          document.getElementById("error-for-email").innerHTML =
            "Must have at least 1 dot!";
          return;
        }
        if (
          arrTemp[1].charAt(0) == "." ||
          arrTemp[1].charAt(arrTemp[1].length - 1) == "."
        ) {
          document.getElementById("error-for-email").innerHTML =
            "Domain cannot start or end with: '.'";
          return;
        }
        // check if two valid char are next to each other
        for (let i = 0; i < arrTemp[1].length; i++) {
          if (
            arrTemp[1].charAt(i) == "." &&
            arrTemp[1].charAt(i) == arrTemp[1].charAt(i - 1)
          ) {
            document.getElementById("error-for-email").innerHTML =
              "Consecutive non-digit characters in domain: '.'";
            return;
          }
        }
        if (/[.a-zA-Z0-9]/.test(arrTemp[0]) == false) {
          document.getElementById("error-for-email").innerHTML =
            "Valid charaters for domain: letters, 0-9, '.'";
          return;
        }

        var domArrTemp = arrTemp[1].split(".");
        if (
          domArrTemp[domArrTemp.length - 1].length < 2 ||
          domArrTemp[domArrTemp.length - 1] > 5
        ) {
          document.getElementById("error-for-email").innerHTML =
            "Domain part after the last dot must be min 2 to max 5 characters!";
          return;
        }
      }

      // check text area
      function checkFormatTextArea() {
        const messageEle = document.getElementById("msg");
        const counterEle = document.getElementById("error-for-msg");

        messageEle.addEventListener("input", function (e) {
          const target = e.target;

          // Get the `maxlength` attribute
          const maxLength = target.getAttribute("maxlength");

          // Count the current number of characters
          const currentLength = target.value.length;

          counterEle.innerHTML = `${currentLength}/${maxLength}`;
        });
      }

      // reset input field when user retype
      function clearOnInput() {
        document.getElementById("error-for-name").innerHTML = "";
        document.getElementById("error-for-phone").innerHTML = "";
        document.getElementById("error-for-contact-days").innerHTML = "";
        document.getElementById("error-for-msg").innerHTML = "";
        document.getElementById("error-for-email").innerHTML = "";
      }

      // refresh the form on refresh
      window.onload = function () {
        document.getElementById("form").reset();
      };
    </script>

    <!-- Footer -->
    <footer class="page-footer">
      <div class="container">
        <div class="grid-container">
          <!-- Footer Logo -->
          <div class="grid-item">
            <a href="../index.php"
              ><img
                src="https://i.imgur.com/mE6aWmB.png"
                alt="logo"
                class="logo-img"
            /></a>
          </div>
          <!-- Quick Link -->
          <div class="grid-item inner-grid-container">
            <div class="grid-item">
              <a href="about.php">About Us</a>
            </div>
            <div class="grid-item">
              <a href="fees.php">Fees</a>
            </div>
            <div class="grid-item"><a href="browse-menu.php">Browse</a></div>
            <div class="grid-item">
              <a href="term_of_services.php">Term of Service</a>
            </div>
            <div class="grid-item">
              <a href="account/account.php">Account</a>
            </div>
            <div class="grid-item"><a href="faq.php">FAQs</a></div>
            <div class="grid-item">
              <a href="contact.php">Contact</a>
            </div>
            <div class="grid-item">
              <a href="privacy_policies.php">Privacy Policy</a>
            </div>
          </div>
          <!-- Social Link -->
          <div class="grid-item">
            <div class="social-buttons">
              <a href=""><i class="fab fa-instagram circle-icon"></i></a>
              <a href=""><i class="fab fa-facebook circle-icon"></i></a>
              <a href=""><i class="fab fa-linkedin-in circle-icon"></i></a>
              <a href=""><i class="fab fa-twitter circle-icon"></i></a>
            </div>
          </div>
        </div>
        <hr />
        <!-- Copyright -->
        <p>&copy 2021 | RMIT University | Group 16</p>
      </div>
    </footer>
    <!-- JavaScript -->
    <script src="../js/index.js"></script>
  </body>
</html>
