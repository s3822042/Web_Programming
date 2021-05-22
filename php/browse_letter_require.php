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

	// get the data file
	$store_csv = "../data/stores.csv";
	$category_csv = "../data/categories.csv";

	// open to read file
	$store_file = fopen($store_csv, "r");
	$category_file = fopen($category_csv, 'r');

	// Browse by letter
	while (($row = fgetcsv($store_file)) !== FALSE) {
		// Read the data
		$browse_letter[] = array($row[0], trim($row[1]));
	}
	$remove = array_shift($browse_letter);
	
	function sortStoreName ($a, $b) {
		if ($a[1] > $b[1]) return 1;
		else if ($a[1] < $b[1]) return -1;
		else return 0;
	}

	// close file
	fclose($store_file);
	fclose($category_file);

	$chosen_letter = $_POST["chosen-letter"];
	$matched_store = [];
	$matched_number = [];

	foreach ($browse_letter as $v) {
		$first_letter = strtolower(substr($v[1], 0, 1));
		$first_number = substr($v[1], 0, 1);
		if ($first_letter == $chosen_letter) {
			$matched_store[] = $v;
		}
		if (is_numeric($first_number)) {
			$matched_number[] = $v;
		}
	}
	usort($matched_store, "sortStoreName");
	usort($matched_number, "sortStoreName");
?>