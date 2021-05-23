<?php require '../../php/store_home_require.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>

    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/store/store_homepage.module.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>
    <!-- Navigation bar -->
    <header>
        <!-- Logo -->
        <div class="brand"> <a href="../../index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /> </a> </div>
        <!-- Right menu -->
        <nav class="menu">
            <input type="checkbox" id="menuToggle" />
            <label for="menuToggle" class="menu-icon"><i class="fa fa-bars"></i></label>
            <ul>
                <a href="../about.php">
                    <li>About us</li>
                </a> <a href="../fees.php">
                    <li>Fees</li>
                </a> <a href="../account/account.php">
                    <li>Account</li>
                </a> <a href="../browse-menu.php">
                    <li>Browse</li>
                </a> <a href="../faq.php">
                    <li>FAQs</li>
                </a> <a href="../contact.php">
                    <li>Contact</li>
                </a> <a href="../login-form.php">
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

    <section id="products">
        <div class="container">
            <div class="products-header">
                <h2>
                    <?php
                    echo $product_store_name[0];
                    ?>
                </h2>
            </div>
        </div>
    </section>

    <!-- Feature product -->

    <section id="products">
        <div class="container">
            <div class="products-header">
                <h2>Feature Products</h2>
            </div>
            <!-- Product card row 1 -->
            <div class="product-container" id="product-slider" style="margin-bottom: 20px">
                <?php
                if (empty($featureProduct)) {
                    echo 'This store does not have any feature product';
                } else {
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
                        echo  $featureProduct[$i][0];
                        echo '</div>';
                        echo '<a href="' . '../product/Product_homepage.php?id=' . $featureProduct[$i][1] . '"';
                        echo 'class="button">Buy now</a>';
                        echo '</div>';
                    }
                }

                ?>
            </div>
            <!-- End product card row 1-->
        </div>
    </section>

    <!-- New product -->
    <section id="products">
        <div class="container">
            <div class="products-header">
                <h2>New Products</h2>
            </div>
            <!-- Product card row 1 -->
            <div class="product-container" id="product-slider">
                <?php
                if (empty($newProduct)) {
                    echo 'This store does not have any new product';
                } else {
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
                        echo '<a href="' . '../product/Product_homepage.php?id=' . $newProduct[$i][0] . '"';
                        echo 'class="button">Buy now</a>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <!-- End product card row 1-->
        </div>
    </section>
    <!-- End new product -->

    <!-- Footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="grid-container">
                <!-- Footer Logo -->
                <div class="grid-item"> <a href="../../index.php"><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img" /></a> </div>
                <!-- Quick Link -->
                <div class="grid-item inner-grid-container">
                    <div class="grid-item"> <a href="../about.php">About Us</a> </div>
                    <div class="grid-item"> <a href="../fees.php">Fees</a> </div>
                    <div class="grid-item"> <a href="../browse-menu.php">Browse</a> </div>
                    <div class="grid-item"> <a href="../term_of_services.php">Term of Service</a> </div>
                    <div class="grid-item"> <a href="../account/account.php">Account</a> </div>
                    <div class="grid-item"><a href="../faq.php">FAQs</a></div>
                    <div class="grid-item"> <a href="../contact.php">Contact</a> </div>
                    <div class="grid-item"> <a href="../privacy_policies.php">Privacy Policy</a> </div>
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

    <script type="text/javascript" src="../js/index.js"></script>

</body>

</html>