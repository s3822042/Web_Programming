<?php
    // check session status and start session 
    if (empty(session_id())) session_start();

    // detect install.php
    error_reporting(E_ERROR | E_PARSE);
    if (fopen('../../php/install.php', 'r') != null) {
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
    <h1 class="main-title">PRIVACY POLICY</h1>
    <p class="text-inline content1">
        <?php
        if (isset($_SESSION['content1'])) {
            echo $_SESSION['content1'];
        } else {
            echo '<strong>Mall Express</strong> is committed to protecting the privacy of its users. This Privacy Policy (“Privacy Policy”) is designed to help you understand what information we gather, how we use it, what we do to protect it, and to assist you in making informed decisions when using our website. Unless otherwise indicated below, this Privacy Policy applies to any website that references this Privacy Policy, any Company website, as well as any data the Company may collect across partnered and unaffiliated sites.';
        }
        ?>
    </p>
    <p class="text-inline content2">
        <?php
        if (isset($_SESSION['content2'])) {
            echo $_SESSION['content2'];
        } else {
            echo 'For purposes of this Agreement, the terms “we,” “us,” and “our” refer to the Company. “You” refers to you, as a user of the website.';
        }
        ?>
    </p>
    <h2 class="text-title">I. CONSENT</h2>
    <p class="text-inline content3">
        <?php
        if (isset($_SESSION['content3'])) {
            echo $_SESSION['content3'];
        } else {
            echo 'By accessing our website, you accept our Privacy Policy and Terms of Use, and you consent to our collection, storage, use and disclosure of your personal information as described in this Privacy Policy. In addition, by using our website, or services across partnered and unaffiliated sites, you are accepting the policies and practices described in this Privacy Policy. Each time you visit our website, and any time you voluntarily provide us with information, you agree that you are consenting to our collection, use and disclosure of the information that you provide, and you are consenting to receive emails or otherwise be contacted, as described in this Privacy Policy. Whether or not you register or do any sort of business with us, this Privacy Policy applies to all users of the website.';
        }
        ?>
    </p>
    <h2 class="text-title">II. INFORMATION WE COLLECT</h2>
    <p class="text-inline content4">
        <?php
        if (isset($_SESSION['content4'])) {
            echo $_SESSION['content4'];
        } else {
            echo 'We may collect both “Non-Personal Information” and “Personal Information” about you. “Non-Personal Information” includes information that cannot be used to personally identify you, such as anonymous usage data, general demographic information we may collect, referring/exit pages and URLs, platform types, preferences you submit and preferences that are generated based on the data you submit and number of clicks. “Personal Information” includes information that can be used to personally identify you, such as your name, address and email address.';
        }
        ?>
    </p>
    <h3 class="text-title">Google Analytics</h3>
    <p class="text-inline content5">
        <?php
        if (isset($_SESSION['content5'])) {
            echo $_SESSION['content5'];
        } else {
            echo 'This website uses Google Analytics to track information regarding your use of the website. We may track information provided to us by your browser or use of the website, such as the website you came from (known as the “referring URL”), the type of browser you use, the device from which you connected to the website, the time and date of access, and other information that does not personally identify you. We use this information for, among other things, the operation of the website, to maintain the quality of the website, to provide general statistics regarding use of the website and for other business purposes.';
        }
        ?>
    </p>
    <h3 class="text-title">Cookies</h3>
    <p class="text-inline content6">
        <?php
        if (isset($_SESSION['content6'])) {
            echo $_SESSION['content6'];
        } else {
            echo 'We track this information in Google Analytics using cookies, or small text files which include an anonymous unique identifier. Cookies are sent to a user’s browser from our servers and are stored on the user’s computer hard drive. Sending a cookie to a user’s browser enables us to collect Non-Personal Information about that user and keep a record of the user’s preferences when utilizing our services, both on an individual and aggregate basis. The Company may use both persistent and session cookies; persistent cookies remain on your computer after you close your session and until you delete them, while session cookies expire when you close your browser. Persistent cookies can be removed by following your Internet browser help file directions. If you choose to disable cookies, some areas of the website may not work properly.';
        }
        ?>
    </p>
    <ul class="text-inline">
        <li>
            <strong>You may disable cookies in your browser using the following
                instructions:</strong>
        </li>
    </ul>
    <div class="text-inline">
        <ul>
            <li>
                <a href="https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies" target="_blank" rel="noreferrer">Internet Explorer</a>
            </li>
            <li>
                <a href="https://support.google.com/accounts/answer/61416" target="_blank" rel="noreferrer">Chrome</a>
            </li>
            <li>
                <a href="https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences" target="_blank" rel="noreferrer">Firefox</a>
            </li>
            <li>
                <a href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac" target="_blank" rel="noreferrer">Safari</a>
            </li>
    </div>
    <li class="text-inline content7">
        For any other browser, please directly consult the cookie management
        help information available on the Internet.
    </li>
    </ul>
    <h3 class="text-title">Website Forms</h3>
    <p class="text-inline content8">
        <?php
        if (isset($_SESSION['content8'])) {
            echo $_SESSION['content8'];
        } else {
            echo 'There may be several online forms present on our website where you are able to submit personally identifiable information in order to express interest in our business or submit an inquiry regarding our business. These forms may appear as RFP forms, Contact Us forms, Wedding RFP forms, or other similar forms that request your information before submitting. When you contact us using a form on our website, we collect information that identifies you, such as your name, job title, business name, phone number, email address, and other personally identifiable information. Some of this information is required and other information is optional. This information is used to better address your inquiry and is not used for marketing purposes or shared with other third party companies. If you would prefer that we do not collect this information then simply do not fill out the form. If you have already submitted your information through a form and would like to be removed, please email us.';
        }
        ?>
    </p>
    <h3 class="text-title">Email Communications</h3>
    <p class="text-inline content9">
        <?php
        if (isset($_SESSION['content9'])) {
            echo $_SESSION['content9'];
        } else {
            echo 'Based upon the Personal Information that you provide us, we may communicate with you in response to your inquiries to provide the services you request and to manage your account. We will communicate with you by email or telephone, in accordance with your wishes. We may also use your Personal Information to send you updates and other promotional communications. If you no longer wish to receive those email updates, you may opt-out of receiving them by following the instructions included in each update or communication.';
        }
        ?>
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
        <a href="http://mailchimp.com/legal/privacy/" rel="noreferrer" target="_blank">Mailchimp’s own Privacy Policy&#8203;</a>.
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
        <?php
        if (isset($_SESSION['content12'])) {
            echo $_SESSION['content12'];
        } else {
            echo 'Our websites may include features such as plugins, buttons, tools, or content that link to other companies. We may collect information about your use of these features. In addition, when you see or interact with these buttons, tools, or content, or view any of our web pages containing them, some information from your browser may automatically be sent to the other company. Please read that company’s privacy policy for more information.';
        }
        ?>
    </p>
    <h3 class="text-title">Social Media</h3>
    <p class="text-inline content13">
        <?php
        if (isset($_SESSION['content13'])) {
            echo $_SESSION['content13'];
        } else {
            echo 'We have a presence on various social media networks, such as Facebook, Instagram, Twitter, Google+, Pinterest, and LinkedIn. We may collect information when you interact with our social media accounts and pages.';
        }
        ?>
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
        <?php
        if (isset($_SESSION['content14'])) {
            echo $_SESSION['content14'];
        } else {
            echo 'In general, we do not sell, trade, rent or otherwise share your Personal Information with third parties without your consent. We may share your Personal Information with vendors and other third-party providers who are performing services for the Company. In general, the vendors and third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide for the Company. For example, when you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery, or return a purchase, you consent to our collecting and using such personal information for that specific purpose, including by transmitting such information to our vendors (and their service providers) performing these services for the Company.';
        }
        ?>
    </p>
    <p class="text-inline content15">
        <?php
        if (isset($_SESSION['content15'])) {
            echo $_SESSION['content15'];
        } else {
            echo 'However, certain third-party service providers, such as payment processors, have their own privacy policies in respect of the information that we are required to provide to them in order to use their services. For these third-party service providers, we recommend that you read their privacy policies so that you can understand the manner in which your Personal Information will be handled by such providers.';
        }
        ?>
    </p>
    <p class="text-inline content16">
        <?php
        if (isset($_SESSION['content16'])) {
            echo $_SESSION['content16'];
        } else {
            echo 'In addition, we may disclose your Personal Information if required to do so by law or if you violate our Terms of Use.';
        }
        ?>
    </p>
    <h3 class="text-title">Non-Personal Information:</h3>
    <p class="text-inline content17">
        <?php
        if (isset($_SESSION['content17'])) {
            echo $_SESSION['content17'];
        } else {
            echo 'In general, we use Non-Personal Information to help us improve the website and customize the user experience. We also aggregate Non-Personal Information in order to track trends and analyze use patterns of the website. This Privacy Policy does not limit in any way our use or disclosure of Non-Personal Information and we reserve the right to use and disclose such Non-Personal Information to our partners, advertisers and other third parties at our sole discretion.';
        }
        ?>
    </p>
    <h2 class="text-title">IV. HOW WE PROTECT INFORMATION</h2>
    <p class="text-inline content18">
        <?php
        if (isset($_SESSION['content18'])) {
            echo $_SESSION['content18'];
        } else {
            echo 'We implement reasonable precautions and follow industry best practices in order to protect your Personal Information and ensure that such Personal Information is not accessed, disclosed, altered or destroyed. However, these measures do not guarantee that your information will not be accessed, disclosed, altered or destroyed by breach of such precautions. By using our website, you acknowledge that you understand and agree to assume these risks.';
        }
        ?>
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
        <?php
        if (isset($_SESSION['content21'])) {
            echo $_SESSION['content21'];
        } else {
            echo 'Our website is hosted by InMotion Hosting, Inc. InMotion Hosting provides us with the online platform that allows us to provide the website to you. Your information, including Personal Information, may be stored through InMotion Hosting servers. By using the website, you consent to InMotion Hosting’s collection, disclosure, storage, and use of your Personal Information in accordance with InMotion Hosting’s privacy policy.';
        }
        ?>
    </p>
    <h2 class="text-title">VII. LINKS TO OTHER WEBSITES</h2>
    <p class="text-inline content22">
        <?php
        if (isset($_SESSION['content22'])) {
            echo $_SESSION['content22'];
        } else {
            echo 'As part of the website, we may provide links to or compatibility with other websites or applications. However, we are not responsible for the privacy practices employed by those websites or the information or content they contain. This Privacy Policy applies solely to information collected by us through the website. Therefore, this Privacy Policy does not apply to your use of a third-party website accessed by selecting a link via our website. To the extent that you access or use the website through or on another website or application, then the privacy policy of that other website or application will apply to your access or use of that site or application. We encourage our users to read the privacy statements of other websites before proceeding to use them.';
        }
        ?>
    </p>
    <h2 class="text-title">VIII. AGE OF CONSENT</h2>
    <p class="text-inline content23">
        By using the website, you represent that you are at least 18 years of
        age.
    </p>
    <h2 class="text-title">IX. CHANGES TO OUR PRIVACY POLICY</h2>
    <p class="text-inline content24">
        <?php
        if (isset($_SESSION['content24'])) {
            echo $_SESSION['content24'];
        } else {
            echo 'The Company reserves the right to change this Privacy Policy and our Terms of Use at any time. If we decide to change this Privacy Policy, we will post these changes on this page so that you are always aware of what information we collect, how we use it, and under what circumstances we disclose it. Any such modifications become effective upon your continued access to and/or use of the website five (5) days after we first post the changes on the website or otherwise provide you with notice of such modifications. It is your sole responsibility to check this website from time to time to view any such changes to the terms of this Privacy Policy. If you do not agree to any changes, if and when such changes may be made to this Privacy Policy, you must cease access to this website. If you have provided your email address to us, you give us permission to email you for the purpose of notification as described in this Privacy Policy.';
        }
        ?>
    </p>
    <h2 class="text-title">X. MERGER OR ACQUISITION</h2>
    <p class="text-inline content25">
        <?php
        if (isset($_SESSION['content25'])) {
            echo $_SESSION['content25'];
        } else {
            echo 'In the event we undergo a business transaction such as a merger, acquisition by another company, or sale of all or a portion of our assets, your Personal Information may be among the assets transferred. You acknowledge and consent that such transfers may occur and are permitted by this Privacy Policy, and that any acquirer of our assets may continue to process your Personal Information as set forth in this Privacy Policy. If our information practices change at any time in the future, we will post the policy changes here so that you may opt out of the new information practices. We suggest that you check this Privacy Policy periodically if you are concerned about how your information is used.';
        }
        ?>
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
        <?php
        if (isset($_SESSION['content27'])) {
            echo $_SESSION['content27'];
        } else {
            echo 'This Privacy Policy was last updated on Monday, April 04, 2021.';
        }
        ?>
    </p>
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
                    <div class="grid-item"><a href="account/account.php">Account</a></div>
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
    <!-- JavaScript -->
    <script src="../js/index.js"></script>
</body>

</html>