<?php
    // check session status and start session 
    if (empty(session_id())) session_start();

    // detect install.php
    error_reporting(E_ERROR | E_PARSE);
    if (fopen('../../php/install.php', 'r') != null) {
        exit("'install.php' still exists! Delete it to proceed!");
    }

    // get the data file
    $product_csv = $_SERVER['DOCUMENT_ROOT'] . "/data/products.csv";
    $store_csv = $_SERVER['DOCUMENT_ROOT'] . "/data/stores.csv";

    // open to read file
    $product_file = fopen($product_csv, "r");
    $store_file = fopen($store_csv, "r");

    // get the store id from the url
    $path = $_SERVER['REQUEST_URI'];
    $folders = parse_url($path, PHP_URL_QUERY);
    $your_id = explode("=", $folders); // get id

    // read data
    while (($product_row = fgetcsv($product_file)) !== FALSE) {
        // if id from ul equal to store_id
        if ($your_id[1] == $product_row[4]) {
            $productCreatedDate[] = array($product_row[0], $product_row[1], trim($product_row[3]));
        }
        if ($your_id[1] == $product_row[4] && $product_row[6] === 'TRUE') {
            $featureProduct[] = array($product_row[1], $product_row[0]);
        }
    }

    // read data
    while (($store_row = fgetcsv($store_file)) !== FALSE) {
        if ($your_id[1] == $store_row[0]) {
            $product_store_name[] = $store_row[1];
        }
    }

    // function to compare created_time to get latest date
    function date_compare($a, $b)
    {
        $time1 = strtotime($a[2]); // get created_time value
        $time2 = strtotime($b[2]); // get created_time value
        if ($time1 < $time2)
            return 1;
        else if ($time1 > $time2)
            return -1;
        else
            return 0;
    }


    // check if the array is not empty
    if (!empty($productCreatedDate)) {
        usort($productCreatedDate, "date_compare");
        $sliceArrayProduct = array_splice($productCreatedDate, 0, 5, true);
        $newProduct = array_values($sliceArrayProduct);
    }

    // close file
    fclose($store_file);
    fclose($product_file);
?>