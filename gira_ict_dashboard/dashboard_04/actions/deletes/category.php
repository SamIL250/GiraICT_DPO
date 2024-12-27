<?php
    require '../../config/config.php';
    session_start();

    if(isset($_GET['category_id'])) {
        $id = $_GET['category_id'];

        $_SESSION['category_delete_message'] = "";
        $delete_dategory = mysqli_query(
            $conn,
            "DELETE FROM categories WHERE category_id = '$id'"
        );

        if($delete_dategory) {
            header('location:../../product_categories.php');
        } else {
            $_SESSION['category_delete_message'] = "Failed to delete category!";
            header('location:../../product_categories.php');
        }
    }
?>