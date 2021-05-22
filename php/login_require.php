<?php
	ob_start();
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
	if(isset($_SESSION['user'])) header('Location: account/account.php');

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

	// if log in is hit
	if (isset($_POST['log-in-hit'])) {
		$adminUsername = "";
		$adminPass = "";
		$datafile = fopen('../php/data.txt', 'r');

		// get admin info from file
		if ($datafile) {
			$adminUsername = trim(fgets($datafile));
			$adminPass = trim(encrypt_decrypt(fgets($datafile), 'decrypt'));
		} else {
			exit("Cannot find data.txt!");
		}

		// if admin
		if (isset($_POST['email']) && $_POST['email'] == $adminUsername && isset($_POST['pwd']) && $_POST['pwd'] == $adminPass) {
			$_SESSION['admin_username'] = $_POST['email'];
			unset($_SESSION['sign-up-email']);
			unset($_SESSION['sign-up-confirm-password']);
			header('location: CMS.php');
		} 
		// if not admin
		else if (isset($_POST['email']) && $_POST['email'] == $_SESSION['sign-up-email'] && isset($_POST['pwd']) && $_POST['pwd'] == $_SESSION['sign-up-confirm-password']) {
			$_SESSION['user'] = $_POST['email'];
			unset($_SESSION['admin_username']);
			unset($_SESSION['sign-up-email']);
			unset($_SESSION['sign-up-confirm-password']);
			header('location: account/account.php');
		} 
	} 
	fclose($datafile);
?>