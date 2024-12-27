<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
        $product_id = $_POST['product_id'];
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $category_id = mysqli_real_escape_string($conn, $_POST['product_category']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $stock = mysqli_real_escape_string($conn, $_POST['product_stock']);
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $target_dir = '../../data/images/' . $product_image;
        $date_added = $_POST['product_date'];

        echo "2";

        $_SESSION['product_update_message'] = "";
        //fetch the current product details
        $current_product = mysqli_fetch_assoc(
            mysqli_query(
                $conn,
                "SELECT * FROM products WHERE product_id = '$product_id'"
            )
        );
        
        //check if the query failed
        if(!$current_product) {
            $_SESSION['product_update_message'] = "Failed to fetch product details";
            header('location:../../products.php');
        }

        $current_image = $current_product['image_url'];

        if(!empty($current_image)) {
            //if the image is already available in the folder, delete it before replacing it
            if(file_exists('../../data/images/' . $current_image)) {
                unlink('../../data/images/' . $current_image);
            }

            // Move the new image to the target directory
            move_uploaded_file($product_image_tmp_name, $target_dir);
            

            // Update the image URL in the database with the new image
            $new_image = $product_image;

        } else {
            //if no image is uploaded, keep the current image
            $new_image = $current_image;
        }

        //update product in database
        $update = mysqli_query(
            $conn,
            "UPDATE products SET category_id = '$category_id', product_name = '$product_name', product_description = '$description', price = '$price', stock_id = '$stock', image_url = '$new_image', product_created_at = '$date_added' WHERE product_id = '$product_id'"
        );

        if (!$update) {
            $_SESSION['product_update_message'] = "Failed to update product";
            header('location:../../products.php');
            exit();

        } else {
            $_SESSION['product_update_message'] = "Product updated successfully";
            header('location:../../products.php');
            exit();
        }
    }

?>