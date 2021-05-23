<?php require '../../php/product_home_require.php'?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/product/product.module.css" />
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


    <!-- MAIN -->
    <div id="slider" class="slider">

        <!-- SLIDE 1 -->
        <div class="row fullheight slide">
            <div class="col-6 fullheight">
                <!-- PRODUCT INFO -->
                <div class="product-info">
                    <div class="info-wrapper">
                        <div class="product-price left-to-right">
                            <span style="color:black">$<?php
                                                        echo $bigArray[(int)$your_id[1]][2];
                                                        ?></span>
                        </div>
                        <div class="product-name left-to-right">
                            <h2>
                                <?php echo $bigArray[(int)$your_id[1]][1]; ?>
                            </h2>
                        </div>
                        <div class="button left-to-right">
                            <form method="post" name="addProductForm" <?php echo 'action="Product_homepage.php'.'?id='.$your_id[1].'"'; ?>>
                                <label id="quantity-input-label" for="quantity-input">Quantity:</label>
                                <input type="number" name="quantity" id="quantity-input" min="0" value="0" onfocus="this.value=''"> <br>
                                <input type="submit" id="add-to-cart-button" name="button" value="Add To Cart">
                            </form>
                        </div>
                    </div> 
                </div>
                <!-- END PRODUCT INFO -->
            </div>
            <div class="col-6 fullheight img-col" style="background-image: linear-gradient(to top right, #e19e95, #fd835c)">
                <!-- PRODUCT IMAGE -->
                <div class="product-img">
                    <div class="img-wrapper right-to-left">
                        <div class="bounce">
                            <img src="../../assets/zoomx-vaporfly-next-running-shoe-4Q5jfG.png" alt="placeholder+image">
                        </div>
                    </div>
                </div>
                <!-- END PRODUCT IMAGE -->
                <!-- PRODUCT MORE IMAGES -->
                <div class="more-images">
                    <div class="more-images-item bottom-up">
                        <img src="../../assets/zoomx-vaporfly-next-running-shoe-4Q5jfG-1.jpg" alt="placeholder+image">
                    </div>
                    <div class="more-images-item bottom-up">
                        <img src="../../assets/zoomx-vaporfly-next-running-shoe-4Q5jfG (1).jpg" alt="placeholder+image">
                    </div>
                    <div class="more-images-item bottom-up">
                        <img src="../../assets/zoomx-vaporfly-next-running-shoe-4Q5jfG (3).jpg" alt="placeholder+image">
                    </div>
                    <div class="more-images-item bottom-up">
                        <img src="../../assets/zoomx-vaporfly-next-running-shoe-4Q5jfG (4).jpg" alt="placeholder+image">
                    </div>
                </div>
                <!-- ENDPRODUCT MORE IMAGES -->
            </div>
        </div>
        <!-- END SLIDE 1 -->



        <!-- SLIDE CONTROL -->
        <div id="slide-control" class="slide-control">
            <div class="slide-control-item">
                <img src="../../assets/zoomx-vaporfly-next-running-shoe-4Q5jfG.png" alt="placeholder+image">
            </div>
        </div>
        <!-- END SLIDE CONTROL -->
    </div>
    <!-- END MAIN -->

    <!-- MODAL -->
    <div id="modal" class="modal">
        <span id="modal-close" class="close">&times;</span>
        <img id="modal-content" class="modal-content">
        <div class="more-images">
            <div class="more-images-item">
                <img class="img-preview">
            </div>
            <div class="more-images-item">
                <img class="img-preview">
            </div>
            <div class="more-images-item">
                <img class="img-preview">
            </div>
            <div class="more-images-item">
                <img class="img-preview">
            </div>
        </div>
    </div>
    <!-- END MODAL -->

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
    <script type="text/javascript" src="../../js/product.js"></script>
</body>

</html>