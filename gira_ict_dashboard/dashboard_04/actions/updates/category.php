<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_category'])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];
        $date_added = $_POST['date_added'];

        $_SESSION['category_update_message'] = "";

        //update category
        $update = mysqli_query(
            $conn, 
            "UPDATE `categories` SET `name`='$category_name',`description`='$description',`created_at`='$date_added' WHERE `category_id` = '$category_id'"
        );

        if($update) {
            $_SESSION['category_update_message'] = "Category updated successfully";
            header('location: ../../product_categories.php');
        } else {
            $_SESSION['category_update_message'] = "Failed to update category";
            header('location: ../../product_categories.php');
        }

    }


?>