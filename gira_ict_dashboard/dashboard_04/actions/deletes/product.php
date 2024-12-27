<?php
    require '../../config/config.php';
    session_start();

    if(isset($_GET['product_id'])) {
        $id = $_GET['product_id'];

        // $_SESSION['product_delete_message'] = "";
        $delete_product = mysqli_query(
            $conn,
            "DELETE FROM products WHERE product_id = '$id'"
        );

        if($delete_product) {
            $_SESSION['product_delete_message'] = "Product deleted successfully";
            header('location:../../products.php');
        } else {
            $_SESSION['product_delete_message'] = "Failed to delete product!";
            header('location:../../products.php');
        }
    }
?>