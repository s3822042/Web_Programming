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

	// if not already logged in 
	if(!isset($_SESSION['user'])) header('Location: ../sign-up-form.php');

	// if users signed up right after visiting cart page --> get back to cart
	if (isset($_SESSION['visited-cart-page'])) 
	{
		unset($_SESSION['visited-cart-page']);
		header('Location: ../cart.php');
	}

	// log out option 
	if(isset($_POST['hit-button']) && $_POST['hit-button'] == "Log Out") 
	{
		unset($_SESSION['user']);
		header('Location: ../login-form.php');
	}
?>