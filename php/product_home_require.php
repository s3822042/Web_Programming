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

    // get prodct data and inject in a big array
    $product_csv = "../../data/products.csv";
    $product_file = fopen($product_csv, 'r');
    while (($product_row = fgetcsv($product_file)) !== FALSE) {
        $bigArray[] = $product_row;
    }

    // extract id from the URL of product page
    $path = $_SERVER['REQUEST_URI'];
    $folders = parse_url($path, PHP_URL_QUERY);
    $your_id = explode("=", $folders); // get id

    // function to check if a product with a certain id exists in an array
    function existInArrayById($targetId, $array) {
        foreach ($array as $subarray) {
            if ($targetId == $subarray[0]) return true;
        }
        return false;
    }

    // when add to cart button is hit
    if (isset($_POST['button']) && $_POST['button'] == "Add To Cart")
    {
        // create a temp array with all the info before adding in cart 
        $temp = array($your_id[1], $bigArray[(int)$your_id[1]][1], $bigArray[(int)$your_id[1]][2], $_POST['quantity']);
        
        // if cart already exists
        if (isset($_SESSION['cart']))
        {
            // if the element is found in cart
            if (existInArrayById($your_id[1], $_SESSION['cart']))
            {
                foreach ($_SESSION['cart'] as &$subCart) {
                    // if the product of that id is found
                    if ($your_id[1] == $subCart[0]) {
                        $oldQuantity = $subCart[3];

                        // change the quantity number
                        $subCart[3] = ((int)$oldQuantity + (int)$_POST['quantity']);
                        break;
                    }
                }
            }
            // if the element is not already in the array
            else {
                $_SESSION['cart'][] = $temp;
            }
        // if the array is empty
        } else {
            $_SESSION['cart'][] = $temp;
        }
    }

    // close proudct file
    fclose($product_file);
?>