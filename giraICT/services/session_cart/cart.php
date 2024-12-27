<?php
session_start();
require '../../config/config.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Check if the 'cart' session already exists
    if (!isset($_SESSION['cart'])) {
        // If not, create it as an empty array
        $_SESSION['cart'] = [];
    }

    // Check if the product_id is numeric (to prevent SQL injection)
    if (is_numeric($product_id)) {
        $product_id = (int) $product_id; // Convert the product_id to an integer
    } else {
        $_SESSION['added_session_cart'] = "Invalid product ID";
        exit(); // Stop further code execution if the product_id is not numeric
    }



    // Add the new product_id to the cart array
    if (!in_array($product_id, $_SESSION['cart'])) {
        //check if the product is in stock
        $select_product_stock = mysqli_query(
            $conn,
            "SELECT in_stock FROM products WHERE product_id = '$product_id'"
        );
        $in_stock = "";
        foreach($select_product_stock as $stock){
            $in_stock = $stock['in_stock'];
        }
        
        if($in_stock == "false") {
            if (isset($_GET['referrer'])) {
                $referrer = urldecode($_GET['referrer']);
                header("Location: $referrer");
                $_SESSION['added_session_cart'] = "The product is out of stock";
                exit(); // Stop further code execution if the product is out of stock
            }
        }

        $_SESSION['cart'][] = $product_id; // Append the product_id to the cart
        $_SESSION['added_session_cart'] = "The product has been added to the cart";
       
    } else {
        $_SESSION['added_session_cart'] = "The product is already in the cart";
         
    }

    // Redirect to another page (e.g., the homepage)
    if (isset($_GET['referrer'])) {
        $referrer = urldecode($_GET['referrer']);
        header("Location: $referrer");
        exit();
    }
    exit(); // Always use exit after a header redirection to prevent further code execution
}
?>
