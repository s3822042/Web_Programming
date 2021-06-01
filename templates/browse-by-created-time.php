<?php require "../php/browse_time_require.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Browse by created time</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/browse-by-time.module.css" />
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
        <a href="about.php">
          <li>About us</li>
        </a>
        <a href="fees.php">
          <li>Fees</li>
        </a>
        <a href="account/account.php">
          <li>Account</li>
        </a>
        <a href="browse-menu.php">
          <li>Browse</li>
        </a>
        <a href="faq.php">
          <li>FAQs</li>
        </a>
        <a href="contact.php">
          <li>Contact</li>
        </a>
        <a href="login-form.php">
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
  <!--end header-->
  <section id="products">
        <div class="container">
            <div class="products-header">
                <h2>Browse products by created time <br><br> <?php echo $product_store_name[(int)$your_id[1]];?>
				</h2>
            </div>
            <!-- Product card row 1 -->
            <div class = "browse-by-time-product-container">
                <div class = "changepage">
                  <?php
                    if((int)$your_id[2] > 0){
                    echo '<a href="browse-by-created-time.php?id='.$your_id[1] . '='. ((int)$your_id[2]-1) .'"class="previous button">&laquo;</a>';
                    };
                  ?>
                </div>
                <div class="product-container" id="product-slider" style="margin-bottom: 20px">
                  <?php
                    for ($i = 0; $i < 2; $i++) {
                      if (!empty($productsCreatedDate[(int)$your_id[2]*2 + $i])) 
                      {
                        echo '<div class="product-card">';
                        echo '<section class="ribbon">';
                        echo '<div class="store-nike">';
                        echo '<a href="">';
                        echo '<img src="https://i.imgur.com/ljKPWN6.jpg" alt="logo-nike" /></a>';
                        echo '</div>';
                        echo '</section>';
                        echo '<img src="https://i.imgur.com/gBfzpkA.jpg" alt="product1" class="product-icon" />';
                        echo '<div class="product-name">';
                        echo $productsCreatedDate[(int)$your_id[2]*2 + $i][1];
                        echo '</div>';
                        echo '<a href="' . 'product/Product_homepage.php?id=' . $productsCreatedDate[(int)$your_id[2]*2 + $i][0] . '"';
                        echo 'class="button">Buy now</a>';
                        echo '</div>';
                      }
                    }
                  ?>
                </div>
                <div class = "changepage">
                  <?php
                    if((int)$your_id[2] < (count($productsCreatedDate)/2)-1){
                    echo '<a href="'.'browse-by-created-time.php?id='. $your_id[1] . '='. ((int)$your_id[2]+1) .'" class="next button">&raquo;</a>';
                    };
                  ?>
                </div>
            </div>
            <div class = "choose_page">
            <?php
              if(count($productsCreatedDate)>2){        
                for ($m = 0; $m < count($productsCreatedDate)/2 ; $m++){
                    $msg = '';
                              $msg .= '<div class= "page_number2"><a href="' . 'browse-by-created-time.php?id=' . $your_id[1]. '='. $m .'" class="next button"';
                    if ($m == $your_id[2]) $msg .= ' style="background-color: #000;"';
                    $msg .= '>' . ($m + 1) . '</a></div>';
                    echo $msg;
                  }
              } 
              ?>
            </div>
            <!-- End product card row 1-->
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