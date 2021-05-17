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
    <title>About Us</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/about.module.css" />
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
    <!-- Tittle -->
    <div id="title">
        <p>WE ARE TEAM 16</p>
    </div>
    <!-- Carousel -->
    <div class="carousel">
        <div class="carousel-inner">
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked" />
            <div class="carousel-item">
                <img src="https://i.imgur.com/sKV54PO.jpeg" alt="banner1" />
            </div>
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="" />
            <div class="carousel-item">
                <img src="https://i.imgur.com/sKV54PO.jpeg" alt="banner2" />
            </div>
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="" />
            <div class="carousel-item">
                <img src="https://i.imgur.com/sKV54PO.jpeg" alt="banner3" />
            </div>
            <label for="carousel-3" class="carousel-control prev control-1">‹</label>
            <label for="carousel-2" class="carousel-control next control-1">›</label>
            <label for="carousel-1" class="carousel-control prev control-2">‹</label>
            <label for="carousel-3" class="carousel-control next control-2">›</label>
            <label for="carousel-2" class="carousel-control prev control-3">‹</label>
            <label for="carousel-1" class="carousel-control next control-3">›</label>
            <ol class="carousel-indicators">
                <li>
                    <label for="carousel-1" class="carousel-bullet">•</label>
                </li>
                <li>
                    <label for="carousel-2" class="carousel-bullet">•</label>
                </li>
                <li>
                    <label for="carousel-3" class="carousel-bullet">•</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- Tittle -->
    <div id="title">
        <p>MEMBERS</p>
    </div>
    <hr class="pill" />
    <!-- Profile card -->
    <div class="profile-container">
        <div class="profile-card">
            <img src=<?php
                        if (isset($_SESSION['luan'])) {
                            echo $_SESSION['luan'];
                        } else {
                            echo "https://i.imgur.com/wnuKAT5.jpg";
                        }
                        ?> alt="image1" class="profile-icon" id="Luan-Vo-picture" onclick="openmodal('LuanVo'); " />
            <div class="profile-name ">Luan Vo</div>
            <div class="profile-position ">Web Designer</div>
            <a href="mailto:s3822042@rmit.edu.vn " class="button ">Connect</a>
        </div>
        <div class="profile-card ">
            <img src=<?php
                        if (isset($_SESSION['andrew'])) {
                            echo $_SESSION['andrew'];
                        } else {
                            echo "https://i.imgur.com/WfzZhTt.jpg";
                        }
                        ?> alt="image2 " class="profile-icon " id="Andrew-picture " onclick="openmodal('Andrew'); " />
            <div class="profile-name ">An Le</div>
            <div class="profile-position ">Web Developer</div>
            <a href="mailto:s3820098@rmit.edu.vn " class="button ">Connect</a>
        </div>
        <div class="profile-card ">
            <img src=<?php
                        if (isset($_SESSION['minh'])) {
                            echo $_SESSION['minh'];
                        } else {
                            echo "https://i.imgur.com/cv75nwp.jpg";
                        }
                        ?> alt="image3 " class="profile-icon " id="Minh-Nguyen-picture " onclick="openmodal('MinhNguyen'); " />
            <div class=" profile-name ">Minh Nguyen</div>
            <div class="profile-position ">Web Developer</div>
            <a href="mailto:s3878434@rmit.edu.vn " class="button ">Connect</a>
        </div>
        <div class="profile-card ">
            <img src=<?php
                        if (isset($_SESSION['huy'])) {
                            echo $_SESSION['huy'];
                        } else {
                            echo "https://i.imgur.com/HqKscdf.jpg";
                        }
                        ?> alt="image4 " class="profile-icon " id="Huy-Duong-picture " onclick="openmodal('HuyDuong'); " />
            <div class="profile-name ">Huy Duong</div>
            <div class="profile-position ">Web Developer</div>
            <a href="# " class="button ">Connect</a>
        </div>
    </div>
    <div class="modal-window " id="LuanVo" onclick="offmodal('LuanVo')">
        <div class="modal-header">
            <div class="title ">Vo Thanh Luan</div>
        </div>
        <div class="modal-body">
            <div>
                <img src=<?php
                            if (isset($_SESSION['luan'])) {
                                echo $_SESSION['luan'];
                            } else {
                                echo "https://i.imgur.com/wnuKAT5.jpg";
                            }
                            ?> alt="image4 " class="avatar">
            </div>
            <div class="basic-information">
                <p>Age: </p>
                <p>20</p>
                <p>Email:</p>
                <p>s3822042@rmit.edu.vn </p>
                <p>Dream job: </p>
                <p>Software Engineer</p>
            </div>
        </div>
        <div class='description'>
            <p>Description:</p>
            <p>Highly motivated and passionate in the field of Computer Science with experience in Java, Python Programming Language, and Data Analysis skills. Interested in machine learning, data science, and UI/UX design fields. Seeking for an internship
                to further hone my skill-set. I am a hardworking, reliable individual looking for an entry-level position in the industry</p>
        </div>
    </div>
    <div class="modal-window" id="HuyDuong" onclick="offmodal('HuyDuong')">
        <div class="modal-header">
            <div class="title ">Duong Tu Huy</div>
        </div>
        <div class="modal-body">
            <div>
                <img src=<?php
                            if (isset($_SESSION['huy'])) {
                                echo $_SESSION['huy'];
                            } else {
                                echo "https://i.imgur.com/HqKscdf.jpg";
                            }
                            ?> alt="image4 " class="avatar">
            </div>
            <div class="basic-information">
                <p>Age: </p>
                <p>21</p>
                <p>Email:</p>
                <p>s3791161@rmit.edu.vn </p>
                <p>Dream job: </p>
                <p>Blockchain game field, especially Sky Mavis company</p>
            </div>
        </div>
        <div class='description'>
            <p>Description:</p>
            <p>I am a sophomore in RMIT University. I have been interested in computer and coding. My major is Software Engineering.</p>
        </div>
    </div>
    <div class="modal-window" id="Andrew" onclick="offmodal('Andrew')">
        <div class="modal-header">
            <div class="title ">Le Nguyen Truong An</div>
        </div>
        <div class="modal-body">
            <div>
                <img src=<?php
                            if (isset($_SESSION['andrew'])) {
                                echo $_SESSION['andrew'];
                            } else {
                                echo "https://i.imgur.com/WfzZhTt.jpg";
                            }
                            ?> alt="image4 " class="avatar">
            </div>
            <div class="basic-information">
                <p>Age: </p>
                <p>20</p>
                <p>Email:</p>
                <p>s3820098@rmit.edu.vn </p>
                <p>Dream job: </p>
                <p>Data Science and Software Development</p>
            </div>
        </div>
        <div class='description'>
            <p>Description:</p>
            <p>A curious and well-organized indiviadual who is passionate about trending technologies. Confident at time management, collaborating and problem-solving skills. Striving to gain more experience in the industry as well as making meaningful social
                connections.
            </p>
        </div>
    </div>
    <div class="modal-window " id="Minh" onclick="offmodal('MinhNguyen')">
        <div class="modal-header">
            <div class="title ">Nguyen The Minh</div>
        </div>
        <div class="modal-body">
            <div>
                <img src=<?php
                            if (isset($_SESSION['minh'])) {
                                echo $_SESSION['minh'];
                            } else {
                                echo "https://i.imgur.com/cv75nwp.jpg";
                            }
                            ?> alt="image4 " class="avatar">
            </div>
            <div class="basic-information">
                <p>Age: </p>
                <p>19</p>
                <p>Email:</p>
                <p>s3878434@rmit.edu.vn </p>
                <p>Dream job: </p>
                <p>Machine learning engineer</p>
            </div>
        </div>
        <div class='description'>
            <p>Description:</p>
            <p>I am still very new to information technology but i am very passionate about the major and always ready to accept new knowledge and changes. Confident in time management,hardworking and always ready for changes as long as it is doable.
            </p>
        </div>
    </div>
    <div class="overlay " id="overlay" onclick="overlay_turnoff()"></div>
    </div>
    <!-- End profile card -->
    <!-- Footer -->
    <footer class="page-footer ">
        <div class="container ">
            <div class="grid-container ">
                <!-- Footer Logo -->
                <div class="grid-item ">
                    <a href="../index.php "><img src="https://i.imgur.com/mE6aWmB.png " alt="logo " class="logo-img " /></a>
                </div>
                <!-- Quick Link -->
                <div class="grid-item inner-grid-container ">
                    <div class="grid-item ">
                        <a href="about.php ">About Us</a>
                    </div>
                    <div class="grid-item ">
                        <a href="fees.html ">Fees</a>
                    </div>
                    <div class="grid-item "><a href="browse-menu.html ">Browse</a></div>
                    <div class="grid-item ">
                        <a href="term_of_services.php ">Term of Service</a>
                    </div>
                    <div class="grid-item ">
                        <a href="account/account.php">Account</a>
                    </div>
                    <div class="grid-item "><a href="faq.html ">FAQs</a></div>
                    <div class="grid-item ">
                        <a href="contact.html ">Contact</a>
                    </div>
                    <div class="grid-item ">
                        <a href="privacy_policies.php">Privacy Policy</a>
                    </div>
                </div>
                <!-- Social Link -->
                <div class="grid-item ">
                    <div class="social-buttons ">
                        <a href=" "><i class="fab fa-instagram circle-icon "></i></a>
                        <a href=" "><i class="fab fa-facebook circle-icon "></i></a>
                        <a href=" "><i class="fab fa-linkedin-in circle-icon "></i></a>
                        <a href=" "><i class="fab fa-twitter circle-icon "></i></a>
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