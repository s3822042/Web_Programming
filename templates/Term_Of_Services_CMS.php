<?php
if ( empty(session_id()) ) session_start();
    error_reporting(E_ERROR | E_PARSE);

    if (fopen('../php/install.php', 'r') != null) {
        exit("'install.php' still exists! Delete it to proceed!");
    }

    if (isset($_POST['save-changes-ts'])) {
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
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Term of Services CMS</title>
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
                <p><strong id="welcome">TERM OF SERVICES EDITING</strong> <br> <span id="admin-name">Select desired content(s) to edit and hit "Save All" to save changes<span></p>   
            </div>
        </header>

        <form method="post" action="Term_Of_Services_CMS.php" style="text-align: center; margin-top: 20px; padding-top: 35px;">
            <!-- conditions of use -->
            <label class="label" for="content1-ts" style='font-family: "Times New Roman";'>Conditions of Use:</label><br><br>
            <textarea id="content1-ts" 
                    name="content1-ts" 
                    rows=4
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content1-ts'])) {
            echo $_SESSION['content1-ts'];
          } else {
            echo 'We will provide their services to you, which are subject to the conditions stated below in this document. Every time you visit this website, use its services or make a purchase, you accept the following conditions. This is why we urge you to read them carefully.';
          }
          ?></textarea><br>
            <br>

            <!-- privacy policies -->
            <label class="label" for="content2-ts" style='font-family: "Times New Roman";'>Privacy Policies:</label><br><br>
            <textarea id="content2-ts" 
                    name="content2-ts" 
                    rows=4
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content2-ts'])) {
            echo $_SESSION['content2-ts'];
          } else {
            echo 'Before you continue using our website we advise you to read our <a href="privacy_policies.php">privacy policy</a> regarding our user data collection. It will help you better understand our practices.';
          }
          ?></textarea><br>
            <br>

            <!-- copyright -->
            <label class="label" for="content3-ts" style='font-family: "Times New Roman";'>Copyright:</label><br><br>
            <textarea id="content3-ts" 
                    name="content3-ts" 
                    rows=5
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content3-ts'])) {
            echo $_SESSION['content3-ts'];
          } else {
            echo 'Content published on this website (digital downloads, images, texts, graphics, logos) is the property of Mall Express and/or its content creators and protected by international copyright laws. The entire compilation of the content found on this website is the exclusive property of Mall Express and/or its contributors, with copyright authorship for this compilation by Mall Express.';
          }
          ?></textarea><br>
            <br>

            <!-- communications -->
            <label class="label" for="content4-ts" style='font-family: "Times New Roman";'>Communications:</label><br><br>
            <textarea id="content4-ts" 
                    name="content4-ts" 
                    rows=7
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content4-ts'])) {
            echo $_SESSION['content4-ts'];
          } else {
            echo 'The entire communication with us is electronic. Every time you send us an email or visit our website, you are going to be communicating with us. You hereby consent to receive communications from us. If you subscribe to the news on our website, you are going to receive regular emails from us. We will continue to communicate with you by posting news and notices on our website and by sending you emails. You also agree that all notices, disclosures, agreements and other communications we provide to you electronically meet the legal requirements that such communications be in writing.';
          }
          ?></textarea><br>
            <br>

            <!-- applicable law -->
            <label class="label" for="content5-ts" style='font-family: "Times New Roman";'>Applicable Laws:</label><br><br>
            <textarea id="content5-ts" 
                    name="content5-ts" 
                    rows=5
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content5-ts'])) {
            echo $_SESSION['content5-ts'];
          } else {
            echo 'By visiting this website, you agree that the laws of the Vietnamese government, without regard to principles of conflict laws, will govern these terms of service, or any dispute of any sort that might come between Mall Express and you, or its business partners and associates.';
          }
          ?></textarea><br>
            <br>

            <!-- dispute -->
            <label class="label" for="content6-ts" style='font-family: "Times New Roman";'>Disputes:</label><br><br>
            <textarea id="content6-ts" 
                    name="content6-ts" 
                    rows=5
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content6-ts'])) {
            echo $_SESSION['content6-ts'];
          } else {
            echo 'Any dispute related in any way to your visit to this website or to products you purchase from us shall be arbitrated by state or federal court Vietnamese Government and you consent to exclusive jurisdiction and venue of such courts.';
          }
          ?></textarea><br>
            <br>

            <!-- comments + reviews + emails -->
            <label class="label" for="content7-ts" style='font-family: "Times New Roman";'>Comments, Reviews and Emails:</label><br><br>
            <textarea id="content7-ts" 
                    name="content7-ts" 
                    rows=7
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content7-ts'])) {
            echo $_SESSION['content7-ts'];
          } else {
            echo 'Visitors may post content as long as it is not obscene, illegal, defamatory, threatening, infringing of intellectual property rights, invasive of privacy or injurious in any other way to third parties. Content has to be free of software viruses, political campaign, and commercial solicitation. We reserve all rights (but not the obligation) to remove and/or edit such content. When you post your content, you grant Mall Express non-exclusive, royalty-free and irrevocable right to use, reproduce, publish, modify such content throughout the world in any media.';
          }
          ?></textarea><br>
            <br>
        
            <!-- license and site access -->
            <label class="label" for="content8-ts" style='font-family: "Times New Roman";'>License and Site Access:</label><br><br>
            <textarea id="content8-ts" 
                    name="content8-ts" 
                    rows=4
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content8-ts'])) {
            echo $_SESSION['content8-ts'];
          } else {
            echo 'We grant you a limited license to access and make personal use of this website. You are not allowed to download or modify it. This may be done only with written consent from us.';
          }
          ?></textarea><br>
            <br>
            
            <!-- user account -->
            <label class="label" for="content9-ts" style='font-family: "Times New Roman";'>User Account:</label><br><br>
            <textarea id="content9-ts" 
                    name="content9-ts" 
                    rows=4
                    cols=100
                    style='font-family: "Times New Roman"; font-size: 24px; text-align: justify;'
            ><?php
          if (isset($_SESSION['content9-ts'])) {
            echo $_SESSION['content9-ts'];
          } else {
            echo 'If you are an owner of an account on this website, you are solely responsible for maintaining the confidentiality of your private user details (username and password). You are responsible for all activities that occur under your account or password.';
          }
          ?></textarea><br>
            <br>

            <hr>
            <!-- Button -->
			<button type="submit" name="save-changes-ts" value="submit-ts">Save All</button>
            <hr style="margin-bottom: 50px;">
        </form>
    </body>
</html>