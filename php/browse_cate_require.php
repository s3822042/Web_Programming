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

    // get store names and their category ids
    $store_name_array = array();
    $h = fopen("../data/stores.csv", "r");
    $row_store = 1;
    while (($row = fgetcsv($h)) !== FALSE) {
    // Skip the first line
    if ($row_store == 1) {
        $row_store++;
        continue;
    }
    // Read the data
    $store_name_array[] = array($row[0], trim($row[1]));
    $store_cate_id_array[] = trim($row[2]);
    }
    fclose($h);

    // get category names
    $file = fopen("../data/categories.csv", 'r');
    $row = 1;
    while (($data = fgetcsv($file)) !== FALSE) {
    // Skip the first line
    if ($row == 1) {
        $row++;
        continue;
    }
    // Add data to array
    $category_name[] = trim($data[1]);
    }
    fclose($file);
    
    // get data from browse by category array 
    $chosen_index = array_search($_POST['categories'], $category_name) + 1;
    $count = 0;
    $browse_cate = [];
    foreach ($store_cate_id_array as $c) {
        if ($c == $chosen_index) {
            $browse_cate[] = $store_name_array[$count];
        }
        $count++;
    }
?>