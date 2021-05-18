<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    if (fopen('../php/install.php', 'r') != null) {
        exit("'install.php' still exists! Delete it to proceed!");
    }

    if (isset($_POST['save-changes'])) {
        // echo '<h2>$_POST values</h2>';
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // echo '<hr>';

        foreach($_POST as $field => $value) {
            $_SESSION[$field] = $value;
            // unset($_SESSION[$field]);
        }

        // echo '<h2>$_SESSION values</h2>';
        // echo '<pre>';
        // print_r($_SESSION);
        // echo '</pre>';
        // echo '<hr>';
        header('location: CMS.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Privacy Policy CMS</title>
        <style>
            html body{
                margin: 0px;
                padding: 0px;
                width: 100%;
                height:100%;
            }

            .cms-main-title {
                text-align: center;
                font-size: 3rem;
                color: white;
                background: linear-gradient(90deg, rgba(0,0,0,1) 20%, rgba(37,51,170,1) 72%, rgba(0,255,229,1) 100%);    
                height: 200px;
                margin-top: -50px;
                padding-top: 35px;
                overflow: hidden;
            }

            #welcome {
                color: rgb(247, 60, 60);
            }

            #admin-name {
                font-size: 20px;
            }

            .label {
                background: rgb(0,0,0);
                color: white;
                padding: 10px 200px 10px 200px;
                font-size: 25px;
            }

            textarea {
                margin-bottom: 25px;
                resize: none;
                padding: 20px;
                border: 4px rgb(247, 60, 60) double;
            }

            textarea:focus {
                border: 4px green double;
                box-shadow: 0px 0px 12px 12px rgba(0, 0, 0, 0.2);
            }

            button {
                font-size: 2rem;
                font-family: "Times New Roman";
                margin-top: 50px;
                margin-bottom: 50px;
                padding: 20px 200px 20px 200px;
                background-color: rgb(247, 60, 60);
                color: white;
                border-radius: 20px;
            }

            button:hover {
                background-color: rgb(0, 0, 0);
            }
        </style>
    </head>

    <body>
        <header>
            <div class="cms-main-title">
                <p><strong id="welcome">PRIVACY POLICY EDITING</strong> <br> <span id="admin-name">Select desired content(s) to edit and hit "Save All" to save changes<span></p>   
            </div>
        </header>

        <form method="post" action="Privacy_Policies_CMS.php" style="text-align: center; margin-top: 20px; padding-top: 35px;">
            <!-- intro 1 -->
            <label class="label" for="content1" style='font-family: "Times New Roman";'>Intro 1:</label><br><br>
            <textarea id="content1" 
                    name="content1" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'><?php
                    if (isset($_SESSION['content1'])) {
                        echo $_SESSION['content1'];
                    } else {
                        echo '<strong>Mall Express</strong> is committed to protecting the privacy of its users. This Privacy Policy (“Privacy Policy”) is designed to help you understand what information we gather, how we use it, what we do to protect it, and to assist you in making informed decisions when using our website. Unless otherwise indicated below, this Privacy Policy applies to any website that references this Privacy Policy, any Company website, as well as any data the Company may collect across partnered and unaffiliated sites.';
                    }
                ?></textarea><br>
            <br>

            <!-- intro 2 -->
            <label class="label" for="content2" style='font-family: "Times New Roman";'>Intro 2:</label><br><br>
            <textarea id="content2" 
                    name="content2" 
                    rows=5
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content2'])) {
                    echo $_SESSION['content2'];
                } else {
                    echo 'For purposes of this Agreement, the terms “we,” “us,” and “our” refer to the Company. “You” refers to you, as a user of the website.';
                }
        ?></textarea><br>
			<br>

            <!-- consent -->
            <label class="label" for="content3" style='font-family: "Times New Roman";'>Consent:</label><br><br>
            <textarea id="content3" 
                    name="content3" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content3'])) {
                    echo $_SESSION['content3'];
                } else {
                    echo 'By accessing our website, you accept our Privacy Policy and Terms of Use, and you consent to our collection, storage, use and disclosure of your personal information as described in this Privacy Policy. In addition, by using our website, or services across partnered and unaffiliated sites, you are accepting the policies and practices described in this Privacy Policy. Each time you visit our website, and any time you voluntarily provide us with information, you agree that you are consenting to our collection, use and disclosure of the information that you provide, and you are consenting to receive emails or otherwise be contacted, as described in this Privacy Policy. Whether or not you register or do any sort of business with us, this Privacy Policy applies to all users of the website.';
                }
        ?></textarea><br>
            <br>

            <!-- info collect intro -->
            <label class="label" for="content4" style='font-family: "Times New Roman";'>Information We Collect - Intro:</label><br><br>
            <textarea id="content4" 
                    name="content4" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content4'])) {
                    echo $_SESSION['content4'];
                } else {
                    echo 'We may collect both “Non-Personal Information” and “Personal Information” about you. “Non-Personal Information” includes information that cannot be used to personally identify you, such as anonymous usage data, general demographic information we may collect, referring/exit pages and URLs, platform types, preferences you submit and preferences that are generated based on the data you submit and number of clicks. “Personal Information” includes information that can be used to personally identify you, such as your name, address and email address.';
                }
        ?></textarea><br>
            <br>

            <!-- info collect google -->
            <label class="label" for="content5" style='font-family: "Times New Roman";'>Information We Collect - Google Analytics:</label><br><br>
            <textarea id="content5" 
                    name="content5" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content5'])) {
                    echo $_SESSION['content5'];
                } else {
                    echo 'This website uses Google Analytics to track information regarding your use of the website. We may track information provided to us by your browser or use of the website, such as the website you came from (known as the “referring URL”), the type of browser you use, the device from which you connected to the website, the time and date of access, and other information that does not personally identify you. We use this information for, among other things, the operation of the website, to maintain the quality of the website, to provide general statistics regarding use of the website and for other business purposes.';
                }
        ?></textarea><br>
            <br>

            <!-- info collect cookies -->
            <label class="label" for="content6" style='font-family: "Times New Roman";'>Information We Collect - Cookies:</label><br><br>
            <textarea id="content6" 
                    name="content6" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content6'])) {
                    echo $_SESSION['content6'];
                } else {
                    echo 'We track this information in Google Analytics using cookies, or small text files which include an anonymous unique identifier. Cookies are sent to a user’s browser from our servers and are stored on the user’s computer hard drive. Sending a cookie to a user’s browser enables us to collect Non-Personal Information about that user and keep a record of the user’s preferences when utilizing our services, both on an individual and aggregate basis. The Company may use both persistent and session cookies; persistent cookies remain on your computer after you close your session and until you delete them, while session cookies expire when you close your browser. Persistent cookies can be removed by following your Internet browser help file directions. If you choose to disable cookies, some areas of the website may not work properly.';
                }
        ?></textarea><br>
            <br>

            <!-- info collect website forms -->
            <label class="label" for="content8" style='font-family: "Times New Roman";'>Information We Collect - Website Forms:</label><br><br>
            <textarea id="content8" 
                    name="content8" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content8'])) {
                    echo $_SESSION['content8'];
                } else {
                    echo 'There may be several online forms present on our website where you are able to submit personally identifiable information in order to express interest in our business or submit an inquiry regarding our business. These forms may appear as RFP forms, Contact Us forms, Wedding RFP forms, or other similar forms that request your information before submitting. When you contact us using a form on our website, we collect information that identifies you, such as your name, job title, business name, phone number, email address, and other personally identifiable information. Some of this information is required and other information is optional. This information is used to better address your inquiry and is not used for marketing purposes or shared with other third party companies. If you would prefer that we do not collect this information then simply do not fill out the form. If you have already submitted your information through a form and would like to be removed, please email us.';
                }
        ?></textarea><br>
            <br>

            <!-- info collect email communication -->
            <label class="label" for="content9" style='font-family: "Times New Roman";'>Information We Collect - Email Communications:</label><br><br>
            <textarea id="content9" 
                    name="content9" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content9'])) {
                    echo $_SESSION['content9'];
                } else {
                    echo 'Based upon the Personal Information that you provide us, we may communicate with you in response to your inquiries to provide the services you request and to manage your account. We will communicate with you by email or telephone, in accordance with your wishes. We may also use your Personal Information to send you updates and other promotional communications. If you no longer wish to receive those email updates, you may opt-out of receiving them by following the instructions included in each update or communication.';
                }
        ?></textarea><br>
            <br>

            <!-- info collect buttons and others -->
            <label class="label" for="content12" style='font-family: "Times New Roman";'>Information We Collect - Buttons and Others:</label><br><br>
            <textarea id="content12" 
                    name="content12" 
                    rows=9
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content12'])) {
                    echo $_SESSION['content12'];
                } else {
                    echo 'Our websites may include features such as plugins, buttons, tools, or content that link to other companies. We may collect information about your use of these features. In addition, when you see or interact with these buttons, tools, or content, or view any of our web pages containing them, some information from your browser may automatically be sent to the other company. Please read that company’s privacy policy for more information.';
                }
        ?></textarea><br>
            <br>

            <!-- info collect social media -->
            <label class="label" for="content13" style='font-family: "Times New Roman";'>Information We Collect - Social Media:</label><br><br>
            <textarea id="content13" 
                    name="content13" 
                    rows=5
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content13'])) {
                    echo $_SESSION['content13'];
                } else {
                    echo 'We have a presence on various social media networks, such as Facebook, Instagram, Twitter, Google+, Pinterest, and LinkedIn. We may collect information when you interact with our social media accounts and pages.';
                }
        ?></textarea><br>
            <br>

            <!-- use/share info personal info 1 -->
            <label class="label" for="content14" style='font-family: "Times New Roman";'>Use and Share Information - Personal Information 1:</label><br><br>
            <textarea id="content14" 
                    name="content14" 
                    rows=10
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content14'])) {
                    echo $_SESSION['content14'];
                } else {
                    echo 'In general, we do not sell, trade, rent or otherwise share your Personal Information with third parties without your consent. We may share your Personal Information with vendors and other third-party providers who are performing services for the Company. In general, the vendors and third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide for the Company. For example, when you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery, or return a purchase, you consent to our collecting and using such personal information for that specific purpose, including by transmitting such information to our vendors (and their service providers) performing these services for the Company.';
                }
        ?></textarea><br>
            <br>

            <!-- use/share info personal info 2 -->
            <label class="label" for="content15" style='font-family: "Times New Roman";'>Use and Share Information - Personal Information 2:</label><br><br>
            <textarea id="content15" 
                    name="content15" 
                    rows=5
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content15'])) {
                    echo $_SESSION['content15'];
                } else {
                    echo 'However, certain third-party service providers, such as payment processors, have their own privacy policies in respect of the information that we are required to provide to them in order to use their services. For these third-party service providers, we recommend that you read their privacy policies so that you can understand the manner in which your Personal Information will be handled by such providers.';
                }
        ?></textarea><br>
            <br>

            <!-- use/share info personal info 3 -->
            <label class="label" for="content16" style='font-family: "Times New Roman";'>Use and Share Information - Personal Information 3:</label><br><br>
            <textarea id="content16" 
                    name="content16" 
                    rows=3
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content16'])) {
                    echo $_SESSION['content16'];
                } else {
                    echo 'In addition, we may disclose your Personal Information if required to do so by law or if you violate our Terms of Use.';
                }
        ?></textarea><br>
            <br>

            <!-- use/share info NON-personal info -->
            <label class="label" for="content17" style='font-family: "Times New Roman";'>Use and Share Information - Non-Personal Information:</label><br><br>
            <textarea id="content17" 
                    name="content17" 
                    rows=8
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content17'])) {
                    echo $_SESSION['content17'];
                } else {
                    echo 'In general, we use Non-Personal Information to help us improve the website and customize the user experience. We also aggregate Non-Personal Information in order to track trends and analyze use patterns of the website. This Privacy Policy does not limit in any way our use or disclosure of Non-Personal Information and we reserve the right to use and disclose such Non-Personal Information to our partners, advertisers and other third parties at our sole discretion.';
                }
        ?></textarea><br>
            <br>

            <!-- protect info -->
            <label class="label" for="content18" style='font-family: "Times New Roman";'>Protect Information:</label><br><br>
            <textarea id="content18" 
                    name="content18" 
                    rows=8
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content18'])) {
                    echo $_SESSION['content18'];
                } else {
                    echo 'We implement reasonable precautions and follow industry best practices in order to protect your Personal Information and ensure that such Personal Information is not accessed, disclosed, altered or destroyed. However, these measures do not guarantee that your information will not be accessed, disclosed, altered or destroyed by breach of such precautions. By using our website, you acknowledge that you understand and agree to assume these risks.';
                }
        ?></textarea><br>
            <br>

            <!-- hosting -->
            <label class="label" for="content21" style='font-family: "Times New Roman";'>Hosting:</label><br><br>
            <textarea id="content21" 
                    name="content21" 
                    rows=8
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content21'])) {
                    echo $_SESSION['content21'];
                } else {
                    echo 'Our website is hosted by InMotion Hosting, Inc. InMotion Hosting provides us with the online platform that allows us to provide the website to you. Your information, including Personal Information, may be stored through InMotion Hosting servers. By using the website, you consent to InMotion Hosting’s collection, disclosure, storage, and use of your Personal Information in accordance with InMotion Hosting’s privacy policy.';
                }
        ?></textarea><br>
            <br>

            <!-- link to other websites -->
            <label class="label" for="content22" style='font-family: "Times New Roman";'>Links to Other Websites:</label><br><br>
            <textarea id="content22" 
                    name="content22" 
                    rows=8
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content22'])) {
                    echo $_SESSION['content22'];
                } else {
                    echo 'As part of the website, we may provide links to or compatibility with other websites or applications. However, we are not responsible for the privacy practices employed by those websites or the information or content they contain. This Privacy Policy applies solely to information collected by us through the website. Therefore, this Privacy Policy does not apply to your use of a third-party website accessed by selecting a link via our website. To the extent that you access or use the website through or on another website or application, then the privacy policy of that other website or application will apply to your access or use of that site or application. We encourage our users to read the privacy statements of other websites before proceeding to use them.';
                }
        ?></textarea><br>
            <br>

            <!-- changes to PP -->
            <label class="label" for="content24" style='font-family: "Times New Roman";'>Changes to Privacy Policies:</label><br><br>
            <textarea id="content24" 
                    name="content24" 
                    rows=10
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content24'])) {
                    echo $_SESSION['content24'];
                } else {
                    echo 'The Company reserves the right to change this Privacy Policy and our Terms of Use at any time. If we decide to change this Privacy Policy, we will post these changes on this page so that you are always aware of what information we collect, how we use it, and under what circumstances we disclose it. Any such modifications become effective upon your continued access to and/or use of the website five (5) days after we first post the changes on the website or otherwise provide you with notice of such modifications. It is your sole responsibility to check this website from time to time to view any such changes to the terms of this Privacy Policy. If you do not agree to any changes, if and when such changes may be made to this Privacy Policy, you must cease access to this website. If you have provided your email address to us, you give us permission to email you for the purpose of notification as described in this Privacy Policy.';
                }
        ?></textarea><br>
            <br>

            <!-- merger or acquisition -->
            <label class="label" for="content25" style='font-family: "Times New Roman";'>Merger or Acquisition:</label><br><br>
            <textarea id="content25" 
                    name="content25" 
                    rows=10
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content25'])) {
                    echo $_SESSION['content25'];
                } else {
                    echo 'In the event we undergo a business transaction such as a merger, acquisition by another company, or sale of all or a portion of our assets, your Personal Information may be among the assets transferred. You acknowledge and consent that such transfers may occur and are permitted by this Privacy Policy, and that any acquirer of our assets may continue to process your Personal Information as set forth in this Privacy Policy. If our information practices change at any time in the future, we will post the policy changes here so that you may opt out of the new information practices. We suggest that you check this Privacy Policy periodically if you are concerned about how your information is used.';
                }
        ?></textarea><br>
            <br>

            <!-- last updated -->
            <label class="label" for="content27" style='font-family: "Times New Roman";'>Last Updated:</label><br><br>
            <textarea id="content27" 
                    name="content27" 
                    rows=2
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
                if (isset($_SESSION['content27'])) {
                    echo $_SESSION['content27'];
                } else {
                    echo 'This Privacy Policy was last updated on Monday, April 04, 2021.';
                }
        ?></textarea><br>
            <hr>

            <!-- Button -->
			<button type="submit" name="save-changes" value="submit">Save All</button>
            <hr style="margin-bottom: 50px;">
        </form>
    </body>
</html>