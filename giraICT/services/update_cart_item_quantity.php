<?php
    require '../config/config.php';
    session_start();
    //update cart product quantity
    if($_SERVER["REQUEST_METHOD"]  == "POST" && isset($_POST["updateQuantity"]) && isset($_POST["product_id"])) {
        $cart_product_id = $_POST["cart_item_id"];
        $quantity = $_POST["quantity"];
        $product_id = $_POST["product_id"];


        //check_product_quantity
        $check_product_quantity = mysqli_query(
            $conn,
            "SELECT product_quantity FROM products WHERE product_id = '$product_id'"
        );
        $product_quantity = 0; 
        foreach($check_product_quantity as $check_quantity) {
            $product_quantity = $check_quantity['product_quantity']; 
        }

        if($quantity > $product_quantity) {
            $_SESSION['cart_success'] = "Product quantity is not available in stock!";
            header("location: ../cart.php"); 
        } else {
            //update the cart item quantity
            $update_cart_item = mysqli_query(
                $conn,
                "UPDATE cart_items SET quantity = '$quantity' WHERE cart_item_id = '$cart_product_id'"
            ); 
            if($update_cart_item)   {
                //redirect to cart page
                header("location: ../cart.php");
            }
        }

        

    }
?>