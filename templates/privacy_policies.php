<?php
    session_start();

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
        <title>Privacy Policy</title>
        <!-- Link CSS -->
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/privacy_policies.module.css" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous"
            />
    </head>
    <body>
             <!-- Navigation bar -->
    <header>
      <!-- Logo -->
      <div class="brand">
        <a href="../index.html"
          ><img
            src="https://i.imgur.com/mE6aWmB.png"
            alt="logo"
            class="logo-img"
          />
        </a>
      </div>
      <!-- Right menu -->
      <nav class="menu">
        <input type="checkbox" id="menuToggle" />
        <label for="menuToggle" class="menu-icon"
          ><i class="fa fa-bars"></i
        ></label>
        <ul>
          <a href="about.html"><li>About us</li></a>
          <a href="fees.html"><li>Fees</li></a>
          <a href="account/account.html"><li>Account</li></a>
          <a href="browse-menu.html"><li>Browse</li></a>
          <a href="faq.html"><li>FAQs</li></a>
          <a href="contact.html"><li>Contact</li></a>
          <a href="login-form.html"><li>Sign in</li></a>
          <a href="cart.html"id = "cart"><li>Cart</li></a>
        </ul>
      </nav>
    </header>
    <!-- End header -->
        <h1 class="main-title">PRIVACY POLICY</h1>
        <p class="text-inline content1">
            <?= $_SESSION['content1']?>
        </p>
        <p class="text-inline content2">
            <?= $_SESSION['content2']?>
        </p>
        <h2 class="text-title">I. CONSENT</h2>
        <p class="text-inline content3">
            <?= $_SESSION['content3']?>
        </p>
        <h2 class="text-title">II. INFORMATION WE COLLECT</h2>
        <p class="text-inline content4">
            <?= $_SESSION['content4']?>
        </p>
        <h3 class="text-title">Google Analytics</h3>
        <p class="text-inline content5">
            <?= $_SESSION['content5']?>
        </p>
        <h3 class="text-title">Cookies</h3>
        <p class="text-inline content6">
            <?= $_SESSION['content6']?>
        </p>
        <ul class="text-inline">
            <li>
                <strong
                    >You may disable cookies in your browser using the following
                instructions:</strong
                    >
            </li>
        </ul>
        <div class="text-inline">
            <ul>
                <li>
                    <a
                        href="https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies"
                        target="_blank"
                        rel="noreferrer"
                        >Internet Explorer</a
                        >
                </li>
                <li>
                    <a
                        href="https://support.google.com/accounts/answer/61416"
                        target="_blank"
                        rel="noreferrer"
                        >Chrome</a
                        >
                </li>
                <li>
                    <a
                        href="https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences"
                        target="_blank"
                        rel="noreferrer"
                        >Firefox</a
                        >
                </li>
                <li>
                    <a
                        href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac"
                        target="_blank"
                        rel="noreferrer"
                        >Safari</a
                        >
                </li>
        </div>
        <li class="text-inline content7">
        For any other browser, please directly consult the cookie management
        help information available on the Internet.
        </li>
        </ul>
        <h3 class="text-title">Website Forms</h3>
        <p class="text-inline content8">
            <?= $_SESSION['content8']?>
        </p>
        <h3 class="text-title">Email Communications</h3>
        <p class="text-inline content9">
            Based upon the Personal Information that you provide us, we may
            communicate with you in response to your inquiries to provide the services
            you request and to manage your account. We will communicate with you by
            email or telephone, in accordance with your wishes. We may also use your
            Personal Information to send you updates and other promotional
            communications. If you no longer wish to receive those email updates, you
            may opt-out of receiving them by following the instructions included in
            each update or communication.
        </p>
        <p class="text-inline content10">
            Specifically, we use MailChimp to store email addresses of those who have
            opted into our email marketing campaigns. We also use MailChimp to
            distribute marketing emails to our list of opt-in subscribers. These
            emails may contain a pixel or a web beacon that identifies whether you
            have 1) received the email; 2) opened the email; or 3) clicked the email.
            You may opt out or unsubscribe from our marketing emails if you do not
            want us to collect this information from you. You may also email us if you
            would like to be removed. For more information, please review
            <a
                href="http://mailchimp.com/legal/privacy/"
                rel="noreferrer"
                target="_blank"
                >Mailchimp’s own Privacy Policy&#8203;</a
                >.
        </p>
        <h2 class="text-title">Online Advertising</h2>
        <p class="text-inline content11">
            We participate in a variety of online advertising. This advertising
            displays our ads to you on the websites and apps that reside outside of
            this website.
        </p>
        <div class="text-inline">
            <p>We collect information that identifies:</p>
            <ul>
                <li>which ads are displayed</li>
                <li>which ads are clicked</li>
                <li>where the ad was displayed</li>
            </ul>
        </div>
        <h3 class="text-title">Buttons, Tools, And Content From Other Companies</h3>
        <p class="text-inline content12">
            <?= $_SESSION['content12']?>
        </p>
        <h3 class="text-title">Social Media</h3>
        <p class="text-inline content13">
            <?= $_SESSION['content13']?>
        </p>
        <h2 class="text-title">III. HOW WE USE AND SHARE INFORMATION</h2>
        <div class="text-inline">
            <p>
                The data that we collect about you may be used in the following ways:
            </p>
            <ul>
                <li>Troubleshooting our websites and diagnosing problems</li>
                <li>
                    Providing you with any services, support, or information you have
                    requested
                </li>
                <li>
                    Better understanding user behavior on our sites so that we may update
                    our website to better serve the needs and interests of our customers
                </li>
                <li>Sending you information about our Company or our website</li>
                <li>
                    Sending messages to clients of our Company that pertain to various
                    business functions such as those related to payments or changes in
                    service
                </li>
                <li>
                    Reducing and addressing instances of fraud and protecting both you and
                    the Company
                </li>
            </ul>
        </div>
        <h3 class="text-title">Personal Information:</h3>
        <p class="text-inline content14">
            <?= $_SESSION['content14']?>
        </p>
        <p class="text-inline content15">
            <?= $_SESSION['content15']?>
        </p>
        <p class="text-inline content16">
            <?= $_SESSION['content16']?>
        </p>
        <h3 class="text-title">Non-Personal Information:</h3>
        <p class="text-inline content17">
            <?= $_SESSION['content17']?>
        </p>
        <h2 class="text-title">IV. HOW WE PROTECT INFORMATION</h2>
        <p class="text-inline content18">
            <?= $_SESSION['content18']?>
        </p>
        <h2 class="text-title">
            V. YOUR RIGHTS REGARDING THE USE OF YOUR PERSONAL INFORMATION
        </h2>
        <div class="text-inline">
            <p>
                You may choose to restrict the collection or use of your personal
                information in the following ways:
            </p>
            <ul>
                <li>
                    Whenever you are asked to fill in a form on the website, look for the
                    box that you can click to indicate that you want the information to be
                    used for direct marketing purposes and leave it unchecked
                </li>
                <li>
                    If you have previously agreed to us using your personal information
                    for direct marketing purposes, you may change your mind at any time by
                    writing to or emailing us.
                </li>
            </ul>
        </div>
        <p class="text-inline content19">
            We will not sell, distribute or lease your personal information to third
            parties unless we have your permission or are required by law to do so.
        </p>
        <p class="text-inline content20">
            If you believe that any information we are holding on you is incorrect or
            incomplete, please write to or email us as soon as possible at the above
            address. We will promptly correct any information found to be incorrect.
        </p>
        <h2 class="text-title">VI. HOSTING</h2>
        <p class="text-inline content21">
            <?= $_SESSION['content21']?>
        </p>
        <h2 class="text-title">VII. LINKS TO OTHER WEBSITES</h2>
        <p class="text-inline content22">
            <?= $_SESSION['content22']?>
        </p>
        <h2 class="text-title">VIII. AGE OF CONSENT</h2>
        <p class="text-inline content23">
            By using the website, you represent that you are at least 18 years of
            age.
        </p>
        <h2 class="text-title">IX. CHANGES TO OUR PRIVACY POLICY</h2>
        <p class="text-inline content24">
            <?= $_SESSION['content24']?>
        </p>
        <h2 class="text-title">X. MERGER OR ACQUISITION</h2>
        <p class="text-inline content25">
            <?= $_SESSION['content25']?>
        </p>
        <h2 class="text-title">XI. CONTACT US & WITHDRAWING CONSENT</h2>
        <p class="text-inline content26">
            If you have any questions regarding this Privacy Policy or the practices
            of this Site, or wish to withdraw your consent for the continued
            collection, use or disclosure of your Personal Information, please contact
            us by sending an email to us.
        </p>
        <h2 class="text-title">XII. Last Updated</h2>
        <p class="text-inline content27">
            <?= $_SESSION['content27']?>
        </p>
        <!-- Footer -->
        <footer class="page-footer">
            <div class="container">
                <div class="grid-container">
                    <!-- Footer Logo -->
                    <div class="grid-item">
                        <a href="../index.html"
                            ><img src="https://i.imgur.com/mE6aWmB.png" alt="logo" class="logo-img"
                            /></a>
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
                            <div class="grid-item"><a href="account/account.html">Account</a></div>
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