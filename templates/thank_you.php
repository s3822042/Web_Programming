<?php
	session_start();

	error_reporting(E_ERROR | E_PARSE);
	if (fopen('../php/install.php', 'r') != null) {
		exit("'install.php' still exists! Delete it to proceed!");
	} 

	if (isset($_SESSION['a-product-added'])) {
		unset($_SESSION['a-product-added']);
	}

	if (isset($_SESSION['last-visited-product'])) {
		unset($_SESSION['last-visited-product']);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thank you</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/thank_you.module.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
  </head>

  <body onmouseover="window.localStorage.removeItem('cart');window.localStorage.removeItem('totalCost')">
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
        <label for="menuToggle" class="menu-icon"
          ><i class="fa fa-bars"></i
        ></label>
        <ul>
          <a href="about.php">
            <li>About us</li>
          </a>
          <a href="fees.html">
            <li>Fees</li>
          </a>
          <a href="account/account.php">
            <li>Account</li>
          </a>
          <a href="browse-menu.html">
            <li>Browse</li>
          </a>
          <a href="faq.html">
            <li>FAQs</li>
          </a>
          <a href="contact.html">
            <li>Contact</li>
          </a>
          <a href="login-form.php">
            <li>Sign in</li>
          </a>
          <a href="cart.php" style="color: red" id="cart">
            <li>Cart</li>
          </a>
        </ul>
      </nav>
    </header>
    <!-- End header -->
    <main style="height: 500px">
      <div class="container" style="margin-top: 200px">
        <section class="thankyou">
          <h1>Thank you for your purchase!</h1>

          <p>You will receive a confirmation email from us soon.</p>
        </section>
      </div>
    </main>

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
              <a href="fees.html">Fees</a>
            </div>
            <div class="grid-item"><a href="browse-menu.html">Browse</a></div>
            <div class="grid-item">
              <a href="term_of_services.php">Term of Service</a>
            </div>
            <div class="grid-item">
              <a href="account/account.php">Account</a>
            </div>
            <div class="grid-item"><a href="faq.html">FAQs</a></div>
            <div class="grid-item">
              <a href="contact.html">Contact</a>
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
