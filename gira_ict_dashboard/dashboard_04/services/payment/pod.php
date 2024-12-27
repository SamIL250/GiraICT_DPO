<?php
    session_start();
    require '../../config/config.php';

    if(isset($_GET["o"]) && isset($_GET["p"]) && isset($_GET["a"]) && isset($_GET["s"]) && isset($_GET['previous_page'])) {
        $previous_page = $_GET['previous_page'];
        
        $order_id = $_GET["o"];
        $payment_method = $_GET["p"];
        $amount = $_GET["a"];
        $status = $_GET["s"];
        $status = "completed";


        //create payment
        $create_payment = mysqli_query(
            $conn,
            "INSERT INTO payments (order_id, payment_method, amount, payment_status) 
            VALUES ('$order_id', '$payment_method', '$amount', '$status')"
        ); 

        if($create_payment) {
            //change $status from pending to completed
            $update_order = mysqli_query(
                $conn,
                "UPDATE orders SET status='delivered' WHERE order_id='$order_id'"
            );
            $_SESSION['payment_message'] = "Payment complete successful";
            header('location:'.$previous_page);
        } else {
            $_SESSION['payment_message'] = "Failed to complete payment";
            header('location:'.$previous_page);
        }
    }
?>