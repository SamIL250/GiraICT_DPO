<?php
    if(isset($_SESSION['stock_message'])) {
        if($_SESSION['stock_message'] === 'Stock added successfully!') {
            echo '<div class="alert alert-success  alert-dismissible fade show">'.$_SESSION['stock_message'].'</div>';
            unset($_SESSION['stock_message']);
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['stock_message'].'</div>';
            unset($_SESSION['stock_message']);
        }
    }

    if(isset($_SESSION['category_delete_message'])) {
        if($_SESSION['category_delete_message'] === "") {
            unset($_SESSION['category_delete_message']);
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['category_delete_message'].'</div>';
            unset($_SESSION['category_delete_message']);
        }

    }

    if(isset($_SESSION['stock_update_message'])) {
        if($_SESSION['stock_update_message'] === "Stock updated successfully") {
            echo '<div class="alert alert-success  alert-dismissible fade show">'.$_SESSION['stock_update_message'].'</div>';
            unset($_SESSION['stock_update_message']);
        }  elseif ($_SESSION['stock_update_message'] === "Failed to update stock") {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['stock_update_message'].'</div>';
            unset($_SESSION['stock_update_message']);
        } else {
            unset($_SESSION['stock_update_message']);
        }
    }
?>