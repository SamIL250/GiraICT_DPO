<?php
    session_start();
    require '../config/config.php';


    if(isset($_GET['add_cart_id']) && isset($_GET['cart_id'])) {
        $product_id = $_GET['add_cart_id'];
        $cart_id = $_GET['cart_id'];
        $adding_quantity = 1;

        //check if product already exists in cart
        $check_product = mysqli_query(
            $conn, 
            "SELECT *  FROM cart_items WHERE cart_id = '$cart_id' AND product_id = '$product_id'"
        );

        $cart_items_id = "";
        foreach($check_product as $cart_items){
            $cart_items_id = $cart_items['cart_item_id'];
            break;
        }
        
        if(mysqli_num_rows($check_product) > 0) {
            //check product quantity
            $select_product_quantity = mysqli_query(
                $conn, 
                "SELECT product_quantity FROM products WHERE product_id = '$product_id'"
            );
            $product_quantity = 0;
            
            foreach($select_product_quantity as $quantity){
                $product_quantity = $quantity['product_quantity'];
            }

            //check cart_items product_quantity
            $check_cart_items_quantity = mysqli_query(
                $conn,
                "SELECT quantity FROM cart_items WHERE  cart_id = '$cart_id' AND product_id = '$product_id'"
            );

            $cart_quantity = 0;
            foreach($check_cart_items_quantity as $cart_item_quantity){
                $cart_quantity = $cart_item_quantity['quantity'];
            }
            
            $quantity_break_point = $cart_quantity + $adding_quantity;

            if($quantity_break_point > $product_quantity) {
                $_SESSION['cart_success'] = "Product quantity is not available in stock!";
                if (isset($_GET['referrer'])) {
                    $referrer = urldecode($_GET['referrer']);
                    header("Location: $referrer");
                    exit();
                }
            } 

            //update cart quantity
            $update_quantity = mysqli_query(
                $conn, 
                "UPDATE cart_items SET quantity = quantity + '$adding_quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id'"
            );
            
            if($update_quantity) {
                $_SESSION['cart_success'] = "Product quantity updated in cart!";
                if (isset($_GET['referrer'])) {
                    $referrer = urldecode($_GET['referrer']);
                    header("Location: $referrer");
                    exit();
                }
            }
        } 

        //check if product is in stock
        $check_stock = mysqli_query(
            $conn, 
            "SELECT in_stock FROM products WHERE product_id = '$product_id'"
        );

        $in_stock = "";
        foreach($check_stock as $stock){
            $in_stock = $stock['in_stock'];
          
        }

        if($in_stock == "false") {
            $_SESSION['cart_success'] = "Product is out of stock!";
            if (isset($_GET['referrer'])) {
                $referrer = urldecode($_GET['referrer']);
                header("Location: $referrer");
                exit();
            }
        }
        
        //add product to cart
        $add_to_cart = mysqli_query(
            $conn, 
            "INSERT INTO cart_items (cart_id, product_id) VALUES ('$cart_id', '$product_id')"
        );
        
        if($add_to_cart) {
            $_SESSION['product__added_id'] = $product_id;
            $_SESSION['cart_items_id'] = $cart_items_id;
            $_SESSION['cart_success'] = "Product added to cart!";
            if (isset($_GET['referrer'])) {
                $referrer = urldecode($_GET['referrer']);
                header("Location: $referrer");
                exit();
            }
        }
    }
?>