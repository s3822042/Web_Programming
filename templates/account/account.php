<?php require "../../php/account_require.php"?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Account</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/account/account.module.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>
  <!-- Navigation bar -->
  <header>
    <!-- Logo -->
    <div class="brand">
      <a href="../../index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" />
      </a>
    </div>
    <!-- Right menu -->
    <nav class="menu">
      <input type="checkbox" id="menuToggle" />
      <label for="menuToggle" class="menu-icon"><i class="fa fa-bars"></i></label>
      <ul>
        <a href="../about.php">
          <li>About us</li>
        </a>
        <a href="../fees.php">
          <li>Fees</li>
        </a>
        <a href="account.php">
          <li>Account</li>
        </a>
        <a href="../browse-menu.php">
          <li>Browse</li>
        </a>
        <a href="../faq.php">
          <li>FAQs</li>
        </a>
        <a href="../contact.php">
          <li>Contact</li>
        </a>
        <a href="../login-form.php">
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
                echo '<a href="../cart.php" style="color:red;"><li>Cart: <span>'.$cartNum.'</span></li></a>';
            // if the array is empty
            } else {
                echo '<a href="../cart.php" ><li>Cart</li></a>';
            }
        ?>
      </ul>
    </nav>
  </header>

  <!-- End header -->
  <!--body part-->
  <div class="body_container">
    <div>
      <p>Homepage/<a href="account.html">My account</a></p>
      <br />
      <h1>My account</h1>
      <div class="account_body">
        <!--Left nav bar-->
        <div class="account_nav">
          <div class="account_nav_current_state">
            <a href="account.html">My details</a>
          </div>
          <div class="account_nav_item">
            <a href="past_transaction.html">Past transaction</a>
          </div>
        </div>
        <!--The right main content-->
        <div class="account_main_content">
          <h1>My details</h1>
          <p>Personal information</p>
          <div class="separator"></div>
          <form>
            <!--my details-->
            <div class="personal_detail">
              <div>
                <img src="https://i.imgur.com/dnHWRnW.png" class="avatar" alt="avatar" />
              </div>
              <div class="information_box">
                <p>Name:</p>
                <input class="information_text" type="text" name="name" id="name" value="Nguyen The Minh" />
                <p>Age:</p>
                <input class="information_text" type="text" name="age" id="age" value="19" />
                <p>Phone number:</p>
                <input class="information_text" type="tel" name="phone_number" id="phone_number" value="0989485629" />
                <p>Birthday:</p>
                <input class="information_text" type="date" name="dob" id="dob" value="19/06/2002" />
                <p>Gender:</p>
                <span class="radio-box">
                  <input type="radio" name="gender" id="gender" value="male" checked />
                  <label for="gender">Male</label>
                  <input type="radio" name="gender" id="gender" value="male" />
                  <label for="gender">Female</label>
                </span>
              </div>
            </div>
            <!--the email address-->
          </form>
          <br />
          <!--Email address-->
          <p>Email Address</p>
          <div class="separator"></div>
          <form>
            <div class="personal_detail">
              <div></div>
              <div class="information_box">
                <p>Email address:</p>
                <input class="information_text" type="text" name="email" id="email" />
              </div>
            </div>
          </form>

          <!--Password-->
          <p>Password</p>
          <div class="separator"></div>
          <form method="post">
            <div class="personal_detail">
              <div></div>
              <div class="information_box">
                <p>Password:</p>
                <input class="information_text" type="password" name="password" id="password" />
              </div>
            </div>
            <div style="display: flex; justify-content: flex-start;">
              <input type="submit" name="hit-button" value="Save" class="submit_button" />
              <input type="submit" name="hit-button" value="Log Out" class="submit_button" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="page-footer">
    <div class="container">
      <div class="grid-container">
        <!-- Footer Logo -->
        <div class="grid-item">
          <a href="../../index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /></a>
        </div>
        <!-- Quick Link -->
        <div class="grid-item inner-grid-container">
          <div class="grid-item">
            <a href="../about.php">About Us</a>
          </div>
          <div class="grid-item">
            <a href="../fees.php">Fees</a>
          </div>
          <div class="grid-item">
            <a href="../browse-menu.php">Browse</a>
          </div>
          <div class="grid-item">
            <a href="../term_of_services.php">Term of Service</a>
          </div>
          <div class="grid-item">
            <a href="account.php">Account</a>
          </div>
          <div class="grid-item"><a href="../faq.php">FAQs</a></div>
          <div class="grid-item">
            <a href="../contact.php">Contact</a>
          </div>
          <div class="grid-item">
            <a href="../privacy_policies.php">Privacy Policy</a>
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
</body>

</html>