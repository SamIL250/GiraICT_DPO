<?php
    if(isset($_SESSION['product_message'])) {
        if($_SESSION['product_message'] == 'Product added successfully') {
            echo '<div class="alert alert-success border-0 rounded-0  alert-dismissible fade show">'.$_SESSION['product_message'].'</div>';
            unset($_SESSION['product_message']);
        } else {
            echo '<div class="alert alert-warning alert-dismissible rounded-0 fade show">'.$_SESSION['product_message'].'</div>';
            unset($_SESSION['product_message']);
        } 
        
    }

    if(isset($_SESSION['product_delete_message'])) {
        if($_SESSION['product_delete_message'] === "Product deleted successfully") {
            echo '<div class="alert alert-success rounded-0 alert-dismissible fade show">'.$_SESSION['product_delete_message'].'</div>';
            unset($_SESSION['product_delete_message']);
        } else {
            echo '<div class="alert alert-warning rounded-0 alert-dismissible fade show">'.$_SESSION['product_delete_message'].'</div>';
            unset($_SESSION['product_delete_message']);
        }

    }

    if(isset($_SESSION['product_update_message'])) {
        if($_SESSION['product_update_message'] == "Product updated successfully") {
            echo '<div class="alert alert-success rounded-0  alert-dismissible fade show">'.$_SESSION['product_update_message'].'</div>';
            unset($_SESSION['product_update_message']);
        }  else {
            echo '<div class="alert alert-warning rounded-0 alert-dismissible fade show">'.$_SESSION['product_update_message'].'</div>';
            unset($_SESSION['product_update_message']);
        }
    }
?>