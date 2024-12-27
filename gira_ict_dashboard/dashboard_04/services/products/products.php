<?php
    session_start();
    require '../../config/config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_product'])) {
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $category_id = mysqli_real_escape_string($conn, $_POST['product_category']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $stock = mysqli_real_escape_string($conn, $_POST['product_stock']);
        $in_stock = mysqli_real_escape_string($conn, $_POST['in_stock']);
        $product_quantity = mysqli_real_escape_string($conn, $_POST['product_quantity']);
        $product_brand = mysqli_real_escape_string($conn, $_POST['product_brand']);
        $product_color = mysqli_real_escape_string($conn, $_POST['product_color']);
        $product_material = mysqli_real_escape_string($conn, $_POST['product_material']);
        $product_origin_country = mysqli_real_escape_string($conn, $_POST['country_of_origin']);
        $product_condition = mysqli_real_escape_string($conn, $_POST['product_condition']);
        $product_size = mysqli_real_escape_string($conn, $_POST['product_size']);
        $included_materials = mysqli_real_escape_string($conn, $_POST['included_materials']);

        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $target_dir = '../../data/images/' . $product_image;
        

        $_SESSION['product_message'] = "";

        if (empty($product_name)) {
            $_SESSION['product_message'] = "Product name is required";
            header('Location: ../../products.php');
            exit;
        }
    
        if (empty($category_id)) {
            $_SESSION['product_message'] = "Product category is required";
            header('Location: ../../products.php');
            exit;
        }
    
        if (empty($description)) {
            $_SESSION['product_message'] = "Product description is required";
            header('Location: ../../products.php');
            exit;
        }
    
        if (empty($price)) {
            $_SESSION['product_message'] = "Product price is required";
            header('Location: ../../products.php');
            exit;
        }
    
        if (empty($stock)) {
            $_SESSION['product_message'] = "Stock quantity is required";
            header('Location: ../../products.php');
            exit;
        }
    
        if (empty($product_image_tmp_name)) {
            $_SESSION['product_message'] = "Product image is required";
            header('Location: ../../products.php');
            exit;
        }


     

            // Check file type and size (optional security check)
        $allowed_types = ['image/jpeg', 'image/png','image/jpg', 'image/gif'];
        $file_type = mime_content_type($product_image_tmp_name);
        if (!in_array($file_type, $allowed_types)) {
            $_SESSION['product_message'] = "Invalid file type. Please upload an image.";
            header('Location: ../../products.php');
            exit;  // Stop further execution
        }

            // Insert into database
        $create_product = mysqli_query(
            $conn,
            "INSERT INTO `products`(`category_id`, `stock_id`, `in_stock`, `product_name`, `product_quantity`, `product_brand`, `product_description`, `price`, `color`, `product_material`, `country_of_origin`, `condition`, `size`, `included_materials`, `image_url`) 
            VALUES ('$category_id', '$stock', '$in_stock' ,'$product_name', '$product_quantity', '$product_brand','$description','$price', '$product_color', '$product_material', '$product_origin_country', '$product_condition', '$product_size', '$included_materials','$product_image')"
        );
 
        if ($create_product) {
            // Move uploaded image only if product is successfully added
            if (move_uploaded_file($product_image_tmp_name, $target_dir)) {
                $_SESSION['product_message'] = "Product added successfully";
            } else {
                $_SESSION['product_message'] = "Product added but image upload failed";
            }
            header('Location: ../../products.php');
            exit;  // Stop further execution
        } else {
            // If query fails
            $_SESSION['product_message'] = "Failed to add product: " . mysqli_error($conn);
            header('Location: ../../products.php');
            exit;  // Stop further execution
        }
        // else{
        //     $create_product = mysqli_query(
        //         $conn, 
        //         "INSERT INTO `products`(`category_id`, `product_name`, `product_description`, `price`, `stock_id`, `image_url`) 
        //         VALUES ('$category_id','$product_name','$description','$price','$stock','$product_image')"
        //     );

        //     if($create_product) {
        //         move_uploaded_file($product_image_tmp_name, $target_dir);
        //         $_SESSION['product_message'] = "Product added successfully";
        //         header('location:../../products.php');
        //     }
        // }
    }

?>