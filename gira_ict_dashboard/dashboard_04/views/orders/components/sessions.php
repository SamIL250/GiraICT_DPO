<?php
    if(isset($_SESSION['product_message'])) {
        if($_SESSION['product_message'] == 'Product added successfully') {
            echo '<div class="alert alert-success  alert-dismissible fade show">'.$_SESSION['product_message'].'</div>';
            unset($_SESSION['product_message']);
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['product_message'].'</div>';
            unset($_SESSION['product_message']);
        } 
        
    }

    if(isset($_SESSION['product_delete_message'])) {
        if($_SESSION['product_delete_message'] === "") {
            unset($_SESSION['product_delete_message']);
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['product_delete_message'].'</div>';
            unset($_SESSION['product_delete_message']);
        }

    }

    if(isset($_SESSION['product_update_message'])) {
        if($_SESSION['product_update_message'] === "Product updated successfully") {
            echo '<div class="alert alert-success  alert-dismissible fade show">'.$_SESSION['product_update_message'].'</div>';
            unset($_SESSION['product_update_message']);
        }  else {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['product_update_message'].'</div>';
            unset($_SESSION['product_update_message']);
        }
    }
?>