<?php
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
  <title>Browse by alphabet characters</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/browse-by-letters.module.css" />
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
        <a href="about.php">
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
        <a href="login-form.php">
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
    <div class="horizontal-line-1">
      <label id="browse-letter">Browse by letters :</label>
      <a href="browse-by-letters.html">a</a>
      <a href="browse-by-letters.html">b</a>
      <a href="browse-by-letters.html">c</a>
      <a href="browse-by-letters.html">d</a>
      <a href="browse-by-letters.html">e</a>
      <a href="browse-by-letters.html">f</a>
      <a href="browse-by-letters.html">g</a>
      <a href="browse-by-letters.html">h</a>
      <a href="browse-by-letters.html">i</a>
      <a href="browse-by-letters.html">j</a>
      <a href="browse-by-letters.html">k</a>
      <a href="browse-by-letters.html">l</a>
      <a href="browse-by-letters.html">m</a>
      <a href="browse-by-letters.html">n</a>
      <a href="browse-by-letters.html">o</a>
      <a href="browse-by-letters.html">p</a>
      <a href="browse-by-letters.html">q</a>
      <a href="browse-by-letters.html">r</a>
      <a href="browse-by-letters.html">s</a>
      <a href="browse-by-letters.html">t</a>
      <a href="browse-by-letters.html">u</a>
      <a href="browse-by-letters.html">v</a>
      <a href="browse-by-letters.html">w</a>
      <a href="browse-by-letters.html">x</a>
      <a href="browse-by-letters.html">y</a>
      <a href="browse-by-letters.html">z</a>
    </div>
  </div>
  <section id="stores">
    <div class="container">
      <!-- Store card row-->
      <div class="store-container">
        <div class="store-card">
          <figure>
            <a href="store/store_Rolex.html">
              <img src="https://i.imgur.com/bpOtMwr.png" alt="store1" class="store-icon" />
            </a>
          </figure>
          <div class="store-name">Rolex</div>
          <div class="store-description" style="text-align: center"></div>
        </div>
        <div class="store-card">
          <figure>
            <a href="store/store_Nike.html">
              <img src="https://i.imgur.com/SPU418r.jpg" alt="store2" class="store-icon" />
            </a>
          </figure>
          <div class="store-name">Nike</div>
          <div class="store-description"></div>
        </div>
        <div class="store-card">
          <figure>
            <a href="store/store_Apple.html">
              <img src="https://i.imgur.com/pFWAXrC.jpg" alt="store3" class="store-icon" />
            </a>
          </figure>
          <div class="store-name">Apple</div>
          <div class="store-description" style="text-align: center"></div>
        </div>
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
  <script src="../js/index.js"></script>
</body>

</html>