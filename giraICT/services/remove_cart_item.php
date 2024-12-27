<?php
        session_start();
        require '../config/config.php';

        if(isset($_GET['cart_item_id']) ) {
                $product_id = $_GET['cart_item_id'];
                $remove_item = mysqli_query(
                        $conn,
                        "DELETE FROM cart_items WHERE product_id = $product_id"
                ); 

                if($remove_item) {
                        $_SESSION['remove_items_from_cart'] = "Product removed successfully!";
                        header('location:../cart.php');
                } else {
                        $_SESSION['remove_items_from_cart'] = "Failed to remove product!";
                        header('location:../cart.php');
                }
        }
?>