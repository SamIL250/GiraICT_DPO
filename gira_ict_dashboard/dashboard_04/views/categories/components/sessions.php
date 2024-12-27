<?php
    if(isset($_SESSION['category_message'])) {
        if($_SESSION['category_message'] === 'Category added successfully!') {
            echo '<div class="alert alert-success  alert-dismissible fade show">'.$_SESSION['category_message'].'</div>';
            unset($_SESSION['category_message']);
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['category_message'].'</div>';
            unset($_SESSION['category_message']);
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

    if(isset($_SESSION['category_update_message'])) {
        if($_SESSION['category_update_message'] === "Category updated successfully") {
            echo '<div class="alert alert-success  alert-dismissible fade show">'.$_SESSION['category_update_message'].'</div>';
            unset($_SESSION['category_update_message']);
        }  elseif ($_SESSION['category_update_message'] === "Failed to update category") {
            echo '<div class="alert alert-warning alert-dismissible fade show">'.$_SESSION['category_update_message'].'</div>';
            unset($_SESSION['category_update_message']);
        } else {
            unset($_SESSION['category_update_message']);
        }
    }
?>