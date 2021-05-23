<?php require '../php/login_require.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../css/login-form.module.css" />
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
  <section id="wrapper">
    <h1>Login</h1>
    <div class="form">
      <form method="post" name="loginForm" action="login-form.php">
        <div class="field-wrapper">
          <label for="email"></label>
          <input type="text" name="email" id="email" placeholder="Email address" onclick="this.value=''" onkeypress="this.style.color='black'"
		  		<?php
				  	if (isset($_POST['email']) && $_POST['pwd'])
					  {
						if ($_POST['email'] != $_SESSION['sign-up-email'] && $_POST['pwd'] != $_SESSION['sign-up-confirm-password']) {
							echo ' value='.'"Unknown email AND password!"';
							echo ' style="color: red;"';
						}
						else if ($_POST['email'] != $_SESSION['sign-up-email']) 
						{
							echo ' value='.'"Unknown email!"';
							echo ' style="color: red;"';
						}
						else if ($_POST['pwd'] != $_SESSION['sign-up-confirm-password']) {
							echo ' value='.'"Please check your password!"';
							echo ' style="color: red;"';
						}
					  }
				?>
		  required/>
        </div>
        <div class="field-wrapper">
          <label for="password"></label>
          <input type="password" name="pwd" id="pwd" placeholder="Password" onclick="this.value=''" onkeypress="this.style.color='black'" required/>
        </div>

        <div class="button">
          <button type="submit" name="log-in-hit" value="submit">Log in</button>
        </div>
        <div class="register">
          <a href="sign-up-form.php">Register</a>
        </div>
        <div class="password-reset">
          <a href="">Forgot your password?</a>
        </div>
      </form>
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

  <!-- JavaScript-->
  <script src="../js/index.js"></script>
</body>

</html>