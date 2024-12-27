<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $order_id = $_GET['order_id'];
        
        // Remove anon purchase from database
        $remove_puchase = mysqli_query(
            $conn,
            "DELETE FROM payments WHERE order_id = '$order_id'"
        );

        if($remove_puchase) {
            //update it's purchase status
            $update_purchase_order_status = mysqli_query(
                $conn,
                "UPDATE orders SET status='pending' WHERE order_id='$order_id'"
            );

            $_SESSION['remove_order_item'] = "Product removed successfully!";
            header('location:../../purchases.php');
        } else {
            $_SESSION['remove_order_item'] = "Failed to remove product!";
            header('location:../../purchases.php');
        }
    }
?>