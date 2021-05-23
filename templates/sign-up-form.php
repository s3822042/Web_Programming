<?php require '../php/signup_require.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/sign-up-form.module.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
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
  php<a href="about.php"><li>About us</li></a>
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


  <section id="wrapper">
    <h1>Sign Up</h1>
    <form action="sign-up-form.php" method="post" enctype=multipart/form-data 
      name="regForm">
      <div class="form">
        <div class="field-wrap">
          <div>
            <label for="first-name">First Name:</label>
            <input id="first-name" name="first-name" type="text" placeholder="Enter your first name"  onclick="this.value=''" onkeypress="this.style.color='black'" 
			<?php
				if (isset($_POST['first-name']) && strlen($_POST['first-name']) < 3) {
					echo ' value='.'"Must have at least 3 characters!"';
					echo ' style='.'"color:red;"';
				}
			?>
			required />
          </div>
          <div>
            <label for="last-name">Last Name :</label>
            <input id="last-name" name="last-name" type="text" placeholder="Enter your last name"  onclick="this.value=''" onkeypress="this.style.color='black'" 
			<?php
				if (isset($_POST['last-name']) && strlen($_POST['last-name']) < 3) {
					echo ' value='.'"Must have at least 3 characters!"';
					echo ' style='.'"color:red;"';
				}
			?>
			required />
          </div>
        </div>
        <div class="field-wrap">
          <div>
            <label for="email-address">Email:</label>
            <input type="text" id="email-address" name="sign-up-email" placeholder="abcdxyz@gmail.com" onclick="this.value=''" onkeypress="this.style.color='black'" 
			<?php
				if (isset($_POST['sign-up-email']) && !isValidEmail($_POST['sign-up-email'])) {
						echo ' value='.'"Invalid email!"';
						echo ' style='.'"color:red;"';
				}
				else {
					if (isUniqueEmail($_POST['sign-up-email']) == false) {
						echo ' value='.'"Email already exists!"';
						echo ' style='.'"color:red;"';
					}
				}
				
			?>
			required />
          </div>
        </div>
        <div class="field-wrap">
          <div>
            <label for="phonenumber">Phone number</label>
            <input type="tel" id="phonenumber" name="phone-number" placeholder="Ex:0821234567" onclick="this.value=''" onkeypress="this.style.color='black'" 
			<?php
				if (isset($_POST['phone-number']) && !isValidTelephoneNumber($_POST['phone-number'])) {
					echo ' value='.'"Invalid phone number!"';
					echo ' style='.'"color:red;"';
				}
				else {
					if (isUniquePhone($_POST['phone-number']) == false) {
						echo ' value='.'"Phone number already exists!"';
						echo ' style='.'"color:red;"';
					}
				}
			?>
			required/>
          </div>
        </div>
        <div class="field-wrap">
          <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="sign-up-password" placeholder="Enter password" onclick="this.type='text'; this.style.color='black'" onblur="this.type='password'"
			<?php
				if (isset($_POST['sign-up-password']) && !isValidPass($_POST['sign-up-password'])) {
					echo ' value='.'"Invalid password!"';
					echo ' style='.'"color:red;"';
				}
			?>
			required />

          </div>
          <div>
            <label for="password">Confirm password</label>
            <input type="password" id="confirm-password" name="sign-up-confirm-password" placeholder="Enter password" onclick="this.type='text'; this.style.color='black'" onblur="this.type='password'"
            <?php
				if (isset($_POST['sign-up-confirm-password']) && $_POST['sign-up-confirm-password']!= $_POST['sign-up-password']) {
					echo ' value='.'"Unmatched password!"';
					echo ' style='.'"color:red;"';
				}
			?>
			required />

          </div>
        </div>
        <div class="field-wrap">
          <div>
            <label for="profile-picture">Upload your picture</label>
            <input type="file" id="profile-picture" name="profile-picture" />
          </div>
        </div>
        <div class="field-wrap">
          <address>
            <label for="address">Address:</label>
            <input type="text" id="address" name="sign-up-address" placeholder="Ex: 123 Nguyen Trai Q.5" onclick="this.value=''" onkeypress="this.style.color='black'" 
			<?php
				if (isset($_POST['sign-up-address']) && strlen($_POST['sign-up-address']) < 3) {
					echo ' value='.'"Must have at least 3 characters!"';
					echo ' style='.'"color:red;"';
				}
			?>
			required />
          </address>
        </div>
        <div class="field-wrap">
          <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="sign-up-city" placeholder="Ex: Ho Chi Minh" onclick="this.value=''" onkeypress="this.style.color='black'" 
			<?php
				if (isset($_POST['sign-up-city']) && strlen($_POST['sign-up-city']) < 3) {
					echo ' value='.'"Must have at least 3 characters!"';
					echo ' style='.'"color:red;"';
				}
			?>
			required />
          </div>
        </div>
        <div class="field-wrap">
          <div>
            <label for="zip-code">Zip Code:</label>
            <input type="text" id="zip-code" name="sign-up-zip-code" placeholder="4~6 digits" onclick="this.value=''" onkeypress="this.style.color='black'" 
			<?php
				if (isset($_POST['sign-up-zip-code']) && (preg_match('/[0-9]{4,6}/', $_POST['sign-up-zip-code']) == false ) ) {
					echo ' value='.'"Must have 4-6 DIGITS!"';
					echo ' style='.'"color:red;"';
				}
			?>
			required />
          </div>
        </div>
        <div class="field-wrap">
          <div>
            Country:
            <select id="country" name="sign-up-country">
              <option>Select country</option>
              <option value="AF">Afghanistan</option>
              <option value="AX">Aland Islands</option>
              <option value="AL">Albania</option>
              <option value="DZ">Algeria</option>
              <option value="AS">American Samoa</option>
              <option value="AD">Andorra</option>
              <option value="AO">Angola</option>
              <option value="AI">Anguilla</option>
              <option value="AQ">Antarctica</option>
              <option value="AG">Antigua and Barbuda</option>
              <option value="AR">Argentina</option>
              <option value="AM">Armenia</option>
              <option value="AW">Aruba</option>
              <option value="AU">Australia</option>
              <option value="AT">Austria</option>
              <option value="AZ">Azerbaijan</option>
              <option value="BS">Bahamas</option>
              <option value="BH">Bahrain</option>
              <option value="BD">Bangladesh</option>
              <option value="BB">Barbados</option>
              <option value="BY">Belarus</option>
              <option value="BE">Belgium</option>
              <option value="BZ">Belize</option>
              <option value="BJ">Benin</option>
              <option value="BM">Bermuda</option>
              <option value="BT">Bhutan</option>
              <option value="BO">Bolivia</option>
              <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
              <option value="BA">Bosnia and Herzegovina</option>
              <option value="BW">Botswana</option>
              <option value="BV">Bouvet Island</option>
              <option value="BR">Brazil</option>
              <option value="IO">British Indian Ocean Territory</option>
              <option value="BN">Brunei Darussalam</option>
              <option value="BG">Bulgaria</option>
              <option value="BF">Burkina Faso</option>
              <option value="BI">Burundi</option>
              <option value="KH">Cambodia</option>
              <option value="CM">Cameroon</option>
              <option value="CA">Canada</option>
              <option value="CV">Cape Verde</option>
              <option value="KY">Cayman Islands</option>
              <option value="CF">Central African Republic</option>
              <option value="TD">Chad</option>
              <option value="CL">Chile</option>
              <option value="CN">China</option>
              <option value="CX">Christmas Island</option>
              <option value="CC">Cocos (Keeling) Islands</option>
              <option value="CO">Colombia</option>
              <option value="KM">Comoros</option>
              <option value="CG">Congo</option>
              <option value="CD">
                Congo, Democratic Republic of the Congo
              </option>
              <option value="CK">Cook Islands</option>
              <option value="CR">Costa Rica</option>
              <option value="CI">Cote D'Ivoire</option>
              <option value="HR">Croatia</option>
              <option value="CU">Cuba</option>
              <option value="CW">Curacao</option>
              <option value="CY">Cyprus</option>
              <option value="CZ">Czech Republic</option>
              <option value="DK">Denmark</option>
              <option value="DJ">Djibouti</option>
              <option value="DM">Dominica</option>
              <option value="DO">Dominican Republic</option>
              <option value="EC">Ecuador</option>
              <option value="EG">Egypt</option>
              <option value="SV">El Salvador</option>
              <option value="GQ">Equatorial Guinea</option>
              <option value="ER">Eritrea</option>
              <option value="EE">Estonia</option>
              <option value="ET">Ethiopia</option>
              <option value="FK">Falkland Islands (Malvinas)</option>
              <option value="FO">Faroe Islands</option>
              <option value="FJ">Fiji</option>
              <option value="FI">Finland</option>
              <option value="FR">France</option>
              <option value="GF">French Guiana</option>
              <option value="PF">French Polynesia</option>
              <option value="TF">French Southern Territories</option>
              <option value="GA">Gabon</option>
              <option value="GM">Gambia</option>
              <option value="GE">Georgia</option>
              <option value="DE">Germany</option>
              <option value="GH">Ghana</option>
              <option value="GI">Gibraltar</option>
              <option value="GR">Greece</option>
              <option value="GL">Greenland</option>
              <option value="GD">Grenada</option>
              <option value="GP">Guadeloupe</option>
              <option value="GU">Guam</option>
              <option value="GT">Guatemala</option>
              <option value="GG">Guernsey</option>
              <option value="GN">Guinea</option>
              <option value="GW">Guinea-Bissau</option>
              <option value="GY">Guyana</option>
              <option value="HT">Haiti</option>
              <option value="HM">Heard Island and Mcdonald Islands</option>
              <option value="VA">Holy See (Vatican City State)</option>
              <option value="HN">Honduras</option>
              <option value="HK">Hong Kong</option>
              <option value="HU">Hungary</option>
              <option value="IS">Iceland</option>
              <option value="IN">India</option>
              <option value="ID">Indonesia</option>
              <option value="IR">Iran, Islamic Republic of</option>
              <option value="IQ">Iraq</option>
              <option value="IE">Ireland</option>
              <option value="IM">Isle of Man</option>
              <option value="IL">Israel</option>
              <option value="IT">Italy</option>
              <option value="JM">Jamaica</option>
              <option value="JP">Japan</option>
              <option value="JE">Jersey</option>
              <option value="JO">Jordan</option>
              <option value="KZ">Kazakhstan</option>
              <option value="KE">Kenya</option>
              <option value="KI">Kiribati</option>
              <option value="KP">
                Korea, Democratic People's Republic of
              </option>
              <option value="KR">Korea, Republic of</option>
              <option value="XK">Kosovo</option>
              <option value="KW">Kuwait</option>
              <option value="KG">Kyrgyzstan</option>
              <option value="LA">Lao People's Democratic Republic</option>
              <option value="LV">Latvia</option>
              <option value="LB">Lebanon</option>
              <option value="LS">Lesotho</option>
              <option value="LR">Liberia</option>
              <option value="LY">Libyan Arab Jamahiriya</option>
              <option value="LI">Liechtenstein</option>
              <option value="LT">Lithuania</option>
              <option value="LU">Luxembourg</option>
              <option value="MO">Macao</option>
              <option value="MK">
                Macedonia, the Former Yugoslav Republic of
              </option>
              <option value="MG">Madagascar</option>
              <option value="MW">Malawi</option>
              <option value="MY">Malaysia</option>
              <option value="MV">Maldives</option>
              <option value="ML">Mali</option>
              <option value="MT">Malta</option>
              <option value="MH">Marshall Islands</option>
              <option value="MQ">Martinique</option>
              <option value="MR">Mauritania</option>
              <option value="MU">Mauritius</option>
              <option value="YT">Mayotte</option>
              <option value="MX">Mexico</option>
              <option value="FM">Micronesia, Federated States of</option>
              <option value="MD">Moldova, Republic of</option>
              <option value="MC">Monaco</option>
              <option value="MN">Mongolia</option>
              <option value="ME">Montenegro</option>
              <option value="MS">Montserrat</option>
              <option value="MA">Morocco</option>
              <option value="MZ">Mozambique</option>
              <option value="MM">Myanmar</option>
              <option value="NA">Namibia</option>
              <option value="NR">Nauru</option>
              <option value="NP">Nepal</option>
              <option value="NL">Netherlands</option>
              <option value="AN">Netherlands Antilles</option>
              <option value="NC">New Caledonia</option>
              <option value="NZ">New Zealand</option>
              <option value="NI">Nicaragua</option>
              <option value="NE">Niger</option>
              <option value="NG">Nigeria</option>
              <option value="NU">Niue</option>
              <option value="NF">Norfolk Island</option>
              <option value="MP">Northern Mariana Islands</option>
              <option value="NO">Norway</option>
              <option value="OM">Oman</option>
              <option value="PK">Pakistan</option>
              <option value="PW">Palau</option>
              <option value="PS">Palestinian Territory, Occupied</option>
              <option value="PA">Panama</option>
              <option value="PG">Papua New Guinea</option>
              <option value="PY">Paraguay</option>
              <option value="PE">Peru</option>
              <option value="PH">Philippines</option>
              <option value="PN">Pitcairn</option>
              <option value="PL">Poland</option>
              <option value="PT">Portugal</option>
              <option value="PR">Puerto Rico</option>
              <option value="QA">Qatar</option>
              <option value="RE">Reunion</option>
              <option value="RO">Romania</option>
              <option value="RU">Russian Federation</option>
              <option value="RW">Rwanda</option>
              <option value="BL">Saint Barthelemy</option>
              <option value="SH">Saint Helena</option>
              <option value="KN">Saint Kitts and Nevis</option>
              <option value="LC">Saint Lucia</option>
              <option value="MF">Saint Martin</option>
              <option value="PM">Saint Pierre and Miquelon</option>
              <option value="VC">Saint Vincent and the Grenadines</option>
              <option value="WS">Samoa</option>
              <option value="SM">San Marino</option>
              <option value="ST">Sao Tome and Principe</option>
              <option value="SA">Saudi Arabia</option>
              <option value="SN">Senegal</option>
              <option value="RS">Serbia</option>
              <option value="CS">Serbia and Montenegro</option>
              <option value="SC">Seychelles</option>
              <option value="SL">Sierra Leone</option>
              <option value="SG">Singapore</option>
              <option value="SX">Sint Maarten</option>
              <option value="SK">Slovakia</option>
              <option value="SI">Slovenia</option>
              <option value="SB">Solomon Islands</option>
              <option value="SO">Somalia</option>
              <option value="ZA">South Africa</option>
              <option value="GS">
                South Georgia and the South Sandwich Islands
              </option>
              <option value="SS">South Sudan</option>
              <option value="ES">Spain</option>
              <option value="LK">Sri Lanka</option>
              <option value="SD">Sudan</option>
              <option value="SR">Suriname</option>
              <option value="SJ">Svalbard and Jan Mayen</option>
              <option value="SZ">Swaziland</option>
              <option value="SE">Sweden</option>
              <option value="CH">Switzerland</option>
              <option value="SY">Syrian Arab Republic</option>
              <option value="TW">Taiwan, Province of China</option>
              <option value="TJ">Tajikistan</option>
              <option value="TZ">Tanzania, United Republic of</option>
              <option value="TH">Thailand</option>
              <option value="TL">Timor-Leste</option>
              <option value="TG">Togo</option>
              <option value="TK">Tokelau</option>
              <option value="TO">Tonga</option>
              <option value="TT">Trinidad and Tobago</option>
              <option value="TN">Tunisia</option>
              <option value="TR">Turkey</option>
              <option value="TM">Turkmenistan</option>
              <option value="TC">Turks and Caicos Islands</option>
              <option value="TV">Tuvalu</option>
              <option value="UG">Uganda</option>
              <option value="UA">Ukraine</option>
              <option value="AE">United Arab Emirates</option>
              <option value="GB">United Kingdom</option>
              <option value="US">United States</option>
              <option value="UM">United States Minor Outlying Islands</option>
              <option value="UY">Uruguay</option>
              <option value="UZ">Uzbekistan</option>
              <option value="VU">Vanuatu</option>
              <option value="VE">Venezuela</option>
              <option value="VN">Viet Nam</option>
              <option value="VG">Virgin Islands, British</option>
              <option value="VI">Virgin Islands, U.s.</option>
              <option value="WF">Wallis and Futuna</option>
              <option value="EH">Western Sahara</option>
              <option value="YE">Yemen</option>
              <option value="ZM">Zambia</option>
              <option value="ZW">Zimbabwe</option>
            </select>
          </div>
        </div>
        <div class="field-wrap">
          <div class="content">
            <p>Account Type:</p>
          </div>
          <div class="account-type">
            <input type="radio" id="store-owner" name="account-type" value="store-owner" onclick="additionalField()" />
            <label for="store-owner">Store Owner</label>
            <input type="radio" id="shopper" name="account-type" value="shopper" onclick="hideAdditionalField()" />
            <label for="shopper">Shopper</label>
            <input type="text" id="store-name" name="store-name-of-owner" placeholder="Ex: Store name">
          </div>
        </div>
        <div class="button">
          <button type="submit" value="submit" name="hit-register" id="submit-btn">Get Started</button>
        </div>
      </div>
    </form>
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
            <a href="fees.php">Fees</a>
          </div>
          <div class="grid-item"><a href="browse-menu.php">Browse</a></div>
          <div class="grid-item">
            <a href="term_of_services.php">Term of Service</a>
          </div>
          <div class="grid-item">
            <a href="account/account.php">Account</a>
          </div>
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