<?php 
    session_start();
    require '../../config/config.php';

    if(isset($_GET["o"]) && isset($_GET["p"]) && isset($_GET["a"]) && isset($_GET["s"]) && isset($_GET['previous_page'])) {
        $previous_page = $_GET['previous_page']; 
        
        $order_id = $_GET["o"];
        $payment_method = $_GET["p"];
        $amount = $_GET["a"];
        $payment_status = $_GET["s"];
        $status = "pending";

        $undo_payment = mysqli_query(
            $conn,
            "UPDATE signed_out_order SET payment_status='$status' WHERE signed_out_order_id='$order_id'"
        );

        $update_payment = mysqli_query(
            $conn,
            "DELETE FROM payments WHERE anonymus_order='$order_id'"
        );

        if($undo_payment && $update_payment){
            $_SESSION['payment_message'] = "Payment undone successful";
            header('location:'.$previous_page);
        } else {
            $_SESSION['payment_message'] = "Failed to undo payment";
            header('location:'.$previous_page);
        }
    }

?>