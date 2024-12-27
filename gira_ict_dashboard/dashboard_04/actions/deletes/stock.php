<?php
    require '../../config/config.php';
    session_start();

    if(isset($_GET['stock_id'])) {
        $id = $_GET['stock_id'];

        $_SESSION['stock_delete_message'] = "";
        $delete_stock = mysqli_query(
            $conn,
            "DELETE FROM stock WHERE stock_id = '$id'"
        );

        if($delete_stock) {
            header('location:../../product_stock.php');
        } else {
            $_SESSION['stock_delete_message'] = "Failed to delete stock!";
            header('location:../../product_stock.php');
        }
    }
?>