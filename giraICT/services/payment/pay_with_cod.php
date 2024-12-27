<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_with_cod'])) {
        //order with cash on delivery
        
        //customer information
        $customer_id = $_POST['order_user_id'];
        $customer_name = $_POST['names'];
        $customer_email = $_POST['email'];
        $customer_phone = $_POST['phone'];
        $customer_address = $_POST['address'];
        $county = $_POST['country'];
        $city_legion = $_POST['city_legion'];

        //product details
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];

        //cart details
        $cart_id = $_POST['cart_id'];

        //create order
        $order_status = "Pending";

        //validate phone number
        if(!preg_match("/^07\d{8}$/", $customer_phone)) {
            $_SESSION['order_with_cod_message'] = 'Invalid phone number'; 
            header("location:../../cart.php");
            exit();
        }

        // validate email
        if(!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['order_with_cod_message'] = 'Invalid email address';
            header("location:../../cart.php");
            exit();
        }

        $create_order = mysqli_query(
            $conn, 
            "INSERT INTO `orders`(`user_id`, `total`, `status`) 
            VALUES ('$customer_id', 1, '$order_status')"
        );

        //get order from customer
        $select_order_info = mysqli_query(
            $conn, 
            "SELECT * FROM orders WHERE user_id = '$customer_id'"
        );

        $order_id = "";
        foreach($select_order_info as $order_info){
            $order_id = $order_info['order_id'];
        }

        //create order items
        $create_order_items = mysqli_query(
            $conn, 
            "INSERT INTO `order_items`(`order_id`, `product_id`, `quantity`, `price`) 
            VALUES ('$order_id', '$product_id', '$product_quantity', '$product_price')"
        );

        if($create_order) {
            //update product quantity
            $update_product_quantity = mysqli_query(
                $conn,
                "UPDATE products SET product_quantity = product_quantity - '$product_quantity' WHERE product_id = '$product_id'"
            );

            if($update_product_quantity) {
                //update in_stock status
                $select_product = mysqli_query(
                    $conn, 
                    "SELECT * FROM products WHERE product_id = '$product_id'"
                );

                $stock_quantity = 0;
                foreach($select_product as $product){
                    $stock_quantity = $product['product_quantity'];
               
                }

                if($stock_quantity == 0) {
                    $update_in_stock_status = mysqli_query(
                        $conn,
                        "UPDATE products SET in_stock = 'false' WHERE product_id = '$product_id'"
                    );
                }
                
            }

            //remove the product from the cart list
            $delete_cart_item = mysqli_query(
                $conn,
                "DELETE FROM cart_items WHERE product_id = '$product_id' AND cart_id = '$cart_id'"
            );
            $_SESSION['order_success'] = "Your order has been placed, we will contact you soon";
            header('location:../../cart.php');
        }



        
    }
?>