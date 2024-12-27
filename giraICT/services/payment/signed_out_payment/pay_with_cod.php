<?php
    session_start();
    require '../../../config/config.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_with_cod"])) {
        $customer_name = $_POST['names'];
        $customer_email = $_POST['email'];
        $customer_phone = $_POST['phone'];
        $customer_address = $_POST['address'];
        $county = $_POST['country'];
        $city_legion = $_POST['city_legion'];
        $product = $_POST['product_id']; // Adjust if multiple products
        $product_quantity = $_POST['product_quantity'];
        $price = $_POST['product_price'];  
        $payment_method = "COD";
        $payment_status = 'pending';
 
    
        // Validate fields
        if (empty($customer_name) || empty($customer_email) || empty($customer_phone) || empty($customer_address) || empty($county) || empty($city_legion) || empty($price)) {
            $_SESSION['signed_out_order_message'] = 'All fields are required';
            header("location:../../../session_checkout.php?product_session_id=" . $product);
            exit();
        }
    
        if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['signed_out_order_message'] = 'Invalid email address';
            header("location:../../../session_checkout.php?product_session_id=" . $product);
            exit();
        }
    
        if (!preg_match('/^07\d{8}$/', $customer_phone)) {
            $_SESSION['signed_out_order_message'] = 'Invalid phone number';
            header("location:../../../session_checkout.php?product_session_id=" . $product);
            exit();
        }
    
        // Reduce product quantity
        $update_product_quantity = mysqli_query(
            $conn,
            "UPDATE products SET product_quantity = product_quantity - '$product_quantity' WHERE product_id = '$product'"
        );
    
        if ($update_product_quantity) {
            $select_product = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$product'");
            $stock_quantity = 0;
            foreach ($select_product as $product_row) {
                $stock_quantity = $product_row['product_quantity'];
            }
            if ($stock_quantity <= 0) {
                $update_product_stock_status = mysqli_query(
                    $conn,
                    "UPDATE products SET in_stock = 'false' WHERE product_id = '$product'"
                );
            }
        }
        
        echo $product;
        // Create order
        $create_order = mysqli_query(
            $conn,
            "INSERT INTO `signed_out_order`(`user_names`, `user_phone`, `user_email`, `country`, `city_legion`, `home_address`, `product_ordered`, `quantity`, `price`,  `payment_method`, `payment_status`) 
            VALUES ('$customer_name', '$customer_phone', '$customer_email', '$county', '$city_legion', '$customer_address', '$product', '$product_quantity', '$price', '$payment_method', '$payment_status')"
        );
    
        if ($create_order) {
            $_SESSION['signed_out_order_message'] = 'Your order has been placed, we will contact you soon';
            header("location:../../../session_checkout.php?product_session_id=" . $product);
            exit();
        } else {
            $_SESSION['signed_out_order_message'] = 'Failed to place order, please try again';
            header("location:../../../session_checkout.php?product_session_id=" . $product);
            exit();
        }
    }
    

?>