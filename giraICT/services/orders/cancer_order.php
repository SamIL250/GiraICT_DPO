<?php
    require '../../config/config.php';
    session_start();

    if(isset($_GET['canceled_order']) && isset($_GET['order_user_id'])) {
        $canceled_order_id = $_GET['canceled_order'];
        $order_user_id = $_GET['order_user_id'];
        
        // Update the order status to 'Canceled' in the database
        $update_order_status = mysqli_query($conn, "UPDATE orders SET canceled = 'true' WHERE order_id = '$canceled_order_id'"); 
        
        if($update_order_status) {
            $_SESSION['canceled_order_message'] = "Your order has been canceled!";
            header('location:../../orders.php?order_user_id='.$order_user_id);
        } else {
            $_SESSION['canceled_order_message'] = "Failed to cancel the order, please try again!";
            header('location:../../orders.php?order_user_id='.$order_user_id);
        }
    }
?>