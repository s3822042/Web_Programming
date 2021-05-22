<?php
    // STORE
    // check session status and start session 
	if ( empty(session_id()) ) session_start();

	// detect install.php
	error_reporting(E_ERROR | E_PARSE);
	if (fopen('../php/install.php', 'r') != null) {
	    exit("'install.php' still exists! Delete it to proceed!");
	}

    // get the data file
    $store_csv = $_SERVER['DOCUMENT_ROOT'] . "/data/stores.csv"; //
    // open to read file
    $store_file = fopen($store_csv, "r");


    while (($store_row = fgetcsv($store_file)) !== FALSE) {
        // get year value
        $temp1 = substr($store_row[3], 0, 4);

        // get only created_time value in year 2021 to avoid compare line by line
        if ($temp1 == '2021') {
            $storeCreatedDate[] = array($store_row[0], $store_row[1], trim($store_row[3]));
        }

        // get the TRUE value only in featured column
        if ($store_row[4] === 'TRUE') {
            $featureStoreArray[] = array($store_row[0], trim($store_row[1]));
        }
    }
    // splice array to get first 10 elements of array
    $featureStore = array_splice($featureStoreArray, 0, 10, true);


    // function to compare created_time to get latest date
    function date_compare($a, $b)
    {
        $time1 = strtotime($a[2]); // get created_time value
        $time2 = strtotime($b[2]);  // get created_time value
        if ($time1 < $time2)
            return 1;
        else if ($time1 > $time2)
            return -1;
        else
            return 0;
    }

    // sort based on above function
    usort($storeCreatedDate, "date_compare");

    // splice array to get first 10 elements of array
    $newStore = array_splice($storeCreatedDate, 0, 10, true);

    // close file
    fclose($store_file);

    // PRODUCT

    // get the data file
    $product_csv = $_SERVER['DOCUMENT_ROOT'] . "/data/products.csv";
    // open to read file
    $product_file = fopen($product_csv, "r");


    while (($product_row = fgetcsv($product_file)) !== FALSE) {
        // get year value
        $temp = substr($product_row[3], 0, 4);
        // get only created_time value in year 2021 to avoid compare line by line
        if ($temp == '2021') {
            $productCreatedDate[] = array($product_row[0], $product_row[1], trim($product_row[3]));
        }
        // get the TRUE value only in featured column
        if ($product_row[5] === 'TRUE') {
            $featureProductArray[] = array($product_row[0], trim($product_row[1]));
        }
    }
    // splice array to get first 10 elements of array
    $featureProduct = array_splice($featureProductArray, 0, 10, true);

    // sort based on above function
    usort($productCreatedDate, "date_compare");

    // splice array to get first 10 elements of array   
    $newProduct = array_splice($productCreatedDate, 0, 10, true);

    // close file
    fclose($product_file);
?>