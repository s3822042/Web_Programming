<?php
if ( empty(session_id()) ) session_start();
  error_reporting(E_ERROR | E_PARSE);
  if (fopen('../php/install.php', 'r') != null) {
      exit("'install.php' still exists! Delete it to proceed!");
  } 


  // echo '<h2>$_SESSION values</h2>';
  // echo '<pre>';
  // print_r($_SESSION);
  // echo '</pre>';
  // echo '<hr>';

  // echo '<h2>$_POST values</h2>';
  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';
  // echo '<hr>';

  // unset($_SESSION['user']);

  if (!isset($_SESSION['user']) && $_POST['hit-button'] == 'Order')
  {
    $_SESSION['visited-cart-page'] = 'already';
    header('location: sign-up-form.php');
  }

  if (isset($_SESSION['user']) && $_POST['hit-button'] == 'Order' && isset($_SESSION['a-product-added']) && $_SESSION['a-product-added'] == 'already')
  {
    header('location: thank_you.php');
  }

  if ($_POST['hit-button'] == 'Continue Shopping') {
    header('location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Placement</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/cart.module.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
  </head>

  <?php
    echo "<body onmouseover='cartNumbers(); totalCost()'>";
  ?>

<script type="text/javascript">
  function totalCost() {
    let cart = JSON.parse(localStorage.getItem("cart"));
    let total = 0;
    // msg = '';
    for (let item of cart) {
        // msg += item["name"] + ": $" + item["price"] +" x " + item["quantity"] + " of Size " + item["size"];
        let sub_total = parseFloat(item["price"]) * parseFloat(item["quantity"]);
        // msg += " = $" + sub_total + "\n";
        total += sub_total;
    }
    // msg += "----------------\n";
    // msg += "Total: $" + total;
    localStorage.setItem("totalCost", total);
}
</script>
  <!-- <script src="../js/cart.js"></script> -->
    <!-- Navigation bar -->
    <header onmouseleave="window.location.reload()">
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
          <a href="cart.php" style="color: red" class="cart-nav" id="cart"
            ><li>Cart: <span>0</span></li></a
          >
        </ul>
      </nav>
    </header>
    <!-- End header -->
    <!--body-->
    <div id="title">
      <p style="height: 100px">CART</p>
    </div>

    <div class="product-container">
      <div class="product-header">
        <h5 class="product-title">PRODUCT</h5>
        <h5 class="price">PRICE</h5>
        <h5 class="quantity">QUANTITY</h5>
        <h5 class="total">COST</h5>
      </div>

      <div class="products"></div>

      <div class="coupon-input">
        <label id="coupon-title" for="coupon-input-field"
          ><strong>COUPON:</strong></label
        >
        <input
          id="coupon-input-field"
          type="text"
          placeholder="(Optional)"
          oninput="this.value = this.value.toUpperCase()"
          onblur="afterCoupon(); validCoupon()"
        />
      </div>

      <div class="payment-total">
        <h4 id="paymentTotalValue">
          PAYMENT TOTAL:
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
            >$0</span
          >
        </h4>
      </div>

      <div class="button-container">
        <form method="post" name="cart-buttons-form" action="cart.php">
          <input type="submit" name="hit-button" value="Continue Shopping" class="continue-button">
          <input type="submit" name="hit-button" value="Order" class="order-button">
        </form>
      </div>
    </div>

    <script src="../js/cart.js"></script>
    <!-- Footer -->
    <footer class="page-footer">
      <div class="container">
        <div class="grid-container">
          <!-- Footer Logo -->
          <div class="grid-item">
            <a href="../index.html"
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
              <a href="account/account.html">Account</a>
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
    <!-- <script src="../js/index.js"></script> -->
  </body>
</html>
