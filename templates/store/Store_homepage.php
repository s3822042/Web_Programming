<?php
session_start();

error_reporting(E_ERROR | E_PARSE);
if (fopen('../../php/install.php', 'r') != null) {
    exit("'install.php' still exists! Delete it to proceed!");
}

// PRODUCT

$product_csv = "../../data/products.csv";
$product_file = fopen($product_csv, "r");


while (($product_row = fgetcsv($product_file)) !== FALSE) {
    // Read the data
    $temp = substr($product_row[3], 0, 4);
    if ($temp == '2021') {
        $productCreatedDate[] = array($product_row[1], trim($product_row[3]));
    }

    if ($product_row[6] === 'TRUE') {
        $featureProduct[] = trim($product_row[1]);
    }
}

function date_compare($a, $b)
{
    $time1 = strtotime($a[1]);
    $time2 = strtotime($b[1]);
    if ($time1 < $time2)
        return 1;
    else if ($time1 > $time2)
        return -1;
    else
        return 0;
}


usort($productCreatedDate, "date_compare");
$sliceArrayProduct = array_splice($productCreatedDate, 0, 5, true);


$sliceArrayProduct = array_map(function ($x) {
    return $x[0];
}, $sliceArrayProduct);

$newProduct = array_values($sliceArrayProduct);

fclose($product_file);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>

    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/store/store_homepage.module.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>
    

    <script type="text/javascript" src="../js/index.js"></script>

</body>

</html>