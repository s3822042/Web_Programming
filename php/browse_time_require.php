<?php
	// check session status and start session 
	if ( empty(session_id()) ) session_start();

	// detect install.php
	error_reporting(E_ERROR | E_PARSE);
	if (fopen('../php/install.php', 'r') != null) {
		exit("'install.php' still exists! Delete it to proceed!");
	}

	// get id of store from URL
	$path = $_SERVER['REQUEST_URI'];
	$folders = parse_url($path, PHP_URL_QUERY);
	$your_id = explode("=", $folders); // get id

	// open needed files
	$products_csv = "../data/products.csv";
	$products_file = fopen($products_csv, "r");
	$store_csv = "../data/stores.csv";
	$store_file = fopen($store_csv, "r");

	// inject data in arrays
	while (($products_row = fgetcsv($products_file)) !== FALSE) {
		// Read the data  
		if($products_row[4] == $your_id[1]){
			$productsCreatedDate[] = array($products_row[0], $products_row[1], trim($products_row[3]));
		}
	}
    while (($store_row = fgetcsv($store_file)) !== FALSE) {
        $product_store_name[] = $store_row[1];
    }

	// compare function
	function date_compare($a, $b)
	{
		$time1 = strtotime($a[2]);
		$time2 = strtotime($b[2]);
		if ($time1 < $time2)
			return 1;
		else if ($time1 > $time2)
			return -1;
		else
			return 0;
	};

	// sort date array
	usort($productsCreatedDate, "date_compare");

	// close files
	fclose($products_file);
	fclose($store_file);
?>