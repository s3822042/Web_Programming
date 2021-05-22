<?php

// get the data file
$store_csv = $_SERVER['DOCUMENT_ROOT'] . "../data/stores.csv";
$category_csv = $_SERVER['DOCUMENT_ROOT'] . "../data/categories.csv";

// open to read file
$store_file = fopen($store_csv, "r");
$category_file = fopen($category_csv, 'r');

// Browse by letter

while (($row = fgetcsv($store_file)) !== FALSE) {
    // Read the data
    $browse_letter[] = trim($row[1]);
}
// sort alphabetically
sort($browse_letter);
// remove last element of array
$remove = array_pop($browse_letter);


// Browse by category

$row = 1;

while (($product_row = fgetcsv($store_file)) !== FALSE) {
    // Skip the first line
    if ($row == 1) {
        $row++;
        continue;
    }
    // Read the data
    $store_name_array[] = trim($product_row[1]);
    $store_cate_id_array[] = trim($product_row[2]);
    $store_id[] = trim($product_row[0]);
}


$category_row = 1;

while (($data = fgetcsv($category_file)) !== FALSE) {
    // Skip the first line 
    if ($category_row == 1) {
        $category_row++;
        continue;
    }
    // Add data to array
    $category_name[] = trim($data[1]);
}

// close file
fclose($store_file);
fclose($category_file);
