<?php
    // header('Content-Type: application/json');
    session_start();
    require '../../config/config.php'; 

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_category'])){
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
 

        $_SESSION['category_message'] = "";
        if(empty($category_name) || empty($description)){
            $_SESSION['category_message'] = "All fields are required";
            header('location: ../../product_categories.php'); 
            
        } else {
            $check_category = mysqli_query(
                $conn,
                "SELECT * FROM categories WHERE name = '$category_name'"
            );

            if(mysqli_num_rows($check_category) > 0) {
                $_SESSION['category_message'] = "Category already exists";
                header('location: ../../product_categories.php'); 
               
            } else {
                $insert_category = mysqli_query(
                    $conn,
                    "INSERT INTO categories (name, description) VALUES ('$category_name', '$description')"
                );

                if($insert_category) {
                    $_SESSION['category_message'] = "Category added successfully!";
                    header('location: ../../product_categories.php'); 
                } else {
                    $_SESSION['category_message'] = "Failed to add category";
                    header('location: ../../product_categories.php'); 
                }
            }
        }
    }
?>