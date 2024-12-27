<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_stock'])) {
        $stock_id = $_POST['stock_id'];
        $stock_name = $_POST['stock_name']; 
        $date_added = $_POST['date_added'];

        $_SESSION['stock_update_message'] = "";

        //update category
        $update = mysqli_query(
            $conn, 
            "UPDATE `stock` SET `stock_name`='$stock_name', `date_created`='$date_added' WHERE `stock_id` = '$stock_id'"
        );

        if($update) {
            $_SESSION['stock_update_message'] = "Stock updated successfully";
            header('location: ../../product_stock.php');
        } else {
            $_SESSION['stock_update_message'] = "Failed to update stock";
            header('location: ../../product_stock.php');
        }

    }


?>