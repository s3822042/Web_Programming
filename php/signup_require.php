<?php
	// check session status and start session 
	if ( empty(session_id()) ) session_start();

	// detect install.php
	error_reporting(E_ERROR | E_PARSE);
	if (fopen('../php/install.php', 'r') != null) {
	exit("'install.php' still exists! Delete it to proceed!");
	}

	// handle POST auto-refill when users hit return on browser + clear POST on refresh
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$_SESSION['postdata'] = $_POST;
	unset($_POST);
	header("Location: ".$_SERVER['REQUEST_URI']);
	exit;
	}
	if (@$_SESSION['postdata']){
	$_POST=$_SESSION['postdata'];
	unset($_SESSION['postdata']);
	}

	// if already logged in
	if(isset($_SESSION['user'])) unset($_SESSION['user']);
  
	// encrypt decrypt function
	function encrypt_decrypt($string, $action = 'encrypt')
    {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
        $secret_iv = '5fgf5HJ5g27'; // user define secret key
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

	// check if unique email
	function isUniqueEmail($email) {
		clearstatcache();
		if(filesize('../php/login_data.csv')) {
			// file is not empty
			$targetfile = fopen("../php/login_data.csv", 'r');
			while (($datarow = fgetcsv($targetfile)) !== false) {
                if ($email == $datarow[1]) return false;
            }
		}
		return true;
	}

	// check if unique phone
	function isUniquePhone($phonenumber) {
		clearstatcache();
		if(filesize('../php/login_data.csv')) {
			// file is not empty
			$targetfile = fopen("../php/login_data.csv", 'r');
			while (($datarow = fgetcsv($targetfile)) !== false) {
                if ($phonenumber == $datarow[3]) return false;
            }
		}
		return true;
	}

	// email validation
  	function isValidEmail($testEmail) 
	{
		$result = true;
		if (preg_match('/[a-zA-Z0-9\.]+@[a-zA-Z0-9]+(\.?[a-zA-Z0-9]+)*\.[a-zA-Z0-9]{2,5}/', $testEmail) == false) 
		{
			$result =  false;
		}
		if ((preg_match('/\.\.+/', $testEmail)) || $testEmail[0] == '.' || $testEmail[strlen($testEmail) - 1] == '.')
		{
			$result =  false;
		}
		return $result;
	}

	// check if digits
	function isDigits($s, int $minDigits = 9, int $maxDigits = 11) 
	{
		return preg_match('/[0-9]{'.$minDigits.','.$maxDigits.'}/', $s);
	}

	// check for trailing dashes, dots, spaces
	function consecutiveCharacters($telephone) 
	{
		if ((preg_match('/\-\-+/', $telephone)) || (preg_match('/\.\.+/', $telephone)) || (preg_match('/\s\s+/', $telephone)))
		{
			return true;
		}
		return false;
	}

	// phone validation
	function isValidTelephoneNumber($telephone, int $minDigits = 9, int $maxDigits = 11) 
	{
		$result = true;
		if (consecutiveCharacters($telephone) == true) {$result = false;}
		//remove white space, dots, hyphens and brackets
		$telephone = str_replace([' ', '.', '-'], '', $telephone); 
		if (isDigits($telephone, $minDigits, $maxDigits) == false) {$result = false;}
		return $result;
	}

	// password validation
	function isValidPass($pwd) 
	{
		$result = true;
		if (strlen($pwd) < 8 || strlen($pwd) > 20) $result = false;
		if (preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])/', $pwd) == false) $result = false;
		if (preg_match('/\s\s+/', $pwd)) $result = false;
		return $result;
	}

	// if all the data is set
	if (isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['sign-up-email']) && isset($_POST['phone-number']) && isset($_POST['sign-up-password']) && isset($_POST['sign-up-confirm-password']) && isset($_POST['sign-up-address']) && isset($_POST['sign-up-city']) )
	{
		if (isset($_POST['error'])) {unset($_POST['error']);}

		$fname = $_POST['first-name'];
		$lname = $_POST['last-name'];
		$email = $_POST['sign-up-email'];
		$emailArray = preg_split ("/@/", $email); 
		$phonenumber = $_POST['phone-number'];
		$password = $_POST['sign-up-password'];
		$repassword = $_POST['sign-up-confirm-password'];
		$address = $_POST['sign-up-address'];
		$city = $_POST['sign-up-city'];

		// if any of them is invalid --> raise error
		if 
		(
			(isset($_POST['first-name']) && strlen($_POST['first-name']) < 3) 				
			|| (isset($_POST['last-name']) && strlen($_POST['last-name']) < 3)
			|| (isset($_POST['sign-up-email']) && !isValidEmail($_POST['sign-up-email']))
			|| (isset($_POST['sign-up-email']) && isValidEmail($_POST['sign-up-email']) && isUniqueEmail($_POST['sign-up-email']) == false)
			|| (isset($_POST['phone-number']) && !isValidTelephoneNumber($_POST['phone-number']))
			|| (isset($_POST['phone-number']) && isValidTelephoneNumber($_POST['phone-number']) && isUniquePhone($_POST['phone-number']) == false)
			|| (isset($_POST['sign-up-password']) && !isValidPass($_POST['sign-up-password']))
			|| (isset($_POST['sign-up-confirm-password']) && $_POST['sign-up-confirm-password']!= $_POST['sign-up-password'])
			|| (isset($_POST['sign-up-address']) && strlen($_POST['sign-up-address']) < 3)
			|| (isset($_POST['sign-up-city']) && strlen($_POST['sign-up-city']) < 3)
			|| (isset($_POST['sign-up-zip-code']) && (preg_match('/[0-9]{4,6}/', $_POST['sign-up-zip-code']) == false ))
		) {$_POST['error'] = 'yes';}
	} 

	// if everything has been filled 
	if ((count($_POST) == 12 || count($_POST) == 13) && (!isset($_POST['error']))) {

		// assign values into variables
		$email = $_POST['sign-up-email'];
		$pwd = $_POST['sign-up-password'];
		$pwd = encrypt_decrypt($pwd, 'encrypt');
		$phonenum = $_POST['phone-number'];

		// count the number of line to append the id of succesfully signed up users
		$linecount = 0;
		clearstatcache();
		if(filesize('../php/login_data.csv')) {
			// file is not empty
			$targetfile = file("../php/login_data.csv", FILE_SKIP_EMPTY_LINES);
			$linecount = count($targetfile);
		}

		//Start writing in data file + with id on each row
		$fp = fopen('../php/login_data.csv', 'a');
		fwrite($fp, $linecount);
		fwrite($fp, ",");
		fwrite($fp, $email);
		fwrite($fp, ",");
		fwrite($fp, $pwd);
		fwrite($fp, ",");
		fwrite($fp, $phonenum);
		fwrite($fp, "\n");
    	fclose($fp);
		unset($_SESSION['user']);
		$_SESSION['sign-up-email'] = $email;
    	$_SESSION['sign-up-confirm-password'] = encrypt_decrypt($pwd, 'decrypt');;
		header('Location: login-form.php');
	}

	// delete store name for shpoper on POST
	if ($_POST['account-type'] == "shopper") { 
		unset($_POST['store-name-of-owner']);
	}
?>