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
      <a href="../index.html"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" />
      </a>
    </div>
    <!-- Right menu -->
    <nav class="menu">
      <input type="checkbox" id="menuToggle" />
      <label for="menuToggle" class="menu-icon"><i class="fa fa-bars"></i></label>
      <ul>
        <a href="about.html">
          <li>About us</li>
        </a>
        <a href="fees.html">
          <li>Fees</li>
        </a>
        <a href="account/account.html">
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
        <a href="login-form.html">
          <li>Sign in</li>
        </a>
        <a href="cart.html" id="cart">
          <li>Cart</li>
        </a>
      </ul>
    </nav>
  </header>

  <!-- End header -->

  <div class="wrapper">
    <div class="drop-down-bar">
      <label id="browse">Browse by categories :</label>
      <form method="post" action="" id="myForm" class="form-categories">
        <select name="categories" onchange="onChange()">
          <option name="all" value="all" id="all" <?php if ($_POST['categories'] == 'all') echo 'selected'; ?>>All categories</option>
          <option name="shoes" value="shoes" id="shoes" <?php if ($_POST['categories'] == 'shoes') echo 'selected'; ?>>Shoes</option>
          <option name="watch" value="watch" id="watch" <?php if ($_POST['categories'] == 'watch') echo 'selected'; ?>>Watch</option>
          <option name="smartphone" value="smartphone" id="smartphone" <?php if ($_POST['categories'] == 'smartphone') echo 'selected'; ?>>Smart phone</option>
        </select>
      </form>
    </div>
  </div>
  <section id="stores">
    <div class="container">
      <!-- Store card row-->

      <div class="store-container">

        <?php
        if (isset($_POST['categories'])) {
          $select = $_POST['categories'];
          switch ($select) {
            case 'shoes':
              echo '<div class="store-card">';
              echo '<figure>';
              echo   '<a href="store/store_Nike.html">';
              echo    '<img src="https://i.imgur.com/SPU418r.jpg" alt="store1" class="store-icon" />';
              echo  '</a>';
              echo '</figure>';
              echo '<div class="store-name">Nike</div>';
              echo '<div class="store-description"></div>';
              echo '</div>';
              break;
            case 'watch':
              echo '<div class="store-card">';
              echo '<figure>';
              echo   '<a href="store/store_Rolex.html">';
              echo    '<img src="https://i.imgur.com/bpOtMwr.png" alt="store2" class="store-icon" />';
              echo  '</a>';
              echo '</figure>';
              echo '<div class="store-name">Rolex</div>';
              echo '<div class="store-description"></div>';
              echo '</div>';
              break;
            case 'smartphone':
              echo '<div class="store-card">';
              echo '<figure>';
              echo   '<a href="store/store_Apple.html">';
              echo    '<img src="https://i.imgur.com/pFWAXrC.jpg" alt="store3" class="store-icon" />';
              echo  '</a>';
              echo '</figure>';
              echo '<div class="store-name">Apple</div>';
              echo '<div class="store-description"></div>';
              echo '</div>';
              break;
            case 'all':
              echo '<div class="store-card">';
              echo '<figure>';
              echo   '<a href="store/store_Nike.html">';
              echo    '<img src="https://i.imgur.com/SPU418r.jpg" alt="store1" class="store-icon" />';
              echo  '</a>';
              echo '</figure>';
              echo '<div class="store-name">Nike</div>';
              echo '<div class="store-description"></div>';
              echo '</div>';
              echo '<div class="store-card">';
              echo '<figure>';
              echo   '<a href="store/store_Rolex.html">';
              echo    '<img src="https://i.imgur.com/bpOtMwr.png" alt="store2" class="store-icon" />';
              echo  '</a>';
              echo '</figure>';
              echo '<div class="store-name">Rolex</div>';
              echo '<div class="store-description"></div>';
              echo '</div>';
              echo '<div class="store-card">';
              echo '<figure>';
              echo   '<a href="store/store_Apple.html">';
              echo    '<img src="https://i.imgur.com/pFWAXrC.jpg" alt="store3" class="store-icon" />';
              echo  '</a>';
              echo '</figure>';
              echo '<div class="store-name">Apple</div>';
              echo '<div class="store-description"></div>';
              echo '</div>';
          }
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
          <a href="../index.html"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /></a>
        </div>
        <!-- Quick Link -->
        <div class="grid-item inner-grid-container">
          <div class="grid-item">
            <a href="about.html">About Us</a>
          </div>
          <div class="grid-item">
            <a href="fees.html">Fees</a>
          </div>
          <div class="grid-item"><a href="browse-menu.html">Browse</a></div>
          <div class="grid-item">
            <a href="term_of_services.html">Term of Service</a>
          </div>
          <div class="grid-item">
            <a href="account/account.html">Account</a>
          </div>
          <div class="grid-item"><a href="faq.html">FAQs</a></div>
          <div class="grid-item">
            <a href="contact.html">Contact</a>
          </div>
          <div class="grid-item">
            <a href="privacy_policies.html">Privacy Policy</a>
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