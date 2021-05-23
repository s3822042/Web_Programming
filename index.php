<?php require './php/mall_page.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/index.module.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>
  <!-- Navigation bar -->
  <header>
    <!-- Logo -->
    <div class="brand"> <a href="index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /> </a> </div>
    <!-- Right menu -->
    <nav class="menu">
      <input type="checkbox" id="menuToggle" />
      <label for="menuToggle" class="menu-icon"><i class="fa fa-bars"></i></label>
      <ul>
        <a href="templates/about.php">
          <li>About us</li>
        </a> <a href="templates/fees.php">
          <li>Fees</li>
        </a> <a href="templates/account/account.php">
          <li>Account</li>
        </a> <a href="templates/browse-menu.php">
          <li>Browse</li>
        </a> <a href="templates/faq.php">
          <li>FAQs</li>
        </a> <a href="templates/contact.php">
          <li>Contact</li>
        </a> <a href="templates/login-form.php">
          <li>Sign in</li>
        </a> 
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
  <!-- New store -->
  <section id="stores">
    <div class="container">
      <div class="stores-header">
        <h2>New Stores</h2>
      </div>
      <div class="store_grid">
        <?php
        for ($i = 0; $i < count($newStore); $i++) {
          echo ' <div class="store">';
          echo '<figure>';
          echo '<a href="' . 'templates/store/Store_homepage.php?id=' . $newStore[$i][0] . '">';
          echo '<img src="https://i.imgur.com/jIB3Op5.jpg" alt="store-image" /></a>';
          echo '<figcaption>';
          echo $newStore[$i][1];
          echo '</figcaption>';
          echo '</figure>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </section>


  <!-- End new stores -->
  <!-- New product -->
  <section id="products">
    <div class="container">
      <div class="products-header">
        <h2>New Products</h2>
      </div>
      <!-- Product card row 1 -->
      <div class="product-container" id="product-slider">
        <?php
        for ($i = 0; $i < count($newProduct); $i++) {
          echo '<div class="product-card">';
          echo '<section class="ribbon">';
          echo '<div class="store-nike">';
          echo '<a href="">';
          echo '<img src="https://i.imgur.com/ljKPWN6.jpg" alt="logo-nike" /></a>';
          echo '</div>';
          echo '</section>';
          echo '<img src="https://i.imgur.com/gBfzpkA.jpg" alt="product1" class="product-icon" />';
          echo '<div class="product-name">';
          echo $newProduct[$i][1];
          echo '</div>';
          echo '<a href="' . 'templates/product/Product_homepage.php?id=' . $newProduct[$i][0] . '"';
          echo 'class="button">Buy now</a>';
          echo '</div>';
        }
        ?>
      </div>
      <!-- End product card row 1-->
    </div>
  </section>
  <!-- End new product -->
  <!-- Featured Store -->
  <section id="stores">
    <div class="container">
      <div class="stores-header">
        <h2>Feature Stores</h2>
      </div>
      <div class="store_grid">
        <?php
        for ($i = 0; $i < count($featureStore); $i++) {
          echo ' <div class="store">';
          echo '<figure>';
          echo '<a href="' . 'templates/store/Store_homepage.php?id=' . $featureStore[$i][0] . '">';
          echo '<img src="https://i.imgur.com/jIB3Op5.jpg" alt="store-image" /></a>';
          echo '<figcaption>';
          echo $featureStore[$i][1];
          echo '</figcaption>';
          echo '</figure>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </section>
  <!-- End featured store -->
  <!-- Featured Product -->
  <section id="products">
    <div class="container">
      <div class="products-header">
        <h2>Feature Products</h2>
      </div>
      <!-- Product card row 1 -->
      <div class="product-container" id="product-slider" style="margin-bottom: 20px">
        <?php
        for ($i = 0; $i < count($featureProduct); $i++) {
          echo '<div class="product-card">';
          echo '<section class="ribbon">';
          echo '<div class="store-nike">';
          echo '<a href="">';
          echo '<img src="https://i.imgur.com/ljKPWN6.jpg" alt="logo-nike" /></a>';
          echo '</div>';
          echo '</section>';
          echo '<img src="https://i.imgur.com/gBfzpkA.jpg" alt="product1" class="product-icon" />';
          echo '<div class="product-name">';
          echo $featureProduct[$i][1];
          echo '</div>';
          echo '<a href="' . 'templates/product/Product_homepage.php?id=' . $featureProduct[$i][0] . '"';
          echo 'class="button">Buy now</a>';
          echo '</div>';
        }
        ?>
      </div>
      <!-- End product card row 1-->
    </div>
  </section>
  <!-- End featured products -->
  <!-- Footer -->
  <footer class="page-footer">
    <div class="container">
      <div class="grid-container">
        <!-- Footer Logo -->
        <div class="grid-item"> <a href="index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /></a> </div>
        <!-- Quick Link -->
        <div class="grid-item inner-grid-container">
          <div class="grid-item"> <a href="templates/about.php">About Us</a> </div>
          <div class="grid-item"> <a href="templates/fees.php">Fees</a> </div>
          <div class="grid-item"> <a href="templates/browse-menu.php">Browse</a> </div>
          <div class="grid-item"> <a href="templates/term_of_services.php">Term of Service</a> </div>
          <div class="grid-item"> <a href="templates/account/account.php">Account</a> </div>
          <div class="grid-item"><a href="templates/faq.php">FAQs</a></div>
          <div class="grid-item"> <a href="templates/contact.php">Contact</a> </div>
          <div class="grid-item"> <a href="templates/privacy_policies.php">Privacy Policy</a> </div>
        </div>
        <!-- Social Link -->
        <div class="grid-item">
          <div class="social-buttons"> <a href=""><i class="fab fa-instagram circle-icon"></i></a> <a href=""><i class="fab fa-facebook circle-icon"></i></a> <a href=""><i class="fab fa-linkedin-in circle-icon"></i></a> <a href=""><i class="fab fa-twitter circle-icon"></i></a> </div>
        </div>
      </div>
      <hr />
      <!-- Copyright -->
      <p>&copy 2021 | RMIT University | Group 16</p>
    </div>
  </footer>
  <!-- JavaScript -->
  <!-- <script src="js/index.js"></script> -->
</body>

</html>