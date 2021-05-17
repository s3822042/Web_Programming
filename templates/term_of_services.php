<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

if (fopen('../php/install.php', 'r') != null) {
  exit("'install.php' still exists! Delete it to proceed!");
}

// echo '<h2>$_SESSION values</h2>';
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
// echo '<hr>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Term & Conditions</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/term_of_services.module.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <style>
    .container_content>p {
      text-align: justify;
    }
  </style>
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
        <a href="cart.php" id="cart">
          <li>Cart</li>
        </a>
      </ul>
    </nav>
  </header>
  <!-- End header -->
  <main class="wrap">
    <section class="container-fluid">
      <div class="container_heading">
        <h2>TERMS & CONDITIONS</h2>
      </div>
      <div class="container_content">
        <h4>Generic Terms of Service Template</h4>
        <p>
          Please read these terms of service carefully before using website
          operated by The Mall Express.
        </p>
        <h4>Conditions of Use</h4>
        <p>
          <?php
          if (isset($_SESSION['content1-ts'])) {
            echo $_SESSION['content1-ts'];
          } else {
            echo 'We will provide their services to you, which are subject to the conditions stated below in this document. Every time you visit this website, use its services or make a purchase, you accept the following conditions. This is why we urge you to read them carefully.';
          }
          ?>
        </p>
        <h4>Privacy Policy</h4>
        <p>
          <?php
          if (isset($_SESSION['content2-ts'])) {
            echo $_SESSION['content2-ts'];
          } else {
            echo 'Before you continue using our website we advise you to read our <a href="privacy_policies.php">privacy policy</a> regarding our user data collection. It will help you better understand our practices.';
          }
          ?>
        </p>
        <h4>Copyright</h4>
        <p>
          <?php
          if (isset($_SESSION['content3-ts'])) {
            echo $_SESSION['content3-ts'];
          } else {
            echo 'Content published on this website (digital downloads, images, texts, graphics, logos) is the property of Mall Express and/or its content creators and protected by international copyright laws. The entire compilation of the content found on this website is the exclusive property of Mall Express and/or its contributors, with copyright authorship for this compilation by Mall Express.';
          }
          ?>
        </p>
        <h4>Communications</h4>
        <p>
          <?php
          if (isset($_SESSION['content4-ts'])) {
            echo $_SESSION['content4-ts'];
          } else {
            echo 'The entire communication with us is electronic. Every time you send us an email or visit our website, you are going to be communicating with us. You hereby consent to receive communications from us. If you subscribe to the news on our website, you are going to receive regular emails from us. We will continue to communicate with you by posting news and notices on our website and by sending you emails. You also agree that all notices, disclosures, agreements and other communications we provide to you electronically meet the legal requirements that such communications be in writing.';
          }
          ?>
        </p>
        <h4>Applicable Law</h4>
        <p>
          <?php
          if (isset($_SESSION['content5-ts'])) {
            echo $_SESSION['content5-ts'];
          } else {
            echo 'By visiting this website, you agree that the laws of the Vietnamese government, without regard to principles of conflict laws, will govern these terms of service, or any dispute of any sort that might come between Mall Express and you, or its business partners and associates.';
          }
          ?>
        </p>
        <h4>Disputes</h4>
        <p>
          <?php
          if (isset($_SESSION['content6-ts'])) {
            echo $_SESSION['content6-ts'];
          } else {
            echo 'Any dispute related in any way to your visit to this website or to products you purchase from us shall be arbitrated by state or federal court Vietnamese Government and you consent to exclusive jurisdiction and venue of such courts.';
          }
          ?>
        </p>
        <h4>Comments, Reviews, and Emails</h4>
        <p>
          <?php
          if (isset($_SESSION['content7-ts'])) {
            echo $_SESSION['content7-ts'];
          } else {
            echo 'Visitors may post content as long as it is not obscene, illegal, defamatory, threatening, infringing of intellectual property rights, invasive of privacy or injurious in any other way to third parties. Content has to be free of software viruses, political campaign, and commercial solicitation. We reserve all rights (but not the obligation) to remove and/or edit such content. When you post your content, you grant Mall Express non-exclusive, royalty-free and irrevocable right to use, reproduce, publish, modify such content throughout the world in any media.';
          }
          ?>
        </p>
        <h4>License and Site Access</h4>
        <p>
          <?php
          if (isset($_SESSION['content8-ts'])) {
            echo $_SESSION['content8-ts'];
          } else {
            echo 'We grant you a limited license to access and make personal use of this website. You are not allowed to download or modify it. This may be done only with written consent from us.';
          }
          ?>
        </p>
        <h4>User Account</h4>
        <p>
          <?php
          if (isset($_SESSION['content9-ts'])) {
            echo $_SESSION['content9-ts'];
          } else {
            echo 'If you are an owner of an account on this website, you are solely responsible for maintaining the confidentiality of your private user details (username and password). You are responsible for all activities that occur under your account or password.';
          }
          ?>
        </p>
        <p>
          We reserve all rights to terminate accounts, edit or remove content
          and cancel orders in their sole discretion.
        </p>
      </div>
      <div class="container_nav">
        <small>By clicking 'Accept', you agreed to our Terms & Conditions.</small>
        <a class="button-btn" href="#">Accept</a>
      </div>
    </section>
  </main>
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
          <div class="grid-item"><a href="account/account.php">Account</a></div>
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