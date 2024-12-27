<?php
session_start();

if (isset($_GET['product_session_id'])) {
    $session_id = $_GET['product_session_id'];

    // Check if the cart session exists and contains the specified product ID
    if (isset($_SESSION['cart']) && in_array($session_id, $_SESSION['cart'])) {
        // Get the index of the product to remove
        $key = array_search($session_id, $_SESSION['cart']);
        
        if ($key !== false) {
            // Remove the product ID from the cart session
            unset($_SESSION['cart'][$key]);
        }

        // Re-index the array to avoid gaps in numeric keys
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        // Optionally, check if the cart is now empty and unset it
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }

        $_SESSION['unset_session__cart_product'] = "Product removed from your cart successfully!";
        header('location: ../../session_cart.php');
        exit(); // It's good practice to exit after a header redirect
    } else {
        $_SESSION['unset_session'] = "Product not found in your cart!";
        header('location: ../../session_cart.php');
        exit();
    }
}
?>
