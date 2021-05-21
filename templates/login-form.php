 <?php
ob_start();
session_start();
function encrypt_decrypt($string, $action = 'encrypt')
{
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
  $secret_iv = '5fgf5HJ5g27'; // user define secret key
  $key = hash('sha256', $secret_key);
  $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
  if ($action == 'encrypt') {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if ($action == 'decrypt') {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }
  return $output;
}
error_reporting(E_ERROR | E_PARSE);
if (fopen('../php/install.php', 'r') != null) {
  exit("'install.php' still exists! Delete it to proceed!");
}

// echo '<h2>log in values</h2>';
// echo '<pre>';
// echo $adminUsername;
// echo $adminPass;
// echo '</pre>';

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

if (isset($_POST['log-in-hit'])) {
    $adminUsername = "";
	$adminPass = "";
	$datafile = fopen('../php/data.txt', 'r');
	if ($datafile) {
		$adminUsername = trim(fgets($datafile));
		$adminPass = trim(encrypt_decrypt(fgets($datafile), 'decrypt'));
	} else {
		exit("Cannot find data.txt!");
	}

	if (isset($_POST['email']) && $_POST['email'] == $adminUsername && isset($_POST['pwd']) && $_POST['pwd'] == $adminPass) {
	$_SESSION['admin_username'] = $_POST['email'];
		unset($_POST);
		header('location: CMS.php');
	} 
	else if (isset($_POST['email']) && $_POST['email'] == $_SESSION['sign-up-email'] && isset($_POST['pwd']) && $_POST['pwd'] == $_SESSION['sign-up-confirm-password']) {
		$_SESSION['user'] = $_POST['email'];
		unset($_SESSION['admin_username']);
		unset($_SESSION['sign-up-email']);
		unset($_SESSION['sign-up-confirm-password']);
    } 
	else {
		unset($_POST);
      	header('location: account/account.php');
    }
} 
  fclose($datafile);
?>

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
        <a href="cart.php" id="cart">
          <li>Cart</li>
        </a>
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
          <a href="forgot-password.html">Forgot your password?</a>
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

  <!-- JavaScript-->
  <script src="../js/index.js"></script>
</body>

</html>