<?php
session_start();
require '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Customer information
    $customer_id = $_POST['order_user_id'];
    $customer_name = $_POST['names'];
    $customer_email = $_POST['email'];
    $customer_phone = $_POST['phone'];
    $customer_address = $_POST['address'];
    $county = $_POST['country'];
    $city_legion = $_POST['city_legion'];

    $product_ids = $_POST['product_ids'];
    $prices = $_POST['prices'];
    $quantities = $_POST['quantities'];
    $cart_id = $_POST['cart_id'];

    $order_status = "Pending";

    // Validate phone number
    if (!preg_match("/^07\d{8}$/", $customer_phone)) {
        $_SESSION['order_with_cod_message'] = 'Invalid phone number';
        header("location:../../../cart.php");
        exit();
    }

    // Validate email
    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['order_with_cod_message'] = 'Invalid email address';
        header("location:../../../cart.php");
        exit();
    }

    // Step 1: Create the order
    $create_order = mysqli_query(
        $conn,
        "INSERT INTO `orders` (`user_id`, `total`, `status`) 
        VALUES ('$customer_id', 1, '$order_status')"
    );

    if (!$create_order) {
        $_SESSION['order_with_cod_message'] = 'Failed to create order: ' . mysqli_error($conn);
        header("location:../../../cart.php");
        exit();
    }

    // Step 2: Get the last inserted order_id
    $order_id = mysqli_insert_id($conn);

    // Step 3: Prepare order items
    $order_items = [];
    for ($i = 0; $i < count($product_ids); $i++) {
        $product_id = mysqli_real_escape_string($conn, $product_ids[$i]);
        $price = mysqli_real_escape_string($conn, $prices[$i]);
        $quantity = mysqli_real_escape_string($conn, $quantities[$i]);

        $order_items[] = "('$order_id', '$product_id', '$quantity', '$price')";
    }

    // Step 4: Insert order items
    if (!empty($order_items)) {
        $insert_items_query = "INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`) 
            VALUES " . implode(',', $order_items);

        $create_order_items = mysqli_query($conn, $insert_items_query);

        if (!$create_order_items) {
            $_SESSION['order_with_cod_message'] = 'Failed to add order items: ' . mysqli_error($conn);
            header("location:../../../cart.php");
            exit();
        }
    }

    // Step 5: Update inventory and clean cart
    foreach ($product_ids as $index => $product_id) {
        $product_id = mysqli_real_escape_string($conn, $product_id);
        $quantity = mysqli_real_escape_string($conn, $quantities[$index]);

        // Update product quantity
        $update_product_quantity = mysqli_query(
            $conn,
            "UPDATE products 
            SET product_quantity = product_quantity - '$quantity' 
            WHERE product_id = '$product_id'"
        );

        if ($update_product_quantity) {
            // Check stock quantity
            $select_product = mysqli_query(
                $conn,
                "SELECT product_quantity 
                FROM products 
                WHERE product_id = '$product_id'"
            );

            $stock_quantity = 0;
            if ($select_product && $row = mysqli_fetch_assoc($select_product)) {
                $stock_quantity = $row['product_quantity'];
            }

            // Update in_stock status if quantity is 0
            if ($stock_quantity == 0) {
                mysqli_query(
                    $conn,
                    "UPDATE products 
                    SET in_stock = 'false' 
                    WHERE product_id = '$product_id'"
                );
            }
        }

        // Remove product from cart
        mysqli_query(
            $conn,
            "DELETE FROM cart_items 
            WHERE product_id = '$product_id' 
            AND cart_id = '$cart_id'"
        );
    }

    // Step 6: Success message
    $_SESSION['order_success'] = "Your order has been placed, we will contact you soon";
    header('location:../../../cart.php');
    exit();
}
?>



