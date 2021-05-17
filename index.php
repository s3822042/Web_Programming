<?php
session_start();
set_time_limit(500);
error_reporting(E_ERROR | E_PARSE);
if (fopen('../php/install.php', 'r') != null) {
  exit("'install.php' still exists! Delete it to proceed!");
}


$store_csv = "./data/stores.csv";
$store_file = fopen($store_csv, "r");



$storeName = array();
$storeCreatedDate = array();
$isFeatured = array();

while (($store_row = fgetcsv($store_file)) !== FALSE) {
  // Read the data
  $storeName[] = trim($store_row[1]);
  $storeCreatedDate[] = trim($store_row[3]);
  $isFeatured[] = trim($store_row[4]);
}

function compareByTimeStamp($time1, $time2)
{
  date_format($time1, "Y/m/d H:i:s");
  date_format($time2, "Y/m/d H:i:s");
  if (strtotime($time1) < strtotime($time2))
    return 1;
  else if (strtotime($time1) > strtotime($time2))
    return -1;
  else
    return 0;
}
// remove the first element in array
$removed = array_shift($isFeatured);
$removed = array_shift($storeName);
$removed = array_shift($storeCreatedDate);



// STORE

$new_store_data = array_combine($storeName,  $storeCreatedDate);


uasort($new_store_data, function ($a, $b) use ($storeCreatedDate) {
  usort($storeCreatedDate, "compareByTimeStamp");
  return array_search($a, $storeCreatedDate) <=> array_search($b, $storeCreatedDate);
});

$sliceArrayStore = array_slice($new_store_data, 0, 5, true);
$newStore = array_keys($sliceArrayStore);


$featured_store_data = array_combine($storeName, $isFeatured);



$arr = array_diff($featured_store_data, array("FALSE"));


$featureStore = array_keys($arr);


fclose($store_file);


// PRODUCT

$product_csv = "./data/products.csv";
$product_file = fopen($product_csv, "r");

$productName = array();
$productCreatedDate = array();
$isFeaturedProduct = array();


while (($product_row = fgetcsv($product_file)) !== FALSE) {
  // Read the data
  $productName[] = trim($product_row[1]);
  $productCreatedDate[] = trim($product_row[3]);

  $isFeaturedProduct[] = trim($product_row[5]);
}

// remove the first element in array
$removed = array_shift($isFeaturedProduct);
$removed = array_shift($productName);
$removed = array_shift($productCreatedDate);





$new_product_data = array_combine($productCreatedDate,  $productName);




uasort($new_product_data, function ($c, $d) use ($productCreatedDate) {
  usort($productCreatedDate, "compareByTimeStamp");
  return array_search($c, $productCreatedDate) <=> array_search($d, $productCreatedDate);
});

$sliceArrayProduct = array_slice($new_product_data, 0, 5, true);
$newProduct = array_values($sliceArrayProduct);


$featured_product_data = array_combine($productName, $isFeaturedProduct);



$arr2 = array_diff($featured_product_data, array("FALSE"));


$featureProduct = array_keys($arr2);

print_r($featuredProduct);


fclose($product_file)

?>


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
    <div class="brand">
      <a href="index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" />
      </a>
    </div>
    <!-- Right menu -->
    <nav class="menu">
      <input type="checkbox" id="menuToggle" />
      <label for="menuToggle" class="menu-icon"><i class="fa fa-bars"></i></label>
      <ul>
        <a href="templates/about.php">
          <li>About us</li>
        </a>
        <a href="templates/fees.html">
          <li>Fees</li>
        </a>
        <a href="templates/account/account.php">
          <li>Account</li>
        </a>
        <a href="templates/browse-menu.html">
          <li>Browse</li>
        </a>
        <a href="templates/faq.html">
          <li>FAQs</li>
        </a>
        <a href="templates/contact.html">
          <li>Contact</li>
        </a>
        <a href="templates/login-form.php">
          <li>Sign in</li>
        </a>
        <a href="templates/cart.php" id="cart">
          <li>Cart</li>
        </a>
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

      <?php
      for ($i = 0; $i < count($newStore); $i++) {
        echo ' <div class="store">';
        echo '<figure>';
        echo '<a href="">';
        echo '<img src="https://i.imgur.com/jIB3Op5.jpg" alt="store-image" /></a>';
        echo '<figcaption>';
        echo $newStore[$i];
        echo '</figcaption>';
        echo '</div>';
      }
      ?>

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
          echo '<div class="product-card" onmouseover="pauseSlides()" onmouseout="startSlides()">';
          echo '<section class="ribbon">';
          echo '<div class="store-nike">';
          echo '<a href="">';
          echo '<img src="https://i.imgur.com/ljKPWN6.jpg" alt="logo-nike" /></a>';
          echo '</div>';
          echo '</section>';
          echo '<img src="https://i.imgur.com/gBfzpkA.jpg" alt="product1" class="product-icon" />';
          echo '<div class="product-name">';
          echo $newProduct[$i];
          echo '</div>';
          echo '<a href="templates\product\air-zoom-tempo.html" class="button">Buy now</a>';
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
        <h2>Featured Store</h2>
      </div>
      <?php
      for ($i = 0; $i < count($featureStore); $i++) {
        echo ' <div class="store">';
        echo '<figure>';
        echo '<a href="">';
        echo '<img src="https://i.imgur.com/jIB3Op5.jpg" alt="store-image" /></a>';
        echo '<figcaption>';
        echo $featureStore[$i];
        echo '</figcaption>';
        echo '</div>';
      }
      ?>
    </div>
  </section>
  <!-- End featured store -->
  <!-- Featured Product -->
  <section id="products">
    <div class="container">
      <div class="products-header">
        <h2>Featured Products</h2>
      </div>
      <?php
      for ($i = 0; $i < count($featureProduct); $i++) {
        echo '<div class="product-card" onmouseover="pauseSlides()" onmouseout="startSlides()">';
        echo '<section class="ribbon">';
        echo '<div class="store-nike">';
        echo '<a href="">';
        echo '<img src="https://i.imgur.com/ljKPWN6.jpg" alt="logo-nike" /></a>';
        echo '</div>';
        echo '</section>';
        echo '<img src="https://i.imgur.com/gBfzpkA.jpg" alt="product1" class="product-icon" />';
        echo '<div class="product-name">';
        echo $featureProduct[$i];
        echo '</div>';
        echo '<a href="templates\product\air-zoom-tempo.html" class="button">Buy now</a>';
      }
      ?>
    </div>
    </div>
  </section>
  <!-- End featured products -->
  <!-- Footer -->
  <footer class="page-footer">
    <div class="container">
      <div class="grid-container">
        <!-- Footer Logo -->
        <div class="grid-item">
          <a href="index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /></a>
        </div>
        <!-- Quick Link -->
        <div class="grid-item inner-grid-container">
          <div class="grid-item">
            <a href="templates/about.php">About Us</a>
          </div>
          <div class="grid-item">
            <a href="templates/fees.html">Fees</a>
          </div>
          <div class="grid-item">
            <a href="templates/browse-menu.html">Browse</a>
          </div>
          <div class="grid-item">
            <a href="templates/term_of_services.php">Term of Service</a>
          </div>
          <div class="grid-item">
            <a href="templates/account/account.php">Account</a>
          </div>
          <div class="grid-item"><a href="templates/faq.html">FAQs</a></div>
          <div class="grid-item">
            <a href="templates/contact.html">Contact</a>
          </div>
          <div class="grid-item">
            <a href="templates/privacy_policies.php">Privacy Policy</a>
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
  <script src="js/index.js"></script>
</body>

</html>
