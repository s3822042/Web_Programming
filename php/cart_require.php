<?php
	// check session status and start session 
	if ( empty(session_id()) ) session_start();

	// detect install.php
	error_reporting(E_ERROR | E_PARSE);
	if (fopen('../../php/install.php', 'r') != null) {
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

	// if not logged in and hit order
	if (!isset($_SESSION['user']) && $_POST['hit-button'] == 'Order')
	{
		$_SESSION['visited-cart-page'] = 'already';
		header('location: sign-up-form.php');
	}

	// if logged in and ordered something
	if (isset($_SESSION['user']) && $_POST['hit-button'] == 'Order' && isset($_SESSION['cart']))
	{
		header('location: thank_you.php');
	}

	// hit continue shopping
	if ($_POST['hit-button'] == 'Continue Shopping') {
		header('location: ../index.php');
	}

	// hit clear cart
	if ($_POST['hit-button'] == 'Clear Cart') {
		unset($_SESSION['cart']);
	}

	// hit check
	if ($_POST['hit-button'] == '✓') {
		$keys = array_keys($_POST);
		$getId = explode("-", $keys[0]);
		$changeTo = $_POST[$keys[0]];
		foreach($_SESSION['cart'] as &$subCart)
		{
		  if ($getId[1] == $subCart[0])
		  {
			$subCart[3] = $changeTo;
			break;
		  }
		}
	}
?>