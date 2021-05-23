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
    <title>FAQs</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/faq.module.css" />
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
        <label for="menuToggle" class="menu-icon"
          ><i class="fa fa-bars"></i
        ></label>
        <ul>
          <a href="about.php"><li>About us</li></a>
          <a href="fees.php"><li>Fees</li></a>
          <a href="account/account.php"><li>Account</li></a>
          <a href="browse-menu.php"><li>Browse</li></a>
          <a href="faq.php"><li>FAQs</li></a>
          <a href="contact.php"><li>Contact</li></a>
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
    <div class="banner-container">
      <div class="banner-content">
        <h1 class="centered-text">FAQs</h1>
      </div>
    </div>
    <details>
      <summary>What is The Mall Express's username?</summary>
      <p>
        Your username is the name of your account when you sign up for a Mall
        Express account. Every account has its own unique username and it cannot
        be duplicated. When you see
        <strong>"Username already exists. Please enter another one!"</strong>,
        please choose a different username.
      </p>
    </details>
    <details>
      <summary>Which method of transaction that we offer?</summary>
      <p>
        The Mall Express allows you to exchange in over 80 currencies. Currency
        of Preference is a display-only feature and allows you to see prices
        displayed in your preferred currency. You can update your Currency of
        Preference by changing from USD (default currency) to your preferred
        currency in the currency settings page. The available currencies for
        shopping are listed below. Once you are ready to purchase your item, at
        checkout, an 'Order Total' will display the total price of the order in
        the preferred currency. For payment, a 'Payment Total' will display the
        amount your payment method will be charged in.
      </p>
      <p>
        If your order is eligible at checkout for Mall Express Currency
        Converter, you can elect to pay with an eligible card, and the Payment
        Total will display the price in your card currency you elected to pay
        in. Please note that payment in a different currency is only possible
        for orders eligible for Amazon Currency Converter.
      </p>
      <p>
        The currency you select is for reference use only. Prices may be
        displayed in your selected currency for your convenience, and you can
        have prices displayed in your chosen currency, even for orders not
        eligible for Mall Express Currency Converter. At checkout, if you wish
        to pay using your chosen currency, the actual sales price will have
        additional fees which will be charged at checkout.
      </p>
    </details>
    <details>
      <summary>What are Regular Membership and Premium Membership?</summary>
      <p>
        Regular Membership are basic accounts you can register for free. As a
        Standard user, you can do just about anything in our platform, such as
        browsing or purchasing product.
      </p>
      <p>
        Premium Membership, it is only 20$ a month which provides you a 8%
        discount for each transaction and free delivery within 5 km.
      </p>
      <p>Furthermore, feel free to explore more as a guest!</p>
    </details>
    <details>
      <summary>Does The Mall Express have a referral system?</summary>
      <p>
        Yes, we do, every referral account do a transaction will give you points
        to earn reward.
      </p>
    </details>
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
