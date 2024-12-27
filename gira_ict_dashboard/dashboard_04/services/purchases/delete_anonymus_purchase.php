<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $anon_order_id = $_GET['order_id'];
        
        // Remove anon purchase from database
        $remove_puchase = mysqli_query(
            $conn,
            "DELETE FROM payments WHERE anonymus_order = '$anon_order_id'"
        );

        if($remove_puchase) {
            //update it's purchase status
            $update_purchase_order_status = mysqli_query(
                $conn,
                "UPDATE signed_out_order SET payment_status='pending' WHERE signed_out_order_id='$anon_order_id'"
            );

            $_SESSION['remove_order_item'] = "Product removed successfully!";
            header('location:../../purchases.php');
        } else {
            $_SESSION['remove_order_item'] = "Failed to remove product!";
            header('location:../../purchases.php');
        }
    }
?>