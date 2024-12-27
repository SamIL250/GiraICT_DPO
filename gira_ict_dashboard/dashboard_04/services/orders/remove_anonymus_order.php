<?php
    require '../../config/config.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $order_id = $_GET['order_id'];
        
        // Remove order from database
        $remove_order = mysqli_query(
            $conn,
            "DELETE FROM signed_out_order WHERE signed_out_order_id = '$order_id'"
        );

        if($remove_order) {
            $_SESSION['remove_order_item'] = "Product removed successfully!";
            header('location:../../orders.php');
        } else {
            $_SESSION['remove_order_item'] = "Failed to remove product!";
            header('location:../../orders.php');
        }
    }
?>