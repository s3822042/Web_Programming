<?php require '../php/browse_cate_require.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Browse by categories</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/browse-by-cate.module.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>
  <!-- Navigation bar -->
  <header>
    <!-- Logo -->
    <div class="brand">
      <a href="../index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" />
      </a>
    </div>
    <!-- Right menu -->
    <nav class="menu">
      <input type="checkbox" id="menuToggle" />
      <label for="menuToggle" class="menu-icon"><i class="fa fa-bars"></i></label>
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

  <div class="wrapper">
    <div class="drop-down-bar">
      <label id="browse">Browse by categories :</label>
      <br><br>
      <form method="post" action="browse-by-cate.php" id="myForm">
        <div class="select">
          <select name="categories" class="select-option">
            <option <?php if ($_POST['categories'] == 'Department stores') echo 'selected'; ?>>Department stores</option>
            <option <?php if ($_POST['categories'] == 'Grocery stores') echo 'selected'; ?>>Grocery stores</option>
            <option <?php if ($_POST['categories'] == 'Restaurants') echo 'selected'; ?>>Restaurants</option>
            <option <?php if ($_POST['categories'] == 'Clothing stores') echo 'selected'; ?>>Clothing stores</option>
            <option <?php if ($_POST['categories'] == 'Accessory stores') echo 'selected'; ?>>Accessory stores</option>
            <option <?php if ($_POST['categories'] == 'Pharmacies') echo 'selected'; ?>>Pharmacies</option>
            <option <?php if ($_POST['categories'] == 'Technology stores') echo 'selected'; ?>>Technology stores</option>
            <option <?php if ($_POST['categories'] == 'Pet stores') echo 'selected'; ?>>Pet stores</option>
            <option <?php if ($_POST['categories'] == 'Toy Stores') echo 'selected'; ?>>Toy stores</option>
            <option <?php if ($_POST['categories'] == 'Specialty stores') echo 'selected'; ?>>Specialty stores</option>
            <option <?php if ($_POST['categories'] == 'Thrift stores') echo 'selected'; ?>>Thrift stores</option>
            <option <?php if ($_POST['categories'] == 'Services') echo 'selected'; ?>>Services</option>
            <option <?php if ($_POST['categories'] == 'Kiosks') echo 'selected'; ?>>Kiosks</option>
          </select>
        </div>
        <input type="submit" name="hit-button" value="Submit" id="submit-browse-button">
      </form>
    </div>
  </div>
  <section id="stores">
    <div class="container">
      <!-- Store card row-->

      <div class="store-container">

        <?php
        for ($i = 0; $i < count($browse_cate); $i++) {
          echo '<div class="store-card">';
          echo '<figure>';
          echo '<a href="./store/Store_homepage.php?id='.$browse_cate[$i][0].'">';
          echo '<img src="https://i.imgur.com/SPU418r.jpg" alt="store1" class="store-icon" />';
          echo '</a>';
          echo '</figure>';
          echo '<div class="store-name">';
          echo $browse_cate[$i][1];
          echo '</div>';
          echo '</div>';
        }

        ?>
      </div>
      <!-- End store card row-->
    </div>
  </section>

  <!-- Footer -->
  <footer class="page-footer">
    <div class="container">
      <div class="grid-container">
        <!-- Footer Logo -->
        <div class="grid-item">
          <a href="../index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /></a>
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
