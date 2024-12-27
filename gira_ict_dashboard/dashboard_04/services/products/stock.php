<?php 
    session_start();
    require '../../config/config.php'; 

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_stock'])){
        $stock_name = mysqli_real_escape_string($conn, $_POST['stock_name']); 
    

        $_SESSION['stock_message'] = "";
        if(empty($stock_name)){
            $_SESSION['category_message'] = "All fields are required";
            header('location: ../../product_stock.php'); 
            
        } else {
            $check_stock = mysqli_query(
                $conn,
                "SELECT * FROM stock WHERE stock_name = '$sock_name'"
            );

            if(mysqli_num_rows($check_stock) > 0) {
                $_SESSION['stock_message'] = "Stock already exists";
                header('location: ../../product_stock.php'); 
                
            } else {
                $insert_stock = mysqli_query(
                    $conn,
                    "INSERT INTO stock (stock_name) VALUES ('$stock_name')"
                );

                if($insert_stock) {
                    $_SESSION['stock_message'] = "Stock added successfully!";
                    header('location: ../../product_stock.php'); 
                } else {
                    $_SESSION['stock_message'] = "Failed to add stock";
                    header('location: ../../product_stock.php'); 
                }
            }
        }
    } 
?>